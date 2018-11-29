<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$nameCheck = isset($_REQUEST["name"]);
	$numCheck = isset($_REQUEST["num"]);
	$phoneCheck = isset($_REQUEST["phone"]);
	$langCheck = isset($_REQUEST["lang"]);
	$hobbyCheck = isset($_REQUEST["hobby"]);
	
	if($nameCheck){
		echo "이름 : ",$_REQUEST["name"] ,"<br>";
	}
	if($numCheck){
		echo "학번 : ",$_REQUEST["num"] ,"<br>";
	}
	if($phoneCheck){
		echo "전화번호 : ",$_REQUEST["phone"] ,"<br>";
	}

	echo "관심언어 : ";
	if($langCheck){
		$lang = $_REQUEST["lang"];
		foreach($lang as $val)
			echo "$val ";
		
	}

    echo "<br>";
	echo "취미 : ";
	if($hobbyCheck){
		$hobby = $_REQUEST["hobby"];
		foreach($hobby as $val)
			echo "$val ";
	}
	?>
</body>
</html>