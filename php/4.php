<!DOCTYPE HTML>

</html>
  <head>
     <meta charset="utf-8">
  </head>
  <body>
     <?php 
	 /* 
	 정수,실수,진릿값,문자열 : "abc",'abc'
	 
	 */
	   $a=5;
	   $b='값은 $a 입니다. <br>';
	   echo $b;
	   $b = "값은 {$a}입니다. <br>"; /*{}를 사용하면 띄어쓰기를 하지 않아도 a의 값 출력*/
	   echo $b;
	 ?>
  </body>
</html>