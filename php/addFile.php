<?php
	$errMsg = "업로드 실패!";
	if($_FILES["upload"]["error"] == UPLOAD_ERR_OK){
		$tname = $_FILES["upload"]["tmp_name"];
		$fname = $_FILES["upload"]["name"];
		$fsize = $_FILES["upload"]["size"];
		$sort = $_REQUEST["sort"];
		$dir = $_REQUEST["dir"];
		$save_name = iconv("utf-8","cp949",$fname);

		if(file_exists("files/$save_name"))
			$errMsg = "이미 업로드한 파일입니다.";
		else if(move_uploaded_file($tname/*업로드할 파일경로*/, /*업로드 시킬 파일의 주소*/"files/$save_name")){
			//DB에 새로운 파일정보 추가...
			require("webHardDao.php");
			$dao = new WebHardDao();
			//파일 이름 날짜 크기
			$dao -> addFileInfo($save_name,date("Y-m-d H:i:s"),$fsize);
			header("Location:webhard.php?sort=$sort&dir=$dir");
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
		alert("<?=$errMsg?>");
		history.back();
	</script>
</body>
</html>