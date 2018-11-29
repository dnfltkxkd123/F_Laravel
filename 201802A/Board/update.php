<?php
	require("../tools.php");
  	require("BoardDao.php");
  	$page = reqeustValue('page');
  	$num = reqeustValue('num');
  	$writer = reqeustValue('writer');
  	$title = reqeustValue('title');
  	$content = reqeustValue('content');
  	$mdao = new BoardDao();
  	if($num && $writer && $title && $content){
  		$data = $mdao -> updateData($num,$writer,$title,$content);
  		okGo("수정완료",bdUrl("board.php",$page,0));
  	}else{
  		errorBack("빈칸을 입력해주세요!!");
  	}
  	
?>