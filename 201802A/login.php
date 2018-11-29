<?php
	/*
	1.로그인 입력폼에서 전달된 아이디,비밀번호 일기
	2.로그인 폼에 입력된 아디디의 회원정보를 DB에서 읽기 
	3.그런 아디이를 가진 레코드가 있고, 비밀호가 맞으면 로그인 처리
	  -> 세션에 로그인 정보를 저장...
	4.레코드가 없거나, 비밀번호가 틀리면 로그인 폼 페이지로 이동(에러 메세지 출력후);
	*/

	
	require("tools.php");
	require("MemberDao.php");
	$id = reqeustValue("id");
	$pw = reqeustValue("pw");
	/*
	$dao = new MemberDao();
	$result = $dao -> getMember($id);
	if($result && $result["id"]){
		if($result["pw"]==$pw){
			session_start();
			$_SESSION["id"] = $id;
			$_SESSION["name"] = $result['name'];
			header("Location: main.php");
			exit();
		}
	}
	*/
	
	if($id && $pw){
		$mdao = new MemberDao();
		$member = $mdao -> getMember($id);
		if($member&& $member["pw"] == $pw){
			//세션에 저장
			session_start();
			$_SESSION["id"] = $id;
			$_SESSION["name"] = $member["name"];
			//메인 페이지로 이동
			okGo("로그인에 성공했습니다!","main.php"/*MAIN_PAGE*/);
			exit();
		}
	}
	

	errorBack("아이디 또는 비밀번호가 잘못 입력되었습니다.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	아이디:<?php echo $id;?>
</body>
</html>