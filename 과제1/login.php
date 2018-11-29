<?php
	/*로그인 이벤트 담당*/

	require("MemberDao.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
	require("tools.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
	$id = requestValue('id');//tools.php에서 requestValue()를 호출 해서 id 값을 구함
	$pw = requestValue('pw');//tools.php에서 requestValue()를 호출 해서 비밀번호 값을 구함
	if($id && $pw){//$id 와 $pw 의 정보가 모두 있으면 실행
		$mdao = new MemberDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
		$member = $mdao -> getMember($id);//아이디 값을 이용해서 회원 정보를 가져옴
		if($member && $member['pw'] == $pw){//$member값이 있고 $member['pw'] 와 비밀번호 값이 같으면 실행
			session_start();//세션 시작
			$_SESSION['id'] = $id;//id값을 세션에 저장
			$_SESSION['name'] = $member['name'];//회원의 이름을 세션에 저장
			header("Location: board.php");//게시판으로 이동
		}else{//$member값이 있고 $member['pw'] 와 비밀번호 값중 하나라도 없거나 같지 않으면 오류문구를 반환하고 게시판으로 이동
			errorBack("아이디 또는 비밀번호를 잘못입력했습니다!!");
		}
	}else{//$id 와 $pw 의 정보중 하나라도 없으면 오류문구를 반환하고 게시판으로 이동
		errorBack("아이디 또는 비밀번호를 잘못입력했습니다!!");
	}
	
?>