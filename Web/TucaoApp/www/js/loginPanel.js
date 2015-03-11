function signIn() {
    $("#loginError").hide();
	$.post(webRoot + 'site/login', $("#loginForm").serialize(), function(data) {
		if (data.success) {
			userId = data.data.user_id;
		// alert(userId);
			$.ui.loadContent("hotMain", null, null, "");
		} else {
			$("#loginError").show();
		}
	}, "json");
    // $.ajax({
        // type : "GET",
        // url : webRoot + 'site/login',
        // data : $("#loginForm").serialize(),
        // jsonp: "callback",//传递给请求处理程序或页面的，用以获得jsonp回调函数名的参数名(默认为:callback)
        // jsonpCallback:"success_jsonpCallback",//自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
        // success : function(data) {
            // if (data.success) {
                // userId = data.data.user_id;
                // // alert(userId);
                // $.ui.loadContent("hotMain", null, null, "");
            // } else {
                // $("#loginError").show();
            // }
        // },
        // crossDomain:true,
        // dataType : "jsonp"
    // });
}