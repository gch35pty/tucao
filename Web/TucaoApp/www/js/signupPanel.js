function signUp() {
	// 检查注册时用户名是否重复
	$.post(webRoot + 'site/checkUsername', $("#nameId").text(), function(data) {
		if (data.success) {
			register();
		} else {
			$.ui.showMask("该邮箱或手机已经注册！");
			window.setTimeout(function() {
				$.ui.hideMask();
			}, 2000);
		}
	}, "json");
	
}

// 检查注册时用户名是否重复
function checkUsername() {
	$.post(webRoot + 'site/checkUsername', $("#nameId").text(), function(data) {
		if (data.success) {
		} else {
			$.ui.showMask("该邮箱或手机已经注册！");
			window.setTimeout(function() {
				$.ui.hideMask();
			}, 2000);
		}
	}, "json");
	
}

function register () {
  $.post(webRoot + 'site/register', $("#signupForm").serialize(), function(data) {
		if (data.success) {
			// alert(userId);
			$.ui.loadContent("hotMain", null, null, "");
		} else {
			$.ui.showMask("注册出错！");
			window.setTimeout(function() {
				$.ui.hideMask();
			}, 2000);
		}
	}, "json");
}