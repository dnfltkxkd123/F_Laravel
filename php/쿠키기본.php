<?php
	setcookie("user_id","dnfltkxkd123",time(/*현재시간을 알리는 메소드*/);+100/*초단위*/);
	/*1970년1월1일0시00분0초*/
	$uid = $_COOKIE["user_id"];
	setcookie("user_id");/*쿠키바로삭제*/
?>