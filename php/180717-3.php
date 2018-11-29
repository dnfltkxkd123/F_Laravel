<?php
	try{
		$db = new PDO("mysql:host=localhost;dbname=php2","root","");
		$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db ->exec("set names utf8");
		$prepare = $db -> prepare("select*from score");
		$prepare -> execute();
		$result = $prepare -> fetchAll(PDO::FETCH_ASSOC);
	}catch(PDOException $e){
		exit($e -> getMessage());
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<th>번호</th>
			<th>이름</th>
			<th>점수</th>
		</tr>
		<?php foreach($result as $row): ?>
			<tr>
				<td><?= $row["num"] ?></td>
				<td><?= $row["name"] ?></td>
				<td><?= $row["it"] ?></td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>