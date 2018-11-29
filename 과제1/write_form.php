<!--글작성 창-->
<?php
  require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
  require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
  requestValue('page');//tools.php에서 requestValue()를 호출 해서 페이지 정보를 구함
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
		글등록
	</h2>
	<p>글입력</p>
	<form action="write.php" method="post" enctype="mulitpart/form-data">
		
	<div class="form-group">
      <label for="usr">제목</label>
      <input type="text" class="form-control" id="usr" name="title"><!--제목입력창-->
    </div>
    <div class="form-group">
      <label for="pwd">작성자</label>
      <input type="text" class="form-control" id="pwd" name="writer"><!--작성자 이름 입력창-->
    </div>
    <div class="form-group">
    	 <textarea ype="text" name="content" wrap="virtual" rows="10" class="form-control" name=content></textarea><!--글내용 입력창-->
    </div>
    <button type="submit" class="btn btn-primary">등록</button><!--글등록 버튼 클릭하면 write.php로 이동-->

	</form>
	</div>
</body>
</html>