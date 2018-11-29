1701281최찬민<br>
<?php
	require('Member1701281.php');
	$dao = new Member();
	$member = $dao -> getAllMember();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border='1'>
		<tr>
			<th>학번</th>
			<th>이름</th>
			<th>비밀번호</th>
			<th>출생년도</th>
			<th>학년</th>
			<th>성별</th>
			<th>역할(role)</th>
		</tr>
		<?php foreach($member as $row):?>
		<tr>
			<th><?=$row['sn']?></th>
			<th><?=$row['name']?></th>
			
			<th><?=$row['password']?></th>
			<th><?=$row['birthYear']?></th>
			
			<th><?=$row['syear']?></th>
			<th><?=$row['gender']?></th>
			<?php
				if($row['role'] == 'N'){
					$row['role'] = '일반회원';
				}else if($row['role'] == 'A'){
					$row['role'] = '관리자';
				}
			?>
			<th><?=$row['role']?></th>
		</tr>
		<?php endforeach?>
	</table>
</body>
</html>