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
	
	if(isset($_POST["editBookId"])){
		$editBookId = $db->quote($_POST["editBookId"]);
		$editName = $db->quote($_POST["editName"]);
		$editURL = $db->quote($_POST["editURL"]);
		$editDescrip = $db->quote($_POST["editDescrip"]);
		$editColor = $db->quote($_POST["editColor"]);
		$editBookend = $db->quote($_POST["editBookend"]);
		
		$query_text_edit_book = "UPDATE book SET Name=$editName, Description=$editDescrip, Link=$editURL, " . 
		"BookendId=$editBookend, CoverColor=$editColor WHERE BookId=$editBookId";
		
		$db -> query($query_text_edit_book);
	}
	
	if(isset($_POST["beName"])){
		
		$beName = $db->quote($_POST["beName"]);
		
		$query_new_bookend = "INSERT INTO bookend(Name) VALUES ($beName)";
		
		$db -> query($query_new_bookend);
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
	<link href="css/eBookend.css" type="text/css" rel="stylesheet" />
	<link href="css/popover.css" type="text/css" rel="stylesheet" />
	
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
	<script type="text/javascript" src="eBookend.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
	<h1>eBookend</h1>
	<div class="fixed">
		<a id="go" rel="eBookend" name="signup" href="#signup"><img style="margin-left:5em; margin-bottom:2em" id="addButton" src="images/newbook.png" /></a>
	<br />
		<a id="go" rel="eBookend" name="signup-bookend" href="#signup-bookend"><img style="margin-left:5em; margin-bottom:2em" id="addButton" src="images/newbookend.png" /></a>
	</div>
	
	<br />
	
	<div id="shelf">
		<div id="isDroppable">
			<?php
			foreach ($rowsBookend as $rowBookend) {
				$bookendId = $rowBookend["BookendId"];
				$bookendName = $rowBookend["Name"];
				
				$count = 0;
				
				print "<div id='bookend$bookendId' class='ebookend'>";
				?>
				<div class="user" id="ebookend-name">
					<?php
					print "<p>$bookendName</p>";
					?>
					<ul>
        				<li><a id="go" rel="eBookend" name="edit-bookend" href="#edit-bookend">Edit</a></li>
        				<li><a href="" onclick="if (confirm('Are you sure you want to delete this book?')) toDelete();">Delete</a></li>
      				</ul>	
      			</div>
      			<?php
				
				$rowsBook = $db -> query($query_books_select);

	 	 		foreach ($rowsBook as $rowBook) {
	 	 			$bookBookendId = $rowBook["BookendId"];
					
					if($bookendId == $bookBookendId){
						$bookId = $rowBook["BookId"];
						$bookName = $rowBook["Name"];
						$bookDescription = $rowBook["Description"];
						$bookLink = $rowBook["Link"];
						$bookCoverColor = $rowBook["CoverColor"];
						
						if(($count % 9 == 0) && ($count != 0)){
							print "</div><div id='bookend$bookendId' class='ebookend'>";	
						}
						
						$count++;
						
						print "<span class='user' id='id$bookId'>";
						
						
						print "<div  class='$bookCoverColor bookRafa' >
								<div id='bookName'>$bookName</div>
							";
						?>
								<ul>
	        						<li><a id="goEdit<?=$bookId?>" rel="eBookend" name="detail" href="#detail" class="goViewDetail">View details</a></li>
	        						<li><a id="goEdit<?=$bookId?>" rel="eBookend" name="edit" href="#edit" class="goEdit">Edit</a></li>
	        						<li><a id="goEdit<?=$bookId?>" href="" class="goDelete">Delete</a></li>
	      						</ul>
      						</div>	
      					</span>
      					<?php		
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
			 					$rowsBookend = $db -> query($query_bookends_select);
			 					
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
				    	<input id="beName" class="good_input" name="beName" type="text" />
				  	</div>
				  	<div class="btn-fld">
				  		<button type="submit" id="create-bookend">Create it! &raquo;</button>
					</div>
					
				</div>
			</div>
 	 	</form>
 	 	
 	 	<form action="" method="POST" id="edit">
			<div id="signup-ct">
				<div id="signup-header">
					<h2>Edit your book</h2>
					<p>DIY your own eBookend</p>
					<a class="modal_close" href="#"></a>
				</div>
				<div>
				  	<div class="txt-fld">
				    	<label for="">Book Name</label>
				    	<input id="editName" class="good_input" name="editName" type="text" placeholder=""/>
				  	</div>
				  
				  	<div class="txt-fld">
				    	<label for="">URL</label>
				    	<input id="editURL" class="good_input" name="editURL" type="text" placeholder=""/>
				  	</div>
				  
				  	<div class="txt-fld">
				    	<label for="">Description</label>
				    	<input id="editDescrip" name="editDescrip" type="text" placeholder=""/>
				  	</div>
				  
				  	<div class="other-fld">
				  		<label for="">Cover Color</label>
				  		<input type="radio" name="editColor" value="red" onclick=""/> Red
						<input type="radio" name="editColor" value="yellow" onclick="" checked/> Yellow
			 			<input type="radio" name="editColor" value="green" onclick=""/> Green
			 		</div>
			 		
			 		<div class="other-fld">
			 			<label for="">From </label>
			 			<select id="editBookend" name="editBookend">
			 				<?php
			 					$rowsBookend = $db -> query($query_bookends_select);
			 					
			 					foreach ($rowsBookend as $rowBookend) {
									$bookendId = $rowBookend["BookendId"];
									$bookendName = $rowBookend["Name"];
									print "<option value='$bookendId'>$bookendName</span>";
								}
			 				
			 				?>
		  				</select>
		  			</div>
		  			
		  			<div class="hidden">
				    	<label for="">EditBookId</label>
				    	<input id="editBookId" name="editBookId" type="text" placeholder=""/>
				  	</div>
				  
				  	<div class="btn-fld">
				  		<button type="submit" id="finish">Finish! &raquo;</button>
					</div>
					
				</div>
			</div>
 	 	</form>
 	 	
 	 	 	 	<form action="" method="POST" id="edit-bookend">
			<div id="signup-ct">
				<div id="signup-header">
					<h2>Create a new bookend</h2>
					<p>DIY your own eBookend</p>
					<a class="modal_close" href="#"></a>
				</div>
				<div>
				  	<div class="txt-fld">
				    	<label for="">Bookend Name</label>
				    	<input id="edit-beName" class="good_input" name="edit-beName" type="text" placeholder="Original bookend name" />
				  	</div>
				  	<div class="btn-fld">
				  		<button type="submit" id="finish-bookend">Finish! &raquo;</button>
					</div>
					
				</div>
			</div>
 	 	</form>
 	 	
 	 	<form action="" id="detail">
 	 		<section class="notepad">
    			<div class="notepad-heading">
    			</div>
    			<blockquote>
    				<h3>Book name: <h4 id="viewBookName"></h4></h3>
      				
    			</blockquote>
    			<blockquote>
      				<h3>URL: </h3><h4 id="viewBookURL"></h4>
    			</blockquote>
   				<blockquote>
      				<h3>Description: </h3>
      				<h4 id="viewBookDescrip"></h4>
    			</blockquote>
  			</section>
 	 	</form>
 	 	
 	 	<div id="books">

 	 	</div>
</body>
</html>