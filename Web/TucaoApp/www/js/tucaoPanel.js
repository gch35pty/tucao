function startTucao(){
	$("#navbar").css("height","35px");
	refreshCommentList();
}
function closeTucao(){
	$("#navbar").css("height","45px");
}

//发表评论
function applycomment () {
	var content = trim($("#commentContent").val());

	if (content == "") {
		alert("空");
		return;
	};
  	$.ajax({
		type : "POST",
		url : webRoot + 'applycomment',
		data : {
			"tucao_id" : curTucaoId,
			"user_id" : userId,
			"content" : content,
			"reply_comment" : -1,
			"hide" : false,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				refreshCommentList();
				$("#commentContent").val("");
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

function refreshCommentList () {
  $.ajax({
		type : "POST",
		url : webRoot + 'comment',
		data : {
			"tucao_id" : curTucaoId,
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tplComment = document.getElementById('tplComment').innerHTML;
				var html = juicer(tplComment, data);
				$("#commentsList").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}