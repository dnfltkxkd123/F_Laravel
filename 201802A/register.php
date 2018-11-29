<?php
	/*
		1.회원가입폼에서 입력된 정보를 추출
		2.모든 입력 필드의 값이 채워져 있는지 체크
		 2.1 다채워져 있지 않으면 "다채워 ㅜ에쇼" 라는 메세지를 띄워주고 회원가입폼으로 이동
		3.아이디가 이미 사용중인지 체크
		 3.1 이미 사용중이라면 "미이 사용중인 아디이입니다" 라는 메세지를 띄워주고 회원가입폼으로 이동
		4.데이터 베이스에 회원정보를 insert
		5.메임 페이지로 이동
	*/
		
		require("tools.php");
		require("MemberDao.php");
		$id = reqeustValue("id");
		$pw = reqeustValue("pw");
		$name = reqeustValue("name");

		if($id && $pw && $name ){
			$mdao = new MemberDao();
			if($mdao->getMember($id) ){
				//에러 메세지 출력하고 폼 페이지로 이동
				errorBack("이미 사용중인 아이디입니다.");
			}else{
				$mdao->insertMember($id,$pw,$name);
				okGo("완료",MAIN_PAGE);
			}
		}else{//입력폼이 다 채워져 있지 않은 경우
			//
			errorBack("모든 입력란을 채워주세요.");
		}
		
		/*
		require("tools.php");
		require("MemberDao.php");
		$id = reqeustValue("id");
		$pw = reqeustValue("pw");
		$name = reqeustValue("name");
		$dao = new MemberDao();
		$member = $dao -> getMember($id);
		if($id=="" || $pw=="" || $name==""){
			errorBack("다채워 주세요");
		}else if($member && $member['id']){
			errorBack("같은 아이디가 있습니다.");
		}else{
			$dao -> insertMember($id,$pw,$name);
			okGo("회원등록을 성공했습니다! 로그린 해주세요","login_main.php");
		}
		*/
?>