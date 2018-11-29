<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		try{
			$db = new PDO("mysql:host=localhost;dbname=php3","root","");
			$db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$db -> exec("set names utf8");
			$id = $_REQUEST["id"];
			$password = $_REQUEST["password"];
			$name = $_REQUEST["name"];
			$addr = $_REQUEST["addr"];
			$check = "select id from memberData;";
			$rs = $db -> query($check);
			while($row = $rs -> fetch(PDO::FETCH_ASSOC)){
				if($row["id"] == $id){
			    		echo "
			    			  <script>
			    			  	  alert('같은 이름의 아이디가 있습니다.');
			    			      var open = window.open('회원가입.html','_self');
			    			  </script>
			    		";
			    		return; 
			    }
			}
			$sql = "insert into memberData values('$id','$password','$name','$addr',now());";
			$db -> exec($sql);
			echo "<script>
			    	alert('회원가입에 성공했습니다! 등록한 아이디로 로그인 해주세요!');
			    	window.open('로그인.html','_self');
			     </script>";
		}catch(PDOException $e){
			exit($e -> getMessage());
		}
		
	?>
</body>
</html>