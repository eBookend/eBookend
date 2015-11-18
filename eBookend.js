$(function () {
	  $(function() {
		  $(".goEdit").click(function(){
			  
			var bookGetId = $(this).attr("id");
			var dataString = 'bookGetId=' + bookGetId;
			var bookData = [];
			  //colocar ajax
			  $.ajax({
					type: "POST",
					url: "bookGetData.php",
					data: dataString,
//					dataType: String,
					success: function(result) { 
			            bookData = result.split("|");
			            $("#editName").attr("placeholder", bookData[0]);
			            $("#editDescrip").attr("placeholder", bookData[1]);
			            $("#editURL").attr("placeholder", bookData[2]);
			          //  $("#editName").attr("placeholder", bookData[3]);
			          //  $("#editName").attr("placeholder", bookData[4]);
			        }
			  });
			  
			  
			  //retornar
			  	
			  	
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

