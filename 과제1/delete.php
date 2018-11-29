<!--게시글 삭제 이벤트 담당-->
<?php
	   require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
  	require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
  	$page = requestValue('page');//tools.php에서 requestValue()를 호출 해서 현제 페이지 값을 구함
  	$num = requestValue('num');//tools.php에서 requestValue()를 호출 해서 개시글의 번호를 구함
  	$mdao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
  	if($num && $page){//$num 와 $page 의 정보가 모두 있으면 실행
  		$mdao -> deleteData($num);//개시글의 번호로 개시글을 삭제
  		okGo("삭제완료",bdUrl("board.php",$page,0));//삭제후 게시판으로 이동
  	}else{//
  		errorBack("오류!!");//오류 문구 출력후 게시판으로 이동
  	}
?>