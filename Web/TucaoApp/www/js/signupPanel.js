function showError(errorString) {
	$.ui.showMask(errorString);
	window.setTimeout(function() {
		$.ui.hideMask();
	}, 2000);
}

function signUp() {
	var errorString = "";
	if (trim($("#userName").val())=="") {
		errorString = "手机号不能为空";
	} else if (trim($("#nickName").val())=="") {
		errorString = "昵称不能为空";
	} else if (trim($("#password").val())==""){
		errorString = "密码不能为空";
	}else if (trim($("#password").val())!=trim($("#password2").val())){
		errorString = "两次密码不一致";
	}
	
	if (errorString!="") {
		return showError(errorString);
	};
	
	// 检查注册时用户名是否重复
	$.ajax({
			type : "POST",
			url : webRoot + 'site/checkUsername',
			data : {
				"user_name" : trim($("#userName").val()),
			},
			success : function(data) {
				//检查注册时昵称是否存在
				if (data.success) {
					$.ajax({
						type : "POST",
						url : webRoot + 'site/checkNickname',
						data : {
							"nick_name" : trim($("#nickName").val()),
						},
						success : function(data) {
							if (data.success) {
								register();
							} else {
								showError("昵称已被使用");
							}
						},
						dataType : "json"
					});
				} else {
					showError("该手机号已经注册！");
				}
			},
			dataType : "json"
		});
			
}

function register () {
	$.ajax({
		type : "POST",
		url : webRoot + 'site/register',
		data : {
			"username" : trim($("#userName").val()),
			"nick_name" : trim($("#nickName").val()),
			"password" : trim($("#password").val()),
			"default_pic" : 0,
			"gender" : 0,
		},
		success : function(data) {
			if (data.success) {
				$.ui.loadContent("hotMain", null, null, "");
			} else {
				showError("注册出错！");
			}
		},
		dataType : "json"
	});
}