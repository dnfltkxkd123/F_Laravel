1701281최찬민<br>
<?php
	$sn = isset($_REQUEST['sn'])?$_REQUEST['sn']:false;
	$name = isset($_REQUEST['name'])?$_REQUEST['name']:false;
	$pw = isset($_REQUEST['pw'])?$_REQUEST['pw']:false;
	$gender = isset($_REQUEST['gender'])?$_REQUEST['gender']:false;
	$syear = isset($_REQUEST['syear'])?$_REQUEST['syear']:false;
	$birthYear = isset($_REQUEST['birthYear'])?$_REQUEST['birthYear']:false;
	require('Member1701281.php');
	$dao = new Member();
	if($sn&& $name&& $pw && $gender&& $syear&&$birthYear){
		$member = $dao -> getMember($sn);
		if($member['sn'] == $sn){
			?>
				<script>
				alert('같은 아이디가 있습니다.');
				history.back();
				</script>
			<?php
		exit();
		}else{
			$dao -> insertMember($sn,$name,$pw,$birthYear,$gender,$syear);
			?>
		<script>
			location.href = 'MemberAddResult1701281.php';
		</script>
		<?php
		exit();
		}
	}else{
		?>
		<script>
			alert('빈칸을 모두 입력하세요');
			history.back();
		</script>
		<?php
		exit();
	}
	

?>
