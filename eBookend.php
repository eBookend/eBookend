<?php
	include ("db.php");
	
	if(isset($_POST["bName"])){
		
		$bName = $db->quote($_POST["bName"]);
		$bURL = $db->quote($_POST["bURL"]);
		$bDescrip = $db->quote($_POST["bDescrip"]);
		$bColor = $db->quote($_POST["bColor"]);
		$bBookend = $db->quote($_POST["bBookend"]);
		
		$query_text_insert = "INSERT INTO book(Name, Description, Link, " . 
		"BookendId, CoverColor) VALUES ($bName, $bDescrip, $bURL, $bBookend, $bColor)";
		
		$db -> query($query_text_insert);
	}
	
	$query_books_select = "SELECT * FROM book";
	
	$rowsBook = $db -> query($query_books_select);
	
	$query_bookends_select = "SELECT * FROM bookend";
	
	$rowsBookend = $db -> query($query_bookends_select);	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome to eBookend - your online bookshelf</title>
	<meta charset="utf-8" />
	<link href="eBookend.css" type="text/css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<link rel="shortcut icon" href="http://downloadicons.net/sites/default/files/bookshelf-icon-65330.png"/>
	<script type="text/javascript" src="popup/jquery.eBookend.min.js"></script>
	<script type="text/javascript" src="popup/popup-data.js"></script>
	<script type="text/javascript">
		$(function() {
			$('a[rel*=eBookend]').eBookend({ top : 200, closeButton: ".modal_close" });		
		});
	</script>
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-3318823-14']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	<!--<script type="text/javascript" src="eBookend.js"></script>-->
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	  $(function() {
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
	      }
	    });
	  });
	 </script>	
</head>
<body>
	<h1>eBookend</h1>
	<div>
		<a id="go" rel="eBookend" name="signup" href="#signup"><img style="margin-left:5em; margin-bottom:2em" id="addButton" src="images/newbook.png" /></a>
	</div>
	<div>
		<a id="go" rel="eBookend" name="signup-bookend" href="#signup-bookend"><img style="margin-left:5em; margin-bottom:2em" id="addButton" src="images/newbookend.png" /></a>
	</div>
	
	<div id="shelf">
		<div id="isDroppable">
			<?php
			foreach ($rowsBookend as $rowBookend) {
				$bookendId = $rowBookend["BookendId"];
				$bookendName = $rowBookend["Name"];
				
				print "<div id='bookend$bookendId' class='ebookend'>";
				
				$rowsBook = $db -> query($query_books_select);

	 	 		foreach ($rowsBook as $rowBook) {
	 	 			$bookBookendId = $rowBook["BookendId"];
					
					if($bookendId == $bookBookendId){
						$bookId = $rowBook["BookId"];
						$bookName = $rowBook["Name"];
						$bookDescription = $rowBook["Description"];
						$bookLink = $rowBook["Link"];
						
						$bookCoverColor = $rowBook["CoverColor"];
						print "<span id=id$bookId class=$bookCoverColor ></span>";				
					}
				}			
				print "</div>";	
			}

 	 		?>
	 	 	</div>
 	 	</div>
	</div>
	
	<form action="" method="POST" id="signup">
			<div id="signup-ct">
				<div id="signup-header">
					<h2>Create a new book</h2>
					<p>DIY your own eBookend</p>
					<a class="modal_close" href="#"></a>
				</div>
				<div>
				  	<div class="txt-fld">
				    	<label for="">Book Name</label>
				    	<input id="bName" class="good_input" name="bName" type="text" />
				  	</div>
				  
				  	<div class="txt-fld">
				    	<label for="">URL</label>
				    	<input id="bURL" class="good_input" name="bURL" type="text" />
				  	</div>
				  
				  	<div class="txt-fld">
				    	<label for="">Description</label>
				    	<input id="bDescrip" name="bDescrip" type="text" />
				  	</div>
				  
				  	<div class="other-fld">
				  		<label for="">Cover Color</label>
				  		<input type="radio" name="bColor" value="red" onclick=""/> Red
						<input type="radio" name="bColor" value="yellow" onclick="" checked/> Yellow
			 			<input type="radio" name="bColor" value="green" onclick=""/> Green
			 		</div>
			 		
			 		<div class="other-fld">
			 			<label for="">From </label>
			 			<select id="bBookend" name="bBookend">
			 				<?php
			 					
			 					foreach ($rowsBookend as $rowBookend) {
									$bookendId = $rowBookend["BookendId"];
									$bookendName = $rowBookend["Name"];
									print "<option value='$bookendId'>$bookendName</span>";
								}
			 				
			 				?>
		  				</select>
		  			</div>
				  
				  	<div class="btn-fld">
				  		<button type="submit" id="create">Create it! &raquo;</button>
					</div>
					
				</div>
			</div>
 	 	</form>
 	 	
 	 	<form action="" method="POST" id="signup-bookend">
			<div id="signup-ct">
				<div id="signup-header">
					<h2>Create a new bookend</h2>
					<p>DIY your own eBookend</p>
					<a class="modal_close" href="#"></a>
				</div>
				<div>
				  	<div class="txt-fld">
				    	<label for="">Bookend Name</label>
				    	<input id="bName" class="good_input" name="bName" type="text" />
				  	</div>
				  	<div class="btn-fld">
				  		<button type="submit" id="create-bookend">Create it! &raquo;</button>
					</div>
					
				</div>
			</div>
 	 	</form>
 	 	
 	 	
 	 	
 	 	<div id="books">

 	 	</div>
</body>
</html>