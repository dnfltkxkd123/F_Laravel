<?php
	require("Dao2.php");
	$db = new Dao();
	$sort = isset($_REQUEST["sort"])?$_REQUEST["sort"]:"fname";
	$dir = isset($_REQUEST["dir"])?$_REQUEST["dir"]:"asc";
	$result = $db -> getList($sort,$dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="Add2.php?sort=<?=$sort?>&dir=<?=$dir?>" method="post" enctype="multipart/form-data">
		<input type="file" value="파일" name="file">
		<br><input type="submit" value="업로드">
	</form>
	<table border="1">
		<tr>
			<th>
			 	파일명
			 	<a href="?sort=fname&dir=desc">^</a>
				<a href="?sort=fname&dir=asc">v</a>
			</th>
			<th>
				업로드 날짜
				<a href="?sort=ftime&dir=desc">^</a>
				<a href="?sort=ftime&dir=asc">v</a>
			</th>
			<th>
				크기
				<a href="?sort=fsize&dir=desc">^</a>
				<a href="?sort=fsize&dir=asc">v</a>
			</th>
			<th>
				삭제
			</th>
		</tr>
		<?php foreach($result as $row): ?>
		<tr>
			<td>
				<a href=" files/<?=$row['fname']?> "><?= $row["fname"] ?></a>
			</td>
			<td>
				<?= $row["ftime"] ?>
			</td>
			<td>
				<?= $row["fsize"] ?>
			</td>
			<td><a href="Delete2.php?num=<?=$row['num']?>&sort=<?=$sort?>&dir=<?=$dir?>">X</a></td>
		</tr>
		<?php endforeach ?>
	</table>
</body>
</html>