$(document).ready(function() {

	$('#modifybutton').click(function() {

		if (!$('#filepathinput').val()) {
			$('#filepathinput').focus();
			return false;
		} else {
			return true;
		}
	});

});
