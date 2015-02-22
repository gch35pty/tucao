function startTucao(){
	$.ajax({
		type : "POST",
		url : webRoot + 'tucao/detail',
		data : {
			"tucao_id" : curTucaoId,
		},
		success : function(data) {
			if (data.success) {
				//juicer设置吐槽内容
				var tplComment = document.getElementById('tplTucao').innerHTML;
				var html = juicer(tplComment, data.data[0]);
				$("#tucaoContent").html(html);
				//加载评论列表
				refreshCommentList();
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
	$("#navbar").css("height","35px");
}
function closeTucao(){
	$("#navbar").css("height","45px");
}

//点击后打开吐槽详情页
function detail(tucaoId) {
	curTucaoId = tucaoId;
	$.ui.loadContent("tucaoPanel", null, null, "");
}

var commentOffset = 0;
var NEW_LENGTH_COMMENT = 5;
var ADD_LENGTH_COMMENT = 5;
//首次加载全部的comment列表
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
				//通过juicer加载评论template
				var tplComment = document.getElementById('tplComment').innerHTML;
				var html = juicer(tplComment, data);
				$("#commentsList").html(html);
				//修改offset位置
				commentOffset+=data.data.length;
			} else {
				// alert("error");
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
		url : webRoot + 'tucao_comment/apply',
		data : {
			"tucao_id" : curTucaoId,
			// "user_id" : userId,
			"content" : content,
			"reply_comment" : -1,
			"hide" : 0,
			// "lat" : position.coords.latitude,
			// "lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				// 发表后更新评论列表
				refreshCommentList();
				//评论框置为空
				$("#commentContent").val("");
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}

