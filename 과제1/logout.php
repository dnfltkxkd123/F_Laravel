<!--로그아웃 이벤트 담당-->
<?php
	//로그 아웃을 하면 세션값을 삭제하고 게시판으로 돌아감
	session_start();
	unset($_SESSION['id'],$_SESSION['name']);
	header("Location: board.php");
?>