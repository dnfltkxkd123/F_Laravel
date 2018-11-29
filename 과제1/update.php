<!--글수정시 일어나는 이벤트-->
<?php
    /**/

	  require("tools.php");//////공용 메서드의 정의 한 tools.php의 정보를 불러옴
  	require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
  	$page = requestValue('page');//tools.php에서 requestValue()를 호출 해서 page 값을 구함
  	$num = requestValue('num');//tools.php에서 requestValue()를 호출 해서 num 값을 구함
  	$writer = requestValue('writer');//tools.php에서 requestValue()를 호출 해서 작성자 정보를 구함
  	$title = requestValue('title');//tools.php에서 requestValue()를 호출 해서 글제목 정보를 구함
  	$content = requestValue('content');//tools.php에서 requestValue()를 호출 해서 글내용 정보를 구함
  	$mdao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
  	if($num && $writer && $title && $content){//$num , $writer, $title,$content 가 모두 있으면 실행
  		$data = $mdao -> updateData($num,$writer,$title,$content);//정보 수정
  		okGo("수정완료",bdUrl("board.php",$page,0));//정보수정이 완료 되면 게시판으로 이동
  	}else{
  		errorBack("빈칸을 입력해주세요!!");//오류가 발생하면 정보 수정창으로 이동
  	}
  	
?>