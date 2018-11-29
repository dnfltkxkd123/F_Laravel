<?php
	$errMsg = "업로드 실패!";
	if($_FILES["upload"]['error'] == UPLOAD_ERR_OK){
		$tname = $_FILES["upload"]['tmp_name'];
		$fname = $_FILES["upload"]['name'];
		$ftime = $_FILES["upload"]['time'];
		$fsize = $_FILES["upload"]['size'];

		$save_name = iconv("utf-8","cp949",$fname);

		if(file_exists("files/$save_name")){
			$errMsg = "이미 업로드된 파일";
		}else if(move_uploaded_file($tname, "files/$save_name")){
			require("Dao.php");
			$dao = new Dao();
			$dao -> add($save_name,null/*date("Y-d-m H:i:s")*/,$fsize);
			header("Location: web.php");
			exit();
		}
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
		alert("<?= $errMsg?>");
		history.back();
	</script>
</body>
</html>