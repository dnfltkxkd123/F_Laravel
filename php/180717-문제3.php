<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" id="customers">
		<tr>
			<th>학번</th>
			<th>이름</th>
			<th>주소</th>
			<th>전화번호</th>
		</tr>
	<?php
		try{
			$db = new PDO("mysql:host=localhost;dbname=php2","root","");
			$db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db -> exec("set names utf8");
			$sql = "select*from test;";
			$rs = $db -> query($sql);
			while($row = $rs -> fetch(PDO::FETCH_ASSOC)){
				echo"<tr>";
				echo"<td>",$row["id"],"</td>";
				echo"<td>",$row["name"],"</td>";
				echo"<td>",$row["addr"],"</td>";
				echo"<td>",$row["phone"],"</td>";
				echo"</tr>";
			}
			//echo"성공";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
	?>
	</table>
</body>
</html>