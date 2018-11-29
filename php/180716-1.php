<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try{
			$db = new PDO("mysql:host=localhost;dbname=php2"/*;port=3307*/,"root","");
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db ->exec("set names utf8");
			$sql = "";
			$records = [ 
				[2,"D",40] , 
				[4,"바보",77] , 
				[5,"C",39] 
			];
			for($i=0 ; $i < count($records); $i++ ){
				$num = $records[$i][0];
				$name = $records[$i][1];
				$score = $records[$i][2];
				$sql = "insert into score values($num,'$name',$score);";
				$db -> exec($sql);
			};
			echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
</body>
</html>