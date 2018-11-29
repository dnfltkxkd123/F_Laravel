<?php
	require("tools.php");
	require("MemberDao.php");

	session_start();
	$id = reqeustValue("id");
	$name = reqeustValue("name");
	$pw = reqeustValue("pw");
	$mdao = new MemberDao();

	sessionValue("id");
	if($_SESSION["id"]==$id){

	}else{
		errorBack("잘못된 접근");
		exit();
	}

	if($id && $name && $pw){
		$mdao -> updateMember($id,$pw,$name);
		session_start();
		$_SESSION["id"] = $id;
		$_SESSION["name"] = $name;
		okGo("회원정보 수정 완료!","main.php");
	}else{
		errorBack("빈칸을 모두 입력하세요");
	}
?>