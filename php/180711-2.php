<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$phone = [
		["101","102","103","104","105"],
		["1111","22222","333333","444444","55555"]
	];
	$check = isset($_REQUEST["num"]);
	if($check){
		$num = $_REQUEST["num"];
		$result = "정보가 없습니다.";
	    for($i=0 ; $i<count($phone[0]) ; $i++){
	    	if($phone[0][$i] == $num){
	    		$result = $phone[1][$i];
	    		break;
	    	}
	    }
	    echo "전화번호 : $result";
	}
	
	?>
</body>
</html>