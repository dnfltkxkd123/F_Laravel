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
			$sql = "create table table_name()";
			$prepare = $db -> prepare($sql);
			$prepare -> execute();
			*/
			$data = [
				[5,"이름2","주소2",1],
				[6,"이름3","주소3",2],
				[7,"이름4","주소4",3]
			];
			$prepare = $db -> prepare("insert into test values( :id , :name , :addr , :phone );");
			for($i=0 ; $i<count($data) ; $i++){
				$id = $data[$i][0];
				$name = $data[$i][1];
				$addr = $data[$i][2];
				$phone = $data[$i][3];
				$prepare -> bindValue(":id",$id,PDO::PARAM_INT);
				$prepare -> bindValue(":name",$name,PDO::PARAM_STR);
				$prepare -> bindValue(":addr",$addr,PDO::PARAM_STR);
				$prepare -> bindValue(":phone",$phone,PDO::PARAM_INT);
				$prepare -> execute();
			}
			echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
</body>
</html>