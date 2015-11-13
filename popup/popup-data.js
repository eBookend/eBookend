var bName;
var bDescrip;
var bColor;
var bBookend;

$(function () {  
	$("#create").click(
	function() {	
		sName = document.getElementById("bName").value;
		sDescrip = document.getElementById("bDescrip").value;
		bColor = $('input[name="bColort"]:checked').val();
		bBookend = document.getElementById("bBookend").value;
		
		console.log(bName + "-" + bDescrip + "-" + bColor + "-" + bBookend);
	});
 });