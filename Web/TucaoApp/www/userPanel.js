function startUser() {

}

function startMylist(){
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : 0,
			"length" : -1,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				// document.getElementById("newMain").firstChild.innerHTML = html;
				$("#mylistPanel .afScrollPanel").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}
function startMycomment(){
	$.ajax({
		type : "POST",
		url : webRoot + 'nearnew',
		data : {
			"user_id" : userId,
			"distance" : distance,
			"offset" : 6,
			"length" : 3,
			"lat" : position.coords.latitude,
			"lng" : position.coords.longitude
		},
		success : function(data) {
			if (data.success) {
				// alert(JSON.stringify(data));
				var tpl = document.getElementById('tpl').innerHTML;
				var html = juicer(tpl, data);
				// document.getElementById("newMain").firstChild.innerHTML = html;
				$("#mycommentPanel .afScrollPanel").html(html);
			} else {
				alert("error");
			}
		},
		dataType : "json"
	});
}
