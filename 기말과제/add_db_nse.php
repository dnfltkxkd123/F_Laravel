<?php
	require("connect_db.php");
	$text = $_REQUEST["ir1"];
	$dao = new Dao();
	$dao -> insertText($text);
	$dao -> getText($text);
?>