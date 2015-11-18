<?php
	include("db.php");

	if(isset($_POST["bookGetId"])){
		$bookId = $db->quote($_POST["bookGetId"]);
		$bookId = str_replace("goEdit", "" , $bookId);
	
		$query_book_delete = "DELETE FROM book WHERE BookId=$bookId;";
		
		$db -> query($query_book_delete);
	}
?>