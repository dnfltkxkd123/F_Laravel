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
				[10,"김",40] , 
				[8,"박",77] , 
				[9,"유",39] 
			];
			$pstmt = $db -> prepare("insert into score values(:num,:name,:score);");
			for($i=0 ; $i < count($records); $i++ ){
				$num = $records[$i][0];
				$name = $records[$i][1];
				$score = $records[$i][2];
				$pstmt -> bindValue(":num",$num,PDO::PARAM_INT);
				$pstmt -> bindValue(":name",$num,PDO::PARAM_STR);
				$pstmt -> bindValue(":score",$score,PDO::PARAM_INT);
				$pstmt -> execute();
			};
			echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
</body>
</html>