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
	nearHot(null);
}

function startNew() {
	$.ui.clearHistory();
	nearNew(null);
	// $.ui.resetScrollers=false; //Do not reset the scrollers when switching panels
}

function startUser() {

}

function startDiscovery() {

}

function startEdit() {
}

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

function getPosition(onSuccess) {
	options = {
		enableHighAccuracy : true
	};

	// onSuccess Callback
	// This method accepts a Position object, which contains the
	// current GPS coordinates
	//
	// var onSuccess = function(position) {
	// alert('Latitude: ' + position.coords.latitude + '\n' + 'Longitude: ' + position.coords.longitude + '\n' + 'Altitude: ' + position.coords.altitude + '\n' + 'Accuracy: ' + position.coords.accuracy + '\n' + 'Altitude Accuracy: ' + position.coords.altitudeAccuracy + '\n' + 'Heading: ' + position.coords.heading + '\n' + 'Speed: ' + position.coords.speed + '\n' + 'Timestamp: ' + position.timestamp + '\n');
	// };

	// onError Callback receives a PositionError object
	//
	function onError(error) {
		alert('code: ' + error.code + '\n' + 'message: ' + error.message + '\n');
	}


	navigator.geolocation.getCurrentPosition(onSuccess, onError);
}

function trim(str) {
	return str.replace(/(^\s*)|(\s*$)/g, "");
}

function submitTu(position) {
	// alert('Latitude: ' + position.coords.latitude + '\n' + 'Longitude: ' + position.coords.longitude + '\n' + 'Altitude: ' + position.coords.altitude + '\n' + 'Accuracy: ' + position.coords.accuracy + '\n' + 'Altitude Accuracy: ' + position.coords.altitudeAccuracy + '\n' + 'Heading: ' + position.coords.heading + '\n' + 'Speed: ' + position.coords.speed + '\n' + 'Timestamp: ' + position.timestamp + '\n');
	// 创建地理编码实例
	// var myGeo = new BMap.Geocoder();
	// // 根据坐标得到地址描述
	// myGeo.getLocation(point, function(rs) {
	// var addComp = rs.addressComponents;
	// // alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);
	// });
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
			"userId" : userId,
			"content" : content,
			"hide" : isHide,
			// "lat":position.coords.latitude,
			// "lng":position.coords.longitude
			"lat" : latitude,
			"lng" : longitude,
		},
		success : function(data) {
			if (data.success) {
				alert(data.data);
				// $("#tContent").val(data.data)
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

function nearHot(position) {
	var offset = 0;
	var length = 10;

	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : offset,
			"length" : length,
			// "lat":position.coords.latitude,
			// "lng":position.coords.longitude
			"lat" : latitude,
			"lng" : longitude,
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

function nearNew(position) {
	// alert("nearNew");
	var offset = 0;
	var length = 10;

	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : offset,
			"length" : length,
			// "lat":position.coords.latitude,
			// "lng":position.coords.longitude
			"lat" : latitude,
			"lng" : longitude,
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				generateTuBlocks(data);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});

	function generateTuBlocks(data) {
		var tpl = document.getElementById('tpl').innerHTML;
		var html = juicer(tpl, data);
		document.getElementById("newMain").firstChild.innerHTML = html;
		// alert(html);
	}

}

function drawMap(tucaos) {
	// 百度地图API功能
	// 创建Map实例
	var map = new BMap.Map("hotmap");
	// 创建点坐标
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