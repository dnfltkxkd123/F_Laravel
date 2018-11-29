<!-- 회원가입과 로그인 실습
-회원정보를 정장 => DB에 저장 =>
 어떤 정보를 저장할지 결정 =>
 테이블 생성
 저장할 회원정보:id,pw.name
 create table member(
	id varchar(20) primary key,
	pw varchar(20),
	name varchar(20)
 )
 회원가입
 (1)회원가입을 위한 정보 입력 폼 페이지
 (2)회원가입을 처리해주는 페이지가 필요.
 -입력 폼의 모드닐드가 채워졌는지 검사
 -DB에 그 정보를 isert
 -메인이동
 w3schools.com
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<h2 class="container">
		회원가입 폼
	</h2>
	<p>회원가입을 위해 아래의 정보를 작성해주세요ㅛ.</p>
	<form class="register.php" method="post">
		<div  class="form-group">Name</div>
		<input type="text" class="form-control" name="name">
		<div  class="form-group">ID</div>
		<input type="text" class="form-control" name="id">
		<div  class="form-group">PW</div>
		<input type="password" class="form-control" name="pwd">
		<input type="submit" value="로그인" class="btn btn-primary">
	</form>
</body>
</html>