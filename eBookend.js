$(function () {
	  $(function() {
		  $("span").click(function(){
			  console.log("cliquei");
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