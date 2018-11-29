<!--회원등록 작성창-->
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
	<div class="container">
	<h2 class="container">
		회원가입 폼
	</h2>
	<p>회원가입을 위해 아래의 정보를 작성해주세요.</p>
	<form action="register.php" method="post">
		<div class="form-group">
      <label for="usr">이름:</label>
      <input type="text" class="form-control" id="usr" name="name"><!--이름을 적을 텍스트 창-->
    </div>
		<div class="form-group">
      <label for="usr">ID:</label>
      <input type="text" class="form-control" id="usr" name="id"><!--아이디를 적을 텍스트 창-->
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pw"><!--비밀번호를 적을 텍스트 창-->
    </div>
    <button type="submit" class="btn btn-primary">회원가입</button><!--입력한 정보를 register.php에 전달-->

	</form>
	</div>
</body>
</html>