<?php
	function processUpload($tagName,$savePath){
		if($_FILES[$tagName]['error'] != UPLOAD_ERR_OK){
				return 1;
		}
		$rv["name"] = $_FILES[$tagName]["name"];
		$rv["size"] = $_FILES[$tagName]["size"];
		$rv["type"] = $_FILES[$tagName]["type"];
		
		$tempName = $_FILES[$tagName]['tmp_name'];

		$rv["tmp_naem"] = $tempName;
		
		$saveName = iconv("utf-8","cp949",$rv["name"]);

		if(file_exists("$savePath/$saveName"))
			return 2;

		if(!move_uploaded_file($tempName, "$savePath/$saveName"))
			return 3;
		return $rv;
	}

?>
