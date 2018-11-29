<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1">
    <tr>
    	<th>이름</th>
    	<th>주소</th>
    	<th>가입날짜</th>
    <tr>
	<?php
		try{
			$id = $_REQUEST["id"];
			$password = $_REQUEST["password"];
			$db = new PDO("mysql:host=localhost;dbname=php3","root","");
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db -> exec("set names utf8");

			$idCheck = null;
			$passwordCheck = null;
			$check = "select id,password from memberData";
			$rs = $db -> query($check);
			while($row = $rs -> fetch(PDO::FETCH_ASSOC)){
				if($id == $row["id"]){
					$idCheck = $row["id"];
				}
				if($password == $row["password"]){
					$passwordCheck = $row["password"];
				}
			}
			if($idCheck==null || $passwordCheck == null){
				echo "<script>
					alert('이름 또는 비밀번호를 잘못적었습니다!');
					window.open('로그인.html','_self');
				  </script>";
			}

			$sql = "select*from memberData
					where id='$id' and password='$password';";
			$rs = $db -> query($sql);
			while($row = $rs -> fetch(PDO::FETCH_ASSOC)){
				$name = $row["name"];
				$addr = $row["addr"];
				$date = $row["enrollData"];
				echo "<tr>";
				echo "<td>",$row["name"],"</td>";
				echo "<td>",$row["addr"],"</td>";
				echo "<td>",$row["enrollData"],"</td>";
				echo "</tr>";
			};
		}catch(PDOException $e){
			exit($e -> getMessage());
			echo "<script>
					alert('이름 또는 비밀번호를 잘못적었습니다!');
					window.open('로그인.html','_self');
				  </script>";
		}
	?>
	</table>
	<form action="수정.php"> 
		<input type="submit" value="개인정보 수정">
	</form>
</body>
</html>