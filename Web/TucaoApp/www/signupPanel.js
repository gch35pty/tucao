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