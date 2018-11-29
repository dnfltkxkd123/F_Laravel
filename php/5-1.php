

<!DOCTYPE HTML>

</html>
  <head>
     <meta charset="utf-8">
  </head>
  <body>
     <?php 
	 /* 
	 정수,실수,진릿값,문자열 : "abc",'abc'
	 $b = array(20,30,50); /*모든 php에서 사용가능*/

	/*모든 php 5.4부터 사용가능*/
	/*
$b = array[20,30,50]; 
$b[0] = 70;

$item = ["id","pwd","addr","phone"];

for($i = 0 ; $i<배열의길이 ; $i++)
	echo "$item[$i]:" $user[$i]<br>";
*/
$item = ["id","pwd","addr","phone"];
for($i = 0 ; $i<count($item) ; $i++)
	echo "$item[",$i,"]:", $item[$i],"<br>";
	 ?>
  </body>
</html>