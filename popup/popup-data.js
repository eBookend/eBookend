var bName;
var bDescrip;
var bColor;
var bBookend;

$(function () {  
	$("#create").click(
	function() {	
		bName = document.getElementById("bName").value;
		bDescrip = document.getElementById("bDescrip").value;
		bColor = $('input[name="bColor"]:checked').val();
		bBookend = document.getElementById("bBookend").value;
		
		console.log(bName + "-" + bDescrip + "-" + bColor + "-" + bBookend);

		$("#shelf").append("<span class='"+ bColor + "'>" + bName + "</span>");
		
		
		$("#eBookend_overlay").fadeOut(200);
		$("#signup").css({"display":"none"})
		
	});
 });