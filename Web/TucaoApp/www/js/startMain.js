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

function nearHot() {
	$.ajax({
		type : "POST",
		url : webRoot + 'tucao/nearhot',
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

//顶和踩的逻辑方法
function supportMethod(obj,tucaoId,status){
	if ($(obj).parent().hasClass('changed')) {
		$.ui.showMask("已经评价过了");
		window.setTimeout(function() {
			$.ui.hideMask();
		}, 500);
	} else {
		//更新数据库
		$.ajax({
			type : "POST",
			url : webRoot + 'tucao/support',
			data : {
				"user_id" : userId,
				"tucao_id" : tucaoId,
				"status" : status,
			},
			success : function(data) {
				if (data.success) {
					var numNode = obj.parentNode.getElementsByTagName("span")[0];
					numNode.innerHTML = parseInt(numNode.innerHTML) + status*2-1; //顶+1 踩-1
					$(obj).css("color","#0000ff"); 
					$(obj).parent().addClass('changed');
				} else {
					$.ui.showMask("已经评价过了");
					window.setTimeout(function() {
						$.ui.hideMask();
					}, 500);
				}
			},
			dataType : "json"
		});
	}
}

//向上顶起
function upClick(obj,tucaoId) {
	supportMethod(obj,tucaoId,1);
}

//向下踩
function downClick(obj,tucaoId) {
	supportMethod(obj,tucaoId,0);
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


