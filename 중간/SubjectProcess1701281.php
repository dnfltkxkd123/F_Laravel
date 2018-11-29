170281최찬민
<?php
	$web = $_REQUEST['web'];
	$data = $_REQUEST['data'];
	$programing = $_REQUEST['programing'];
	$avg = ($web+$data+$programing)/3;

	$max = $web;
	if($max < $data){
		$max = $data;
	}
	if($max < $programing){
		$max = $programing;
	}
	$min = $web;
	if($min > $data){
		$min = $data;
	}
	if($min > $programing){
		$min = $programing;
	}
	echo '<br>평균:',$avg,'<br>';
	echo '최고 점수:',$max,'<br>';
	echo '최저점수:',$min,'<br>';
?>
	