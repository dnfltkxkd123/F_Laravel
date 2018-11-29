1701281최찬민
<br>
<?php
	session_start();
	$sessionCheck = isset($_SESSION['id']);
	if($sessionCheck){
		?>
		<a href='Logout1701281.php'>로그아웃</a><br>
		<a href='MemberList1701281.php'>회원정보</a>
		<?php
	}else{
		?>
		<a href='LoginForm1701281.php'>로그인</a><br>
		<a href='MemberAddForm1701281.php'>회원가입</a>
		<?php
	}
?>