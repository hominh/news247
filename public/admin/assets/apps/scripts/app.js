
$("div.alert").delay(3000).slideUp();
function confirmDelete(msg) {
	if(window.confirm(msg)) {
		return true;
	}
	return false;
}

$(document).ready(function() {
	$("a#delImagePost").click(function(){
		var url = "http://localhost:8000/admin/post/delImg/";
		var _token = $("form[name='frmEditPost']").find("input[name='_token']").val();
		var idPost = $('#holder').attr("idHinh");
		var srcImage = $(this).parent().find("img").attr("src");
		var id = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url+idPost,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idPost":idPost,"urlImage":srcImage},
			success: function (data) {
				if(data == "ok") {
					$("#"+id).remove();
				}
			}
		});
	});
});