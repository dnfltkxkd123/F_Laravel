<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>번호</th>
			<th>이름</th>
			<th>IT과목 점수</th>
	    </tr>
	<?php
	try{
		//PDO객체 생성
		$db = new PDO("mysql:host=localhost;dbname=php2","root","");
		$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db ->exec("set names utf8");
		$sql = "select*from score";
		$rs = $db ->query($sql);
		while($row=$rs -> fetch(PDO::FETCH_ASSOC)){
			echo "<tr>";
			echo "<td>",$row["num"],"</td>";
			echo "<td>",$row["name"],"</td>";
			echo "<td>",$row["it"],"</td>";
			echo "</tr>";
		}
	}catch(PDOException $e){
		exit($e -> getMessage());
	}
	?>
	
	</table>
</body>
</html>