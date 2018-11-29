<?php

// 쿠키를 설정

setcookie("cookie[]", "cookiethree");

setcookie("cookie[]","cookietwo");

setcookie("cookie[]","cookieone");

echo count($_COOKIE['cookie']);

for($i=0 ; $i<count($_COOKIE['cookie']) ;$i++ ){
	echo $_COOKIE['cookie'][$i];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>