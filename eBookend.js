$(function () {
	  $(function() {
		  
		  $(".goDelete").click(function(){
			  var deleteBook = confirm('Are you sure?');
			  if (deleteBook){
				  var bookGetId = $(this).attr("id");
				  var dataString = 'bookGetId=' + bookGetId;
				  var bookData = [];

				  $.ajax({
						type: "POST",
						url: "bookDelete.php",
						data: dataString,
						success: function(result) {
							alert("Deleted!");
						}
				  });
			  }
		  });
		  
		  $(".goEdit").click(function(){
			  
			var bookGetId = $(this).attr("id");
			var dataString = 'bookGetId=' + bookGetId;
			var bookData = [];

			  $.ajax({
					type: "POST",
					url: "bookGetData.php",
					data: dataString,
					success: function(result) { 
			            bookData = result.split("|");
			            $("#editName").attr("value", bookData[0]);
			            $("#editDescrip").attr("value", bookData[1]);
			            $("#editURL").attr("value", bookData[2]);
			          //  $("#editBookend").attr("value", bookData[3]);
			          //  $("#editColor").attr("value", bookData[4]);
			            $("#editBookId").attr("value", bookData[5]);
			        }
			  });
			  	
			  	
		  });
		  
		  $(".goViewDetail").click(function(){
			  
				var bookGetId = $(this).attr("id");
				var dataString = 'bookGetId=' + bookGetId;
				var bookData = [];
				  $.ajax({
						type: "POST",
						url: "bookGetData.php",
						data: dataString,
//						dataType: String,
						success: function(result) { 
				            bookData = result.split("|");
				            $("#viewBookName").text(bookData[0]);
				            $("#viewBookURL").text(bookData[2]);
				            $("#viewBookDescrip").text(bookData[1]);
				        }
				  });
				  	
				  	
			  });
		  
		  $("span").dblclick(function(){
			  	var bookGetId = $(this).attr("id");
			  	bookGetId = bookGetId.replace("id", "");
			  	var dataString = 'bookGetId=' + bookGetId;
				var bookData = [];

				  $.ajax({
						type: "POST",
						url: "bookGetData.php",
						data: dataString,
//						dataType: String,
						success: function(result) { 
				            bookData = result.split("|");
				            window.open("http://" + bookData[2]);
				        }
				  });
		  });
		  
		    $( "span" ).draggable({
		    	containment: "#isDroppable"
		    });
		    $( ".ebookend" ).droppable({
		      drop: function( event, ui ) {
		      	//$( this ).find( ".placeholder" ).remove();
	        	$(ui.draggable).appendTo( this );
	        	$(ui.draggable).css("top","0");
	        	$(ui.draggable).css("left","0");
	        	$(ui.draggable).css("right","0");
	        	$(ui.draggable).css("bottom","0");
		        $( this )
		          .addClass( "ui-state-highlight" )
		          .find( "span" );
		            //.html( "Dropped! Dropped! Dropped! Dropped! Dropped! Dropped!Dropped!" );
		      
		    	var bookendId = $(this).attr("id");
				var bookId = $(ui.draggable).attr("id");
			  	var dataString = 'bookId=' + bookId + '&bookendId=' + bookendId;
			  	$.ajax({
					type: "POST",
					url: "bookendUpdate.php",
					data: dataString
			  	});
			  	console.log(dataString);
		      }
		    });
		  });
});

