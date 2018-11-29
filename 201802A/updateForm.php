<?php
  require("tools.php");
  require("MemberDao.php");
  session_start();
  $id = isset($_SESSION["id"])?$_SESSION["id"]:"";
  $name = isset($_SESSION["name"])?$_SESSION["name"]:"";
  $mdao = new MemberDao();
  $member = $mdao -> getMember($id);

?>
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
	<form action="update.php" method="post">
		<div class="form-group">
      <label for="usr">이름:</label>
      <input type="text" class="form-control" id="usr" name="name" value="<?=$member["name"]?>" >
    </div>
		<div class="form-group">
      <label for="usr">ID:</label>
      <input type="text" class="form-control" id="usr" name="id" value="<?=$member["id"]?>" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pw" value="<?=$member["pw"]?>">
    </div>
    <button type="submit" class="btn btn-primary">수정</button>

	</form>
	</div>
</body>
</html>