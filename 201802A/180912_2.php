<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$id = isset($_REQUEST["id"])?$_REQUEST["id"] : "";
		$pw = isset($_REQUEST["pw"])?$_REQUEST["pw"] : "";
		$flag = true;
		if($id && $pw){
			if($id=="최찬민" && $pw=="1701281"){
				$flag = false;
	?>

			<?=$id?>님으로 로그인 했습니다.<br>
			<a href="">로그아웃</a>

	<?php
			}
		}
		if($flag){

	?>
	<form method="post">
		아이디:<input type="text" name="id"><br>
		비밀번호:<input type="password" name="pw"><br>
		<input type="submit" value="로그인">
	</form>

	<?php
			echo "";
		}
	?>
	
	
	
</body>
</html>