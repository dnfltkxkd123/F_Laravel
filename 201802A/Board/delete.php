<?php
	require("../tools.php");
  	require("BoardDao.php");
  	$page = reqeustValue('page');
  	$num = reqeustValue('num');
  	$mdao = new BoardDao();
  	if($num && $page){
  		$mdao -> deleteData($num);
  		okGo("삭제완료",bdUrl("board.php",$page,0));
  	}else{
  		errorBack("오류!!");
  	}
?>