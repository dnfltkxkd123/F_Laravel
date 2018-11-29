<?php
	session_start();
	$id = isset($_SESSION["id"]);
	$name = isset($_SESSION["name"]);
	if($id && $name){
		unset($_SESSION["id"]);
    	unset($_SESSION["name"]);
    	header("Location: main.php");
	}else{
		errorBack("오류");
		header("Location: main.php");
	}
    
?>
