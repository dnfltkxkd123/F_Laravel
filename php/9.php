<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<?php

$item = ["id","name","addr","phone"];
$user = ["hong","홍길동","서울","123-4567"];
/*
echo $item[0],":",$user[0];
echo "<br>$item[0] : $user[0]";
*/
/*웹페이지에 결과값만 텍스트 형식으로 전달*/

for($i=0 ; $i<count($item) ; $i++)
	echo "$item[$i] : $user[$i]<br>";

?>
</body>
</html>