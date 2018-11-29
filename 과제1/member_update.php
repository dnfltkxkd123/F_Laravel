<!--회원정보 수정 이벤트 담당-->
<?php
	require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
  	require("MemberDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
    session_start();
  	$id = requestValue('id');//tools.php에서 requestValue()를 호출 해서 id 값을 구함
  	$pw = requestValue('pw');//tools.php에서 requestValue()를 호출 해서 수정된 비밀번호 값을 구함
  	$name = requestValue('name');//tools.php에서 requestValue()를 호출 해서 수정된 회원 이름정보 값을 구함
  	if($id && $pw && $name && $id == $_SESSION['id']){//$id 와 $pw 와  $name의 정보가 모두 같고 세션에 저장된 아이디 값과 $id이 같으면 실행
  		
  		$mdao = new MemberDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
  		$mdao -> updateMember($id,$pw,$name);//db에 저장된 회원정보 수정
  		$_SESSION['id'] = $id;//수정된 id값을 세션에 저장
  		$_SESSION['name'] = $name;//수정된 회원의 이름을 세션에 저장
  		okGo("회원정보를 수정했습니다.","board.php");//회원정보 수정후 게시판으로 이동
  	}else{
  		errorBack('빈칸을 입력해주세요!!');// 오류문구 반환후 게시판으로 이동
  	}
  		
?>