/*首页下拉更新*/
var myScroller;
var offset = FIRST_LENGTH;
var length = 5;
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
		//获取最新吐槽
		$.ajax({
			type : "POST",
			url : webRoot + 'nearnew',
			data : {
				"user_id" : userId,
				"distance" : distance,
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
			//开始
			// console.log('log 完成');
			if (!flagMyScroller)
				return;
			flagMyScroller = false;

			//按照offset加载更多吐槽
			$.ajax({
				type : "POST",
				url : webRoot + 'nearnew',
				data : {
					"user_id" : userId,
					"distance" : distance,
					"offset" : offset,
					"length" : length,
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
							offset += length;
							flagMyScroller = true;
							return;
						}
						//*********
						var tpl = $('#tpl').html();
						var html = juicer(tpl, data);
						// var html = "<div style='margin-top:10px;width:100%;height:20px;text-align:center;'>！！！</div>";
						$("#newMain .afScrollPanel").append(html);
						//*********
						offset += length;
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

