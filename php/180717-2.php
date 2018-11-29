<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
		<style>
			#customers {
	    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	}

	#customers td, #customers th {
	    border: 1px solid #ddd;
	    padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
	    padding-top: 12px;
	    padding-bottom: 12px;
	    text-align: left;
	    background-color: #4CAF50;
	    color: white;
	}
	</style>
</head>
<body>
	<table border="1" id="customers">
		<tr>
			<th>학번</th>
			<th>이름</th>
			<th>점수</th>
		</tr>
	<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=php2","root","");
		$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db -> exec("set names utf8");
		$prepare = $db -> prepare("select*from score");
		$prepare -> execute();
		while($row = $prepare->fetch(PDO::FETCH_ASSOC)){
			echo"<tr>";
			echo"<td>",$row["num"],"</td>";
			echo"<td>",$row["name"],"</td>";
			echo"<td>",$row["it"],"</td>";
			echo"</tr>";
		} 
	}catch(PDOException $e){
		exit($db -> getMessage());
	}
	?>
	</table>
</body>
</html>