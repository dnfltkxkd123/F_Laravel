<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	function star($n){
		for($i=0 ; $i<$n ; $i++){
			for($j=0 ; $j<=$i ; $j++ ){
				echo "*";
			}
			echo "<br>";
		}
	}
	star(5);

 ////////////////////////////////////////

	function sum($start , $end){
		$sum = 0;
		for($i=$start ; $i<=$end ;  $i++)
			$sum += $i;
		return $sum;
	}
	echo sum(0,10),"<br>";

////////////////////////////////////////////


	$a = 1;
	$b = 2;
	function test($a){
		echo "(1) $a <br>";
		echo "(2) $GLOBALS["a"] <br>";


		/*
		global $a;
		echo "(2) $a <br>";
		*/
	}
	test(2);
	echo "(3) $a <br>";
	?>
</body>
</html>