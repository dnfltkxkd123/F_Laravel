<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	//PDO 객체 : PDO Data Object
	try{

		$db = new PDO("mysql:host=localhost;dbname=php2"/*;port=3307*/,"root","");
		//sql문 ㅣㄹ행시 요루가 발생해도 excpetion을 발생시켜라고 지시
		
		$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$sql = "create table score(
				num int primary key,
				name varchar(20),
				it int
				);";
		$db->exec($sql);
		echo "테이블 생성 성공";
	}catch(PDOException $e){
		exit($e -> getMessage());
	}
	
	?>
</body>
</html>