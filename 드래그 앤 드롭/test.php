<?php
	//$files = array_filter($_FILES['upload']['name']); //something like that to be used before processing files.

	// Count # of uploaded files in array
	$total = count($_FILES['files']['name']);

	// Loop through each file
	for( $i=0 ; $i < $total ; $i++ ) {

	  //Get the temp file path
	  $tmpFilePath = $_FILES['files']['tmp_name'][$i];
	  $filePath = $_FILES['files']['name'][$i];
	  echo $tmpFilePath,"<br>",$filePath,"<br><br>";
	  if($_FILES["files"]['error'][$i] == UPLOAD_ERR_OK){
		$tname = $_FILES["files"]['tmp_name'][$i];
		$fname = $_FILES["files"]['name'][$i];
		if(file_exists("files/$filePath")){
			$errMsg = "$filePath 는 이미 업로드된 파일";
		}else{
			move_uploaded_file($tname, "files/$filePath");
		}
	  }
	}
	

?>