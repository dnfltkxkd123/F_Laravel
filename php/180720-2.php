<?php
	require("180720-1.php");
	$result = processUpload("file","files");
	$upload_succeeded = ture;
	if(is_int($result)){
		$upload_succeeded = false;
		if($result == 1){
			$errMsg = "업로드 실패";
		}else if($result == 2){
			$errMsg = "같은 파일이 존재합니다.";
		}else{
			$errMsg = "지정된 경로 이동 실패";
		}
	}else{

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<script>
		var result = <?= $result ?>;
		if(result == 1){
			alert("파일이 없습니다.");
			history.back();
		}else if(result == 2){
			alert("같은 파일이 존재합니다.");
			history.back();
		}else if(result == 3){
			alert("업로드를 실패했습니다.");
			history.back();
		}
	</script>
	<table border="1">
		<tr>
			<td><?=$result['name']?></td>
		    <td><?=$result['size']?></td>
			<td><?=$result['type']?></td>
		</tr>	
	</table>
	<?php if($upload_succeeded): ?>

		업로드 성공 <br>

		파일 이름 : <?= $result['name'] ?> <br>

		파일 크기 : <?= $result['size'] ?>bytes <br>

		파일 타입 : <?= $result['type']?> <br>

	<?php else : ?>
		<?php echo $errMsg ?>
	<?php endif ?>
</body>
</html>