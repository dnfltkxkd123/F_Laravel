
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		$id = isset($_REQUEST["id"])?$_REQUEST["id"]:"";
		$pw = isset($_REQUEST["pw"])?$_REQUEST["pw"]:"";
		if(isset($_COOKIE['id']) && isset($_COOKIE['pw'])){
			$id = $_COOKIE['id'];
			$pw = $_COOKIE['pw'];
		}
		$flag = true;
		if($id && $pw){
			if($id=="최찬민" && $pw="1701281"){
				$flag=false;
				setcookie("id","최찬민",time()+60*60);
				setcookie("pw","1701281",time()+60*60);
				?>

				이름:<?php echo $id;?><br>
				학번:<?php echo $pw;?><br>
				<a href="logout.php">로그아웃</a>
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
		}
	?>
</body>
</html>