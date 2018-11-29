<?php

?>
<?php
  require("../tools.php");
  require("BoardDao.php");
  $page = reqeustValue('page');
  $num = reqeustValue('num');
  $mdao = new BoardDao();
  $data = $mdao -> getData($num);
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
		글수정
	</h2>
	<p>글입력</p>
	<form action="update.php?num=<?=$num?>" method="post" enctype="mulitpart/form-data">
		
	<div class="form-group">
      <label for="usr">제목</label>
      <input type="text" class="form-control" id="usr" name="title" value="<?=$data['title']?>">
    </div>
    <div class="form-group">
      <label for="pwd">작성자</label>
      <input type="text" class="form-control" id="pwd" name="writer" value="<?=$data['writer']?>">
      <input type="hidden" class="form-control" id="pwd" name="num" value="<?=$data['num']?>">
    </div>
    <div class="form-group">
    	 <textarea ype="text" name="content" wrap="virtual" rows="10" class="form-control" name=content ><?=$data['content']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">수정</button>

	</form>
	</div>
</body>
</html>