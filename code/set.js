$(document).ready(function() {

	$('#modifybutton').click(function() {

		if ($('#inputnickname').val()) {
			return true;
		} else {
			alert("请输入昵称");
			return false;
		}

	});

});
