<?php

	require("webhardDao.php");

 

	$num = $_REQUEST["num"];
	$sort = $_REQUEST["sort"];
	$dir = $_REQUEST["dir"];
 

	$dao = new WebhardDao();

	$fileName = $dao->deleteFileInfo($num);

 

	unlink("files/$fileName");

 

	header("Location: webhard.php?sort=$sort&dir=$dir");

?>
