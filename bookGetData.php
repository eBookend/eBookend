<?php
	include("db.php");

	if(isset($_POST["bookGetId"])){
		$bookId = $db->quote($_POST["bookGetId"]);
		$bookId = str_replace("goEdit", "" , $bookId);
	
		$query_book_select = "SELECT Name, Description, Link, BookendId, CoverColor FROM book WHERE BookId=$bookId";
		
		$rows = $db -> query($query_book_select);
		
		$string = "";
		
		foreach($rows as $result){
			$string .= $result["Name"] . "|";
			$string .= $result["Description"] . "|";
			$string .= $result["Link"] . "|";
			$string .= $result["BookendId"] . "|";
			$string .= $result["CoverColor"];
		}
		
		echo "$string";
	}
?>