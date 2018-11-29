<?php
	$file = fopen("rows.text","r");
	require("BoardDao.php");
	$dao = new BoardDao();
	
	while(!feof($file)){//[안녕,홍길동,....,] 한줄씩 읽어서  ','를 기준으로 추출한 데이터를 1차원 배열로 만들어 준다. fgetcsv();
		$data = fgetcsv($file);
		for($i=0 ; $i<count($data); $i++){
			//echo $data[$i]," ";
		}
		$dao -> insertData($data[0],$data[1],$data[2]);
	}
	fclose($file);
?>