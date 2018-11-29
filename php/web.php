<?php
	require("Dao.php");
	$dao = new Dao();
	$sort = isset($_REQUEST["sort"])?$_REQUEST["sort"]:"fname";
	$dir = isset($_REQUEST["dir"])?$_REQUEST["dir"]:"asc";
	$result =  $dao -> getList($sort,$dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		a{
			text-decoration: none;
		}
    </style>
</head>
<body>
	<form action="add.php" method="post" enctype="multipart/form-data">
		<input type="file" name="upload">
		<input type="submit" value="업로드">
	</form>
	<table border="1">
		<tr>
			<th>
				파일명
				<a href="?sort=fname&dir=asc">^</a>
				<a href="?sort=fname&dir=desc">v</a>
			</th>
			<th>
				업로드시작
				<a href="?sort=fname&dir=asc">^</a>
				<a href="?sort=fname&dir=desc">v</a>
			</th>
			<th>
				파일크기
				<a href="?sort=fname&dir=asc">^</a>
				<a href="?sort=fname&dir=desc">v</a>
			</th>
			<th>삭제</th>
		</tr>
		<?php foreach($result as $row): ?>
			<tr>
				<td>
					<a href="files/<?=$row["fname"]?>"><?=$row["fname"]?></a>
				</td>
				<td><?=$row["ftime"]?></td>
				<td><?=number_format($row["fsize"])?></td>
				<td><a href="delete.php?num=<?=$row['num']?>">X</a></td>
			</tr>
		<?php endforeach?>
	</table>
</body>
</html>