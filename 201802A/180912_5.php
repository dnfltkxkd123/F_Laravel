<?PHP
	//180912_5.php
		//요청에action 이라는 parameter값을 읽어온다.
		/*http://localhost/201802A/180912_1.php?action=create
		if(action parameter 값이존재한다면){
			if(그 그값이 "create"){
				세션변수 생성:user_id,"test",하루동안 지속되는
			}else if(그 값이 "delete"){
				user_id 세션변수 삭제
				클라이언트에게 180912_1.php를 다시 요정해라 라는 응답을 준다.
			}
		}
		*/
		session_start();
		$action = isset($_REQEUST["action"])?$_REQEUST["action"]:""; // post,get
		if($action){
			if($action == "create"){
				$_SESSION["user_id"] = "test";
			}else if($action == "delete"){
				unset($_SESSION["user_id"]);
			}
			header("Location: $_SERVER[SCRIPT_NAME]");
			exit();
		}
		//쿠키 값 읽기
		$sesstion = isset($_SESSION["userid"])?$_SESSION["userid"]:"NONE_DATA";


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	user_id 세션의 값 : <?php echo $sesstion;?><br>

	<!--쿠키 생성 링크 -->
	<a href="?action=create">세션생성</a><br>

	<!--쿠키 삭제 링크 -->
	<a href="?action=delete">세션삭제</a><br>
</body>
</html>
	