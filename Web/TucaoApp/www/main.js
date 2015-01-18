function startHot() {
	$.ui.clearHistory();
	if (map == null) {//仅第一遍时候加载nearHot
		nearHot();
	};
}

function startNew() {
	$.ui.clearHistory();
	if (offset == 0) {//仅第一遍时候加载nearNew
		nearNew();
	};
	// $.ui.resetScrollers=false; //Do not reset the scrollers when switching panels
}


function nearHot() {
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : userDistance,
			"offset" : 0,
			"length" : 10,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				drawMap(data.data);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

var NEW_LENGTH = 5;
var offset = 0;
//最新吐槽全部刷新时：
function nearNew() {
	$.ajax({
		type : "POST",
		url : webRoot + 'tucao/nearnew',
		data : {
			"user_id" : userId,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude,
			"distance" : userDistance,
			"offset" : 0,
			"length" : NEW_LENGTH,
		},
		success : function(data) {
			if (data.success) {
				// console.log("nearNewReturn:",JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				$("#newMain .afScrollPanel").html(html);
				offset = 0+NEW_LENGTH; //offset重置
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});

}

/*最新吐槽下拉更新，上拉加载*/
var myScroller;
var ADD_LENGTH = 5;
var flagMyScroller = true;
$.ui.ready(function() {
	myScroller = $("#newMain").scroller();
	//Fetch the scroller from cache
	//Since this is a App Framework UI scroller, we could also do
	// myScroller=$.ui.scrollingDivs['webslider'];
	myScroller.addInfinite();
	myScroller.addPullToRefresh();
	myScroller.runCB = true;

	//User is dragging the page down exposing the pull to refresh message.
	$.bind(myScroller, "refresh-trigger", function() {
		console.log("Refresh trigger");
		$(this.el).prepend("<div id='pull' style='margin-top:10px;width:100%;height:20px;text-align:center;'>下拉更新</div>");
	});

	$.bind(myScroller, "refresh-release", function() {
		var that = this;
		$("#pull").remove();
		$(that.el).prepend("<div id='refreshing' style='margin-top:10px;width:100%;height:20px;text-align:center;'>正在获取最新吐槽...</div>");
		//下拉更新、获取最新吐槽
		$.ajax({
			type : "POST",
			url : webRoot + 'tucao/nearnew',
			data : {
				"user_id" : userId,
				"distance" : userDistance,
				"offset" : 0,
				"length" : 2,
				"lat" : position.coords.latitude,
				"lng" : position.coords.longitude
			},
			success : function(data) {
				if (data.success) {
					var tpl = $('#tpl').html();
					var html = juicer(tpl, data);
					$("#refreshing").remove();
					$("#newMain .afScrollPanel").prepend(html);
					// that.hideRefresh();
				} else {
					alert("error");
				}
			},
			dataType : "json"
		});
		return false;
		//tells it to not auto-cancel the refresh
	});

	$.bind(myScroller, "refresh-cancel", function() {
		this.hideRefresh();
		console.log("cancelled");
	});

	myScroller.enable();

	$.bind(myScroller, "infinite-scroll", function() {
		var self = this;
		// console.log("infinite triggered");
		if ($(self.el).find(".iNoContent").length > 0) {
			$(this.el).append("<div id='iNoContent' style='margin-top:10px;width:100%;height:20px;text-align:center;'>没内容了！！！</div>");
			return;
		} else {
			if ($(self.el).find("#infinite").length == 0) {
				$(this.el).append("<div id='infinite' style='margin-top:10px;width:100%;height:20px;text-align:center;'>加载中...</div>");
			}
		}
		$.bind(myScroller, "infinite-scroll-end", function() {
			$.unbind(myScroller, "infinite-scroll-end");
			if (!flagMyScroller)
				return;
			flagMyScroller = false;

			//按照offset加载更多吐槽
			$.ajax({
				type : "POST",
				url : webRoot + 'tucao/nearnew',
				data : {
					"user_id" : userId,
					"distance" : userDistance,
					"offset" : offset,
					"length" : ADD_LENGTH,
					"lat" : position.coords.latitude,
					"lng" : position.coords.longitude
				},
				success : function(data) {
					if (data.success) {
						$(self.el).find("#infinite").remove();
						self.clearInfinite();
						self.scrollToBottom();
						if (data.data.length == 0) {
							$(self.el).append('<div class="iNoContent"></div>');
							offset += ADD_LENGTH;
							flagMyScroller = true;
							return;
						}
						//*********
						var tpl = $('#tpl').html();
						var html = juicer(tpl, data);
						// var html = "<div style='margin-top:10px;width:100%;height:20px;text-align:center;'>！！！</div>";
						$("#newMain .afScrollPanel").append(html);
						//*********
						offset += ADD_LENGTH;
						flagMyScroller = true;
					} else {
						alert("error");
					}
				},
				dataType : "json"
			});
			//结束

		});
	});
	// $("#newMain").css("overflow", "auto");
});

function drawMap(tucaos) {
	// 百度地图API功能
	// 创建Map实例
	map = new BMap.Map("hotmap");
	// 创建点坐标
	var latitude = position.coords.latitude;
	var longitude = position.coords.longitude;
	var point = new BMap.Point(longitude, latitude);
	// 初始化地图,设置中心点坐标和地图级别。
	map.centerAndZoom(point, 15);
	//*********15横向大概1000米范围*********
	var marker = new BMap.Marker(point);
	map.addOverlay(marker);
	marker.addEventListener("click", function() {
		alert("I'm here");
	});

	// map.disableDragging();
	map.enableDragging();

	setTimeout(function() {
		//设置地图中心点。center除了可以为坐标点以外，还支持城市名
		map.setCenter(point);
		//0.5秒后将视图切换到指定的缩放等级，中心点坐标不变
		map.setZoom(15);
	}, 100);

	setTimeout(function() {
		//为随机位置准备边距
		var bounds = map.getBounds();
		var lngSpan = bounds.getNorthEast().lng - bounds.getSouthWest().lng;
		var latSpan = bounds.getNorthEast().lat - bounds.getSouthWest().lat;

		var tplBlock = document.getElementById('tplBlock').innerHTML;
		for (var index in tucaos) {
			//随机的point
			var point = new BMap.Point(bounds.getSouthWest().lng + lngSpan * (Math.random() * 0.7 + 0.15), bounds.getSouthWest().lat + latSpan * (Math.random() * 0.7 + 0.15));
			addMarker(point, index);
		}

		function addMarker(point, index) {// 创建图标对象
			var myIcon = new BMap.Icon("http://api.map.baidu.com/mapCard/img/location.gif", new BMap.Size(14, 23), {
				// 指定定位位置。
				// 当标注显示在地图上时，其所指向的地理位置距离图标左上
				// 角各偏移7像素和25像素。您可以看到在本例中该位置即是
				// 图标中央下端的尖角位置。
				anchor : new BMap.Size(7, 25),
			});
			// 创建标注对象并添加到地图
			var marker = new BMap.Marker(point, {
				icon : myIcon
			});
			map.addOverlay(marker);
			// marker.addEventListener("click", function() {
			// alert("您点击了标注"+index);
			// });
			marker.addEventListener("click", function() {
				var sContent = juicer(tplBlock, tucaos[index]);
				var infoWindow = new BMap.InfoWindow(sContent);
				this.openInfoWindow(infoWindow);
				//图片加载完毕重绘infowindow
				document.getElementById('imgDemo').onload = function() {
					infoWindow.redraw();
					//防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
				}
			});
		}

	}, 500);
} 



//向上顶起
function upClick(obj) {
	// alert($(obj).siblings(".num").get(0).innerHTML);

	notEvaluated = true;

	if ($(obj).parent().hasClass('changed')) {
		notEvaluated = false;
	} else {
		//更新数据库

	}

	//是否未被评价
	if (!notEvaluated) {
		$.ui.showMask("已经评价过了");
		window.setTimeout(function() {
			$.ui.hideMask();
		}, 500);
	} else {
		var numNode = obj.parentNode.getElementsByTagName("span")[0];
		numNode.innerHTML = parseInt(numNode.innerHTML) + 1;
	};

	$(obj).parent().addClass('changed');
}

//向下踩
function downClick(obj) {
	// alert($(obj).siblings(".num").get(0).innerHTML);

	notEvaluated = true;

	if ($(obj).parent().hasClass('changed')) {
		notEvaluated = false;
	} else {
		//更新数据库

	}

	//是否未被评价
	if (!notEvaluated) {
		$.ui.showMask("已经评价过了");
		window.setTimeout(function() {
			$.ui.hideMask();
		}, 500);
	} else {
		var numNode = obj.parentNode.getElementsByTagName("span")[0];
		numNode.innerHTML = parseInt(numNode.innerHTML) - 1;
	};

	$(obj).parent().addClass('changed');
}

