$(document).ready(function() {

	$("#searchbutton").click(function() {

		var keyword = $("#searchinput").val();

		if (!keyword) {
			alert("请输入关键字");
			$("#searchinput").focus();
			return false;
		}

		return true;

	});

	$('#submitbutton').click(function() {

		var content = $("#note_content").val();

		if (!content) {
			$("#note_content").focus();
			return false;
		}

		$("note_content").val(HTMLChange(content));

		return true;

	});

	$('#testAJAX').click(function() {
		var xmlhttp;
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				$('#testAJAX').text(xmlhttp.responseText);
				alert("reach" + xmlhttp.responseText);
			}
		};
		xmlhttp.open("GET", "call.php", true);
		xmlhttp.send();
	});
});

function HTMLChange(source){
	
	var changeStr="";
	
	changeStr=source.replace("&","&amp;");
	changeStr=changeStr.replace(" ","&nbsp;");
	changeStr=changeStr.replace("<","&lt;");
	changeStr=changeStr.replace(">","&gt;");	
	changeStr=changeStr.replace("\r\n","<br>");
	changeStr=changeStr.replace("\"", "&quot;");	
	changeStr=changeStr.replace("\'", "&#39;");	
	
	return changeStr;
}

