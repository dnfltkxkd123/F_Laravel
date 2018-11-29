<!DOCTYPE HTML>

</html>
  <head>
     <meta charset="utf-8">
  </head>
  <body>
     <?php 
	 echo "아이디: {$_REQUEST["id"]} <br>";
	 echo "비밀번호: ",$_REQUEST["pw"],"<br>";
	 echo "성별: ",$_REQUEST["gender"],"<br>";
	 echo "취미: ",$_REQUEST["hoby"]," <br>";
	 echo "주소: ",round($avg,0)," <br>";
	 echo "메모: ",round($avg,0)," <br>";
	 ?>
  </body>
</html>