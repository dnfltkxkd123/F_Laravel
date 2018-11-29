<!DOCTYPE HTML>

</html>
  <head>
     <meta charset="utf-8">
  </head>
  <body>
     <?php 
	 echo "DB: {$_REQUEST["db"]} <br>";
	 echo "Javascript: ",$_REQUEST["js"],"<br>";
	 echo "Java: ",$_REQUEST["java"],"<br>";
	 
	 $avg = ($_REQUEST["db"]+$_REQUEST["js"]+$_REQUEST["java"])/3;
	 echo "평균: ",round($avg,0)," <br>";
	 ?>
  </body>
</html>