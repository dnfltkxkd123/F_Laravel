<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try{
			$db = new PDO("mysql:host=localhost;dbname=php3"/*;port=3307*/,"root","");
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db ->exec("set names utf8");
			$id = $_REQUEST["id"];
			$password = $_REQUEST["password"];
			$check = "select id from member;";
			$rs = $db ->query($check);
		    while($row=$rs -> fetch(PDO::FETCH_ASSOC)){
		    	if($row["id"] == $id){
		    		echo "같은 이름의 아이디가 있습니다.";
		    		return; 
		    	}
		    }
		    $sql = "insert into member values('$id','$password');";
		    $db -> exec($sql);
			echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
</body>
</html>