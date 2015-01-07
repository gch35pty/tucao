function startEdit() {
}

function showDistanceSelect (img) {
  $(img).attr("src","icons/grid.png");
  $(img).attr("onclick","hideDistanceSelect(this);");
  $("#distanceSelectDiv").show();
}
function hideDistanceSelect (img) {
  $(img).attr("src","icons/ios7-more-outline.png");
  $(img).attr("onclick","showDistanceSelect(this);");
  $("#distanceSelectDiv").hide();
}

function apply() {
	var content = trim($("#tContent").val());

	if (content == "") {
		alert("空");
		return;
	};

	// var isHide = Boolean($("#cAnony").val());
	var isHide = $("#cAnony").val();

	$.ajax({
		type : "POST",
		url : webRoot + 'apply',
		data : {
			"user_id" : userId,
			"content" : content,
			"hide" : isHide,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(data.data);
				nearNew();
				$.ui.loadContent("newMain", null, null, "");
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}