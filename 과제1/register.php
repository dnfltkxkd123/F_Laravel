<?php
	require("MemberDao.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
	require("tools.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
	$id = requestValue('id');//tools.php에서 requestValue()를 호출 해서 등록할 id 값을 구함
	$pw = requestValue('pw');//tools.php에서 requestValue()를 호출 해서 등록할 비밀번호 값을 구함
	$name = requestValue('name');//tools.php에서 requestValue()를 호출 해서 등록할 회원이름 값을 구함
	$mdao = new MemberDao();
	if($id && $pw && $name){//$id 와 $pw 와 $name 의 정보가 모두 있으면 실행
		$member = $mdao -> getMember($id);//같은 아이디가 있는지 확인
		if($member && $member['id'] == $id){//$member값이 있고 $member['id'] 와 $id 이 같으면 오류문구를 반환하고 회원등록 창으로 이동
			errorBack("같은 아이디가 있습니다.");
		}else{
			//$member['id'] 와 $id 같이 다르면 회원 정보를 db에 저장하고 게시판으로 이동
			$mdao -> insertMember($id,$pw,$name);
			okGo("가입완료 됬습니다.","board.php");
		}
	}else{//$id 와 $pw 와 $name 의 정보중 하나라도 없으면 오류문구 반환하고 회원등록 창으로 이동
		errorBack("빈칸을 모두 입력하세요!!");
	}
	
?>