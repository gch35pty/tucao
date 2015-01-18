function signIn() {
	$("#loginError").hide();
	$.post(webRoot + 'site/login', $("#loginForm").serialize(), function(data) {
		if (data.success) {
			console.log("loginReturn:",JSON.stringify(data));
			userId = data.data.user_id;
			// alert(userId);
			$.ui.loadContent("hotMain", null, null, "");
		} else {
			$("#loginError").show();
		}
	}, "json");
}