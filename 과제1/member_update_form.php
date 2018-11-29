<!--회원정보 수정 창-->
<?php
  require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
  require("MemberDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
  session_start();//세션시작
  $id = sessionValue('id');//tools.php에서 sessionValue()를 호출 해서 $_SESSION['id'] 값을 구함
  $name = sessionValue('name');//tools.php에서 sessionValue()를 호출 해서 $_SESSION['name'] 값을 구함
  $mdao = new MemberDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
  $member = $mdao -> getMember($id);//$id를 이용해 회원 정보를 얻음
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
		회원정보 수정
	</h2>
	<p>수정할 내용을 적어 주세요.</p>
	<form action="member_update.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
      <label for="usr">이름:</label>
      <input type="text" class="form-control" id="usr" name="name" value="<?=$member["name"]?>" ><!--이름을 적을 텍스트 창-->
    </div>
		<div class="form-group">
      <label for="usr">ID:</label>
      <input type="text" class="form-control" id="usr" name="id" value="<?=$member["id"]?>" readonly><!--아이디를 적을 텍스트 창 읽기만 가능-->
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" name="pw" value="<?=$member["pw"]?>"><!--비밀번호를 적을 텍스트 창-->
    </div>
    <button type="submit" class="btn btn-primary">수정</button><!--수정된 정보를 member_update.php에 전달-->

	</form>
	</div>
</body>
</html>