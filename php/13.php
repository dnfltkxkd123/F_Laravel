<!DOCTYPE HTML>

</html>
  <head>
     <meta charset="utf-8">
  </head>
  <body>
     <form action="13.php" >
	    학번입력:<input type="type" name="num"><br>
		<input type="submit" value="전송">
	 </form>
   <?php
   $phone = [
    "101" => "111-222",
    "102" => "222-333",
    "103" => "333-444",
    "104" => "444-555",
    "105" => "555-666"
  ];
   $req = $_REQUEST["num"];
  $result = "";
  foreach($phone as $key => $val){
    if($req == $key){
      $result = "전화번호 : $val";
      break;
    }
    else{
      $result = "실패했습니다.";
    }
  }
  echo $result;
   ?>
  </body>
</html>