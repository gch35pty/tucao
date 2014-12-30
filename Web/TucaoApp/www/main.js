//发表评论
function applycomment () {
	var content = trim($("#commentContent").val());

	if (content == "") {
		alert("空");
		return;
	};
  	$.ajax({
		type : "POST",
		url : webRoot + 'applycomment',
		data : {
			"tucao_id" : curTucaoId,
			"user_id" : userId,
			"content" : content,
			"reply_comment" : -1,
			"hide" : false,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				refreshCommentList();
				$("#commentContent").val("");
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

function refreshCommentList () {
  $.ajax({
		type : "POST",
		url : webRoot + 'comment',
		data : {
			"tucao_id" : curTucaoId,
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tplComment = document.getElementById('tplComment').innerHTML;
				var html = juicer(tplComment, data);
				$("#commentsList").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

//点击后打开吐槽详情页
function detail(tucaoId) {
	// alert(tucaoId);
	$.ajax({
		type : "POST",
		url : webRoot + 'detail',
		data : {
			"tucao_id" : tucaoId,
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				$("#t_content").html(data.data.CONTENT);
				$("#t_interval").html(jsDateDiff(data.data.CREATE_TIME));
				curTucaoId=tucaoId;
				refreshCommentList();
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
	$.ui.loadContent("tucaoPanel", null, null, "");

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

function apply() {
	var content = trim($("#tContent").val());

	if (content == "") {
		alert("空");
		return;
	};

	// var isHide = Boolean($("#cAnony").val());
	var isHide = $("#cAnony").val();

	$.ajax({
		type : "POST",
		url : webRoot + 'apply',
		data : {
			"user_id" : userId,
			"content" : content,
			"hide" : isHide,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(data.data);
				nearNew();
				$.ui.loadContent("newMain", null, null, "");
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

function nearHot() {
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
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

function nearNew() {
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : 0,
			"length" : FIRST_LENGTH,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				// document.getElementById("newMain").firstChild.innerHTML = html;
				$("#newMain .afScrollPanel").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});

}

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



function signIn() {
	$("#loginError").hide();
	$.post(webRoot + 'login', $("#loginForm").serialize(), function(data) {
		if (data.success) {
			userId = data.data.USER_ID;
			// alert(userId);
			$.ui.loadContent("hotMain", null, null, "");
		} else {
			$("#loginError").show();
		}
	}, "json");
}

function signUp() {
	$.post(webRoot + 'signup', $("#signupForm").serialize(), function(data) {
		if (data.success) {
			// alert(userId);
			$.ui.loadContent("hotMain", null, null, "");
		} else {
			$.ui.showMask("该邮箱或手机已经注册！");
			window.setTimeout(function() {
				$.ui.hideMask();
			}, 2000);
		}
	}, "json");
}

function startHot() {
	$.ui.clearHistory();
	if (map == null) {//仅第一遍时候加载nearHot
		nearHot();
	};
}

function startNew() {
	$.ui.clearHistory();
	if ($("#newMain").find(".colum").length== 0) {//仅第一遍时候加载nearNew
		nearNew();
	};
	// $.ui.resetScrollers=false; //Do not reset the scrollers when switching panels
}

function startUser() {

}

function startDiscovery() {

}

function startEdit() {
}


function startTucao(){
	$("#navbar").css("height","35px");
	refreshCommentList();
}
function closeTucao(){
	$("#navbar").css("height","45px");
}

function startMylist(){
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : 0,
			"length" : -1,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				// document.getElementById("newMain").firstChild.innerHTML = html;
				$("#mylistPanel .afScrollPanel").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}
function startMycomment(){
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : 6,
			"length" : 3,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				// document.getElementById("newMain").firstChild.innerHTML = html;
				$("#mycommentPanel .afScrollPanel").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}
