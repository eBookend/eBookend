var bName;
var bDescrip;
var bColor;
var bBookend;

$(function () {  
	$("#create").click(
	function() {	
		bName = document.getElementById("bName").value;
		bDescrip = document.getElementById("bDescrip").value;
		bColor = $('input[name="bColort"]:checked').val();
		bBookend = document.getElementById("bBookend").value;
		
		console.log(bName + "-" + bDescrip + "-" + bColor + "-" + bBookend);
	});
 });