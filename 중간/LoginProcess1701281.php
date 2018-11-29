1701281최찬민
<?php
	require('Member1701281.php');
	$dao = new Member();
	$id = isset($_REQUEST['id'])?$_REQUEST['id']:false;
	$pw = isset($_REQUEST['pw'])?$_REQUEST['pw']:false;;
	$member = $dao -> getMember($id);
	if($id && $pw){
		if($member['sn']==$id && $member['password']==$pw){
			session_start();
			$_SESSION['id'] = $member['sn'];
			?>
			<script>
				location.href = 'MainMenu1701281.php';
			</script>
			<?php
		}else{
			?>
			<script>
				alert('아이디또는 비밀번호가 틀립니다');
				history.back();
			</script>
			<?php
		}
	}else{
		?>
		<script>
			alert('빈칸을 모두 입력하세요');
			history.back();
		</script>
		<?php
	}
?>