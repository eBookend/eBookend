<?php
	include("db.php");

	if(isset($_POST["bookId"])){
		$bookId = $db->quote($_POST["bookId"]);
		$bookId = str_replace("id", "" , $bookId);
		
		$bookendId = $db->quote($_POST["bookendId"]);
		$bookendId = str_replace("bookend" , "" , $bookendId);
		
		$query_bookend_update = "UPDATE book SET BookendID=$bookendId WHERE BookId=$bookId";
		
		$db -> query($query_bookend_update);
		
		echo "$query_bookend_update";
	}
?>