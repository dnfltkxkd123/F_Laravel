
<?php
  require("MemberDao.php");
	session_start();
	$id = isset($_SESSION["id"]);
  $mdao = new MemberDao();
  $member = $mdao -> getMember($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
  	function logout(){
  		location.href="logout2.php";
  	}
  	function login(){
  		location.href="login_main.php";
  	}
  	function goMember(){
  		location.href="registerform.php";
  	}
    function update(){
      location.href='updateForm.php';
    }
  </script>
</head>
<body>

<div class="container">
  <div class="jumbotron">
    <h1>회원가입과 로그인 튜토리얼</h1>      
    <p>데이터베이스와 세션을 활용한 회원가입과 로그인 처리</p>
  </div>
  <?php
	if($id){
		echo $_SESSION["name"],"님 환영합니다.<br>";
		?>
		<button class="btn btn-primary" onclick="logout()">로그아웃</button>
    <button class="btn btn-primary" onclick="update()">회원정보 수정</button>
		<?php
	}else{
		?>
		<button class="btn btn-primary" onclick="login()">로그인</button>      
  		<button class="btn btn-primary" onclick="goMember()">회원가입</button>  
		<?php
	}
  ?>
</div>
</html>