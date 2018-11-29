<?php
	require("webHardDao.php");
	$dao = new WebHardDao();
	/*
	$sort = $_REQUEST["sort"];
	if(isset($sort) == false){
		$sort = "fname";
	}
	*/

	$sort = isset($_REQUEST["sort"])?$_REQUEST["sort"]:"fname";
	
/*	
	$dir = $_REQUEST["dir"];
	if(isset($dir) == false){
		$dir = "asc";
	}*/
	$dir = isset($_REQUEST["dir"])?$_REQUEST["dir"]:"asc";
	$result = $dao -> getFileList($sort,$dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		
    </style>
</head>
<body>
	<form enctype="multipart/form-data" method="post" action="addFile.php?sort=<?=$sort?>&dir=<?=$dir?>">
		업로드할 파일을 선택하세요.<br>
		<input type="file" name="upload"><br>
		<input type="submit" value="업로드">

	</form>
	<table border="1">
		<tr>
			<th>파일명 <a href="?sort=fname&dir=asc">^</a> <a  href="webHard.php?sort=fname&dir=desc">v</a></th>
			<th>업로드 시각 <a href="?sort=ftime&dir=asc">^</a> <a href="?sort=ftime&dir=desc">v</a></th>
			<th>
				파일 크기
				<a href="?sort=fsize&dir=asc">^</a>
				<a href="?sort=fsize&dir=desc">v</a>
			</th>
			<th>삭제</th>
		</tr>
		<?php foreach($result as $row): ?>
			<tr>
				<td>
					<a href=" files/<?=$row['fname']?>" ">
						<?=$row["fname"]/*<a href=" files/<?s?> ">*/?>
					</a>
				</td>
				<td><?=$row["ftime"]?></td>
				<td><?=$row["fsize"]?></td>
				<td>
					<a href="deleteFile.php?num=<?=$row["num"]?>&sort=<?=$sort?>&dir=<?=$dir?>" > X </a>
				</td>
			</tr>
		<?php endforeach?>
	</table>
</body>
</html>