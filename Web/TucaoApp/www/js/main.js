/**
 * Created by gongchen on 15-1-25.
 */
require.config({
    paths: {
        "jquery": "../build/jquery-1.11.0-min",
        "jqaf": "../build/jq.appframework.min",
        "appframeworkui": "../build/ui/appframework.ui",
        "af": "../build/appframework",
        "juicer": "../build/juicer-min",

        "tool" : "tool",
        "scroll" : "scroll",
        "startMain" : "startMain",
        "editPanel" : "editPanel",
        "chatPanel" : "chatPanel",
        "loginPanel" : "loginPanel",
        "signupPanel" : "signupPanel",
        "tucaoPanel" : "tucaoPanel",
        "userPanel" : "userPanel",

        "af.scroller" : "../plugins/af.scroller"
    },
    shim: {
        jqaf: {
            deps: [
                'jquery'
            ]
        },
        appframeworkui:{
            deps: [
                'jqaf'
            ]
        },
        juicer: {
            deps: [
                'jquery'
            ],
            exports: "juicer"
        }
    }
});


// Now that we have configured a named alias for the App Framework
// library, let's try to load it using the named module.
require(
    ["jquery","tool","juicer","af","jqaf","appframeworkui","af.scroller","startMain","editPanel",
    "chatPanel","loginPanel","signupPanel","tucaoPanel","userPanel"],//,"jqaf","appframeworkui"],
    function(jquery,tool,juicer){
		if (!((window.DocumentTouch && document instanceof DocumentTouch) || 'ontouchstart' in window)) {
			var script = document.createElement("script");
			script.src = "plugins/af.desktopBrowsers.js";
			var tag = $("head").append(script);
		}

        //注册自定义函数
        juicer.register('jsDateDiff', jsDateDiff);
        juicer.register('random29', random29);

        // set to ios7 ---cky
        $.ui.ready(function() {
            $("#afui").get(0).className = '';
        });

        $.ui.autoLaunch = false;
        $.ui.backButtonText = " ";

        $(document).ready(function() {
            $.ui.launch();
            $("#loginError").hide();
            $("#distanceSelectDiv").hide();
            $.ui.updateBadge("#messageIcon",'2','tr','red');
        });

        var onDeviceReady = function() {// called when Cordova is ready
            if (window.Cordova && navigator.splashscreen) {// Cordova API detected
                $.ui.launch();
                navigator.splashscreen.hide();
                // hide splash screen
            }
        };
        document.addEventListener("deviceready", onDeviceReady, false);
        
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
		nearNew();
		return false;
	});

	$.bind(myScroller, "refresh-cancel", function() {
		this.hideRefresh();
		console.log("cancelled");
	});

	myScroller.enable();

	$.bind(myScroller, "infinite-scroll", function() {
		var self = this;
		console.log("infinite triggered");
		if ($(self.el).find(".iNoContent").length > 0) {
			$(this.el).append("<div id='iNoContent' style='margin-top:10px;width:100%;height:20px;text-align:center;'>----------------</div>");
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
							// offset += ADD_LENGTH;
							flagMyScroller = true;
							return;
						}
						//*********
						var tpl = $('#tpl').html();
						var html = juicer(tpl, data);
						$("#newMain .afScrollPanel").append(html);
						//*********
						offset += data.data.length;
						flagMyScroller = true;
					} else {
						$(self.el).find("#infinite").remove();
						self.clearInfinite();
						self.scrollToBottom();
						$(self.el).append('<div class="iNoContent"></div>');
						// offset += ADD_LENGTH;
						flagMyScroller = true;
						return;
					}
				},
				dataType : "json"
			});
			//结束

		});
	});
	// $("#newMain").css("overflow", "auto");
});
    }
);