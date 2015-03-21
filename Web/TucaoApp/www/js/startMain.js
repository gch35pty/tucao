function startHot() {
	$.ui.clearHistory();
	if (map == null) {//仅第一遍时候加载nearHot
		getPosition(nearHot);
	};
	if (flagUserDistanceChange_hot) {
		nearHot();
		flagUserDistanceChange_hot = false;
	};
}

function startNew() {
	$.ui.clearHistory();
	if ($("#newMain").find(".block").length== 0) {//仅第一遍时候加载nearNew
		getPosition(nearNew);
	};
	if (flagUserDistanceChange_new) {
		nearNew();
		flagUserDistanceChange_new = false;
	};
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
        //crossDomain:true,
        success : function(data) {
            if (data.success) {
                // alert(JSON.stringify(data));
                drawMap(data.data);
            } else {
                if(data.data) {
                    alert(data.data);
                    drawMap([]);
                } else {
                    alert("error");
                    drawMap([]);
                }
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
    var centerPoint = new BMap.Point(longitude, latitude);
    // 初始化地图,设置中心点坐标和地图级别。
    map.centerAndZoom(centerPoint, 15);
    //*********15横向大概1000米范围*********
    var marker = new BMap.Marker(centerPoint);
    map.addOverlay(marker);
    marker.addEventListener("click", function() {
        alert("I'm here");
    });

    // map.disableDragging();
    map.enableDragging();
    //map.disableDragging();

    function SquareOverlay(point, height, length, color, content){
        this._point = point;
        this._length = length;
        this._height = height;
        this._color = color;
        this._content = content;
    }

    // 继承API的BMap.Overlay
    SquareOverlay.prototype = new BMap.Overlay();

    // 实现初始化方法
    SquareOverlay.prototype.initialize = function(map){
        // 保存map对象实例
        this._map = map;
        // 创建div元素，作为自定义覆盖物的容器
        var div = this._div = document.createElement("div");
        div.style.position = "absolute";
        // 可以根据参数设置元素外观
        div.style.width = this._length + "px";
        div.style.lineHeight = this._height + "px";
        //div.style.height = this._height + "px";
        div.style.background = this._color;
        //div.style.textOverflow = "ellipsis";
        //div.style.overflow = "hidden";
        //div.style.whiteSpace = "nowrap";
        //div.style.fontSize = "12px";

        //div.style.backgroundColor = "#EE5D5B";
        div.style.border = "1px solid #BC3B3A";
        div.style.color = "white";
        div.style.padding = "2px";
        div.style.whiteSpace = "nowrap";
        div.style.MozUserSelect = "none";
        div.style.fontSize = "12px"

        var span = this._span = document.createElement("span");
        div.appendChild(span);
        span.appendChild(document.createTextNode(cutStr(this._content,8)));

        //div.innerHTML = this._content;

        var arrow = this._arrow = document.createElement("div");
        arrow.style.background = "url(static/img/arrow.png) no-repeat";
        arrow.style.position = "absolute";
        arrow.style.width = "11px";
        arrow.style.height = "10px";
        arrow.style.top = "22px";
        arrow.style.left = "10px";
        arrow.style.overflow = "hidden";
        div.appendChild(arrow);

        // 将div添加到覆盖物容器中
        map.getPanes().markerPane.appendChild(div);
        // 保存div实例
        this._div = div;
        // 需要将div元素作为方法的返回值，当调用该覆盖物的show、
        // hide方法，或者对覆盖物进行移除时，API都将操作此元素。
        return div;
    }

    // 实现绘制方法  （您需要在draw方法中设置覆盖物的位置，每当地图状态发生变化（比如：位置移动、级别变化）时，API都会调用覆盖物的draw方法，用于重新计算覆盖物的位置）
    SquareOverlay.prototype.draw = function(){

        var position = map.pointToOverlayPixel(this._point);
        this._div.style.left = position.x - this._length / 2 + "px";
        this._div.style.top = position.y - this._length / 2 + "px";
    }
    // 实现显示方法
    SquareOverlay.prototype.show = function(){
        if (this._div){
            this._div.style.display = "";
        }
    }
    // 实现隐藏方法
    SquareOverlay.prototype.hide = function(){
        if (this._div){
            this._div.style.display = "none";
        }
    }

    SquareOverlay.prototype.addEventListener = function(event,fun){
        this._div['on'+event] = fun;
    }

    setTimeout(function() {
        //设置地图中心点。center除了可以为坐标点以外，还支持城市名
        map.setCenter(centerPoint);
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
            //在地图上画上小图钉
            //addMarker(point, index);

            // 添加自定义覆盖物
            var mySquare = new SquareOverlay(point, 18, 100,"red", tucaos[index].CONTENT);
            map.addOverlay(mySquare);
//            mySquare.addEventListener("click",function(e){
//                alert(mySquare._content);
//            });
            (function(){
                var _marker = mySquare; //当初存的覆盖物变量，这里派上用场了。
                var content = _marker._content;
                var _index = index;
                mySquare.addEventListener("click",function(e){
                    //alert(_index+" //// " +content);
                    tucaos[_index].distanceFrom = parseInt(tucaos[_index].distanceFrom);
                    tucaos[_index].timeFrom = jsDateDiff(tucaos[_index].CREATE_TIME);
                    var infoContent = juicer(tplBlock, tucaos[_index]);
                    var infoWindow = new BMap.InfoWindow(infoContent);
                    map.openInfoWindow(infoWindow,centerPoint);
                    //图片加载完毕重绘infowindow
                    if(document.getElementById('imgDemo')) {
                        document.getElementById('imgDemo').onload = function () {
                            infoWindow.redraw();
                            //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
                        }
                    }
                });
            })()
        }


        function addMarker(point, index) {// 创建图标对象
            var myIcon = new BMap.Icon("http://api.map.baidu.com/mapCard/img/location.gif", new BMap.Size(14, 23), {
                // 指定定位位置。
                // 当标注显示在地图上时，其所指向的地理位置距离图标左上
                // 角各偏移7像素和25像素。您可以看到在本例中该位置即是
                // 图标中央下端的尖角位置。
                anchor : new BMap.Size(7, 25)
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
                if(document.getElementById('imgDemo')) {
                    document.getElementById('imgDemo').onload = function () {
                        infoWindow.redraw();
                        //防止在网速较慢，图片未加载时，生成的信息框高度比图片的总高度小，导致图片部分被隐藏
                    }
                }
            });
        }

    }, 500);
}


