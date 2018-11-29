<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$phone = [
		"101" => "111-222",
		"102" => "222-333",
		"103" => "333-444",
		"104" => "444-555",
		"105" => "555-666"
	];
	
	$req = $_GET["num"];
	$check = isset($phone[$req]);
	if( $check ){
		echo "전화번호 : $phone[$req]";
	}else{
		echo "실패했습니다!";
	}
	
	/*
	$req = $_REQUEST["num"];
	$result = "";
	foreach($phone as $key => $val){
		if($req == $key){
			$result = "전화번호 : $val";
			break;
		}
		else{
			$result = "실패했습니다.";
		}
	}
	echo $result;
	*/
	?>
</body>
</html>