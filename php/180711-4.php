<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1> 함수 테스트 </h1>
	<?php
	function test1($a){
		echo "$a <br>";
	}//변수는 대소분자 구분하지만 함수명은 대소문자 구분 안한다.
	function test3($a,$b,$c){
		echo $a + $b + $b,"<br>";
	}
	test1(5);
	test3(3,4,5);

	function factorial($n){
		$f = 1;

		for($i = $n ; $i >= 1 ; $i--){
			//$f = $f + $i;
			$f *= $i;
		}
		//echo $f;
		return $f;
	}

	factorial(5);

	function getNumber($x,$y){
		$result = $x*10+$y;
		return $result; 
	}
    $a = getNumber(4,5);
    echo $a;
	?>
</body>
</html>