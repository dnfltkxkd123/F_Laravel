<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$langCheck = isset($_REQUEST["lang"]);
	$hobbyCheck = isset($_REQUEST["hobby"]);
	
	
	echo "관심언어 : ";
	if($langCheck){
		$lang = $_REQUEST["lang"];
		for($i=0 ; $i<count($lang) ;  $i++)
			echo $lang[$i]," , ";
	}
	else{
		echo"선택안함";
	}
	
	echo "<br>취미 : ";
	if($hobbyCheck){
		$hobby = $_REQUEST["hobby"];
	    for($i=0 ; $i<count($hobby) ;  $i++)
	    	echo $hobby[$i]," , ";
	}
	else{
		echo"선택안함";
	}
	?>
</body>
</html>