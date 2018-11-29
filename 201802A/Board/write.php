<?php
	require("../tools.php");
	require("BoardDao.php");
	/*
	wirter,title,content, 값을 request에 추출
	그 값이 모두 존재하면
	DB에 삽입
	$dao = new BoardDao();
	$dao -> insertMsg("값....");
	글목록 페이지로 이동
	값 하나라도 없으면 
	errorBack("모든 항목이 빈칸없이 입력되어야 합니다.");
	*/
	$content = reqeustValue("content");
	$title = reqeustValue("title");
	$writer = reqeustValue("writer");
	if($content && $title && $writer){
		$mdao = new BoardDao();
		$mdao -> insertData($writer,$title,$content);
		okGo("작성한 글이 등록됬습니다.",bdUrl("board.php",0,0));
	}else{
		errorBack("모든 항목이 빈칸 없이 입력되여야 합니다.");
	}

	
	
?>