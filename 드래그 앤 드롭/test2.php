<?php
	$files = $_REQUEST['file']?$_REQUEST['file']:"";
	if($files){
		for($i=0 ; $i<count($files) ; $i++){
			move_uploaded_file($files[$i],'files/drop.html');
			echo "$files[$i] <br>";
		}
	}
?>