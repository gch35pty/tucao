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