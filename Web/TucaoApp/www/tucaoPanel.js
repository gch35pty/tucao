function startTucao(){
	$("#navbar").css("height","35px");
	// refreshCommentList();
}
function closeTucao(){
	$("#navbar").css("height","45px");
}

//点击后打开吐槽详情页
function detail(tucaoId) {
	// alert(tucaoId);
	$.ajax({
		type : "POST",
		url : webRoot + 'tucao/detail',
		data : {
			"tucao_id" : tucaoId,
		},
		success : function(data) {
			if (data.success) {
				// console.log("detailReturn:",JSON.stringify(data));
				$("#t_content").html(data.data[0].content);
				$("#t_comment_num").html(data.data[0].comment_num);
				$("#t_support_num").html(data.data[0].support_num);
				$("#t_user_name").html(data.data[0].user_name);
				$("#t_level").html(data.data[0].level);
				$("#t_interval").html(jsDateDiff(data.data[0].create_time));
				curTucaoId=tucaoId;
				$.ui.loadContent("tucaoPanel", null, null, "");
				// refreshCommentList();
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
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

var commentOffset = 0;
var NEW_LENGTH_COMMENT = 5;
var ADD_LENGTH_COMMENT = 5;
function refreshCommentList () {
  $.ajax({
		type : "POST",
		url : webRoot + 'tucao/comment',
		data : {
			"tucao_id" : curTucaoId,
			"offset" : commentOffset,
			"size" : NEW_LENGTH_COMMENT,
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