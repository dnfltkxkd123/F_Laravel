<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$user = [
              "id" => "hong",
              "name" => "홍길동",
              "addr" => "서울",
              "phone" => "123"
    ];
    //foreach
    foreach ($user as $key => $val) 
    	echo "$key : $val <br>";
    
    //foreach(배열 as 한칸에 담을 변수)
    foreach ($user as $val) {
    	# code...
    	echo "$val <br>";
    };
	?>
</body>
</html>