<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$gv = 1;
	function test(){
		$a =1;
		//echo $GLOBAL["gv"],"<br>"; // $GLOBAL[] 전역변수라고 알려줌
		global $gv;
		echo $gv;
		return ;
	}
	test();
	//echo $a; 지역변수라서 실행 안됨
	?>
</body>
</html>