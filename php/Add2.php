<?php
	$err = "오류";
	require("Dao2.php");
	$sort = $_REQUEST["sort"];
	$dir = $_REQUEST["dir"];
	 if($_FILES["file"]["error"] == UPLOAD_ERR_OK){
	 	$name = $_FILES['file']["name"];
	 	$size = $_FILES['file']["size"];
	 	$temp_name = $_FILES['file']['tmp_name'];

	 	$saveName = iconv("utf-8","cp949",$name);

	 	if(file_exists("files/$saveName")){
	 		$err = "같은 이름의 파일이 있습니다.";
	 	}else if(move_uploaded_file("$temp_name", "files/$saveName")){
	 		$dao = new Dao();
	 		$dao -> add($name,date("Y-m-d H:i:s"),$size);
	 		header("Location: Web2.php?sort=$sort&dir=$dir");
	 		exit();
	 	}
 }
?>
<script>
	alert("<?= $err ?>");
	history.back();
</script>