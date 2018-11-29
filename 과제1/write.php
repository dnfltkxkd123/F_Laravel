<!--글등록 이벤트 담당-->
<?php
	require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
	require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
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
	session_start();//세션 시작
	$content = requestValue("content");//tools.php에서 requestValue()를 호출 해서 글내용 정보를 구함
	$title = requestValue("title");//tools.php에서 requestValue()를 호출 해서 글제목 정보를 구함
	$writer = requestValue("writer");//tools.php에서 requestValue()를 호출 해서 작성자 정보를 구함
	if($content && $title && $writer){//글내용 제목 작성자 정보가 모두 잇으면 실행
		$mdao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
		$mdao -> insertData($writer,$title,$content,$_SESSION['id']);//자작성한 글을 등록
		okGo("작성한 글이 등록됬습니다.",bdUrl("board.php",0,0));//모든작업이 끝나면 게시판으로 이동
	}else{
		errorBack("모든 항목이 빈칸 없이 입력되여야 합니다.");//오류가 뜨면 글작성 창으로 이동

	
	
?>