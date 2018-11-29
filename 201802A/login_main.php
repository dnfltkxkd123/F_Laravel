<!--
로그인
   로그인 정보 입력 폼:id:pw
   로그인 처리 페이지
	-사용자가 입력한 id와pw가 존재하는 회원의 그것과 일치하는지 체크
	-체크 했더니 맞지 않으면 login 폼페이로 다시 이동
	-check 했더니 맞으면...세션에 저장
	->개발하는 사람 마음.. 그렇게 약속...
	->세션에 로그인한 사람의 id와name을 저장...
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
  <h2>로그인폼</h2>
  <p>아디이와 암호를 입력하시오</p>
  <form action="login.php">
    <div class="form-group">
      <label for="usr">ID:</label>
      <input type="text" class="form-control" id="id" name="id">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pw" name="pw">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>