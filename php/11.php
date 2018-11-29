<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$data = [
		"국어" => 70,
		"영어" => 90,
		"음악" => 60,
		"미술" => 80
	];

    $max = $data["국어"];
    $maxText = "";
    $min = $data["국어"];
    $minText = "";
    $sum=0;
	foreach ($data as $key => $val) {
		if($max < $val){
			$max = $val;
			$maxText = "최고점수 $key $max 점";
		}
		if($min > $val){
			$min = $val;
			$minText = "최소점수 $key $min 점";
		}
		$sum += $val;
	}
	$avg = $sum/count($data);
	echo "$maxText<br>";
	echo "$minText<br>";
	echo "평균$avg","점";
	?>
</body>
</html>