<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		
		try{
			$db = new PDO("mysql:host=localhost;dbname=php2","root","");
			$db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db -> exec("set names utf8");
			/*
			$table = "create table test(
										id int primary key,
										name varchar(20),
										addr varchar(50),
										phone int unique
										);";
			$db -> exec($table);
			*/
			$data = [
				[2,"이름2","주소2",114],
				[3,"이름3","주소3",112],
				[4,"이름4","주소4",111]
			];
			for($i=0 ; $i<count($data) ; $i++){
				$id = $data[$i][0];
				$name = $data[$i][1];
				$addr = $data[$i][2];
				$phone = $data[$i][3];
				$sql = "insert into test values( $id , '$name' , '$addr' , $phone );";
				$db -> exec($sql);
			}
			
			echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
</body>
</html>