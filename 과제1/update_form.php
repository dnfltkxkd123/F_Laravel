<!--글수정창-->
<?php
  require("tools.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
  require("BoardDao.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
  $page = requestValue('page');//tools.php에서 requestValue()를 호출 해서 page 값을 구함
  $num = requestValue('num');//tools.php에서 requestValue()를 호출 해서 num 값을 구함
  $mdao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
  $data = $mdao -> getData($num);//글등록번호가 $num인 정보를 가져옴
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
      <input type="text" class="form-control" id="usr" name="title" value="<?=$data['title']?>"><!--글제목-->
    </div>
    <div class="form-group">
      <label for="pwd">작성자</label>
      <input type="text" class="form-control" id="pwd" name="writer" value="<?=$data['writer']?>"><!--작성자 이름-->
      <input type="hidden" class="form-control" id="pwd" name="num" value="<?=$data['num']?>"><!--작성한 글의 정보-->
    </div>
    <div class="form-group">
    	 <textarea ype="text" name="content" wrap="virtual" rows="10" class="form-control" name=content ><?=$data['content']?></textarea><!--글의 내용-->
    </div>
    <button type="submit" class="btn btn-primary">수정</button><!--클릭하면 update.php?num=<?=$num?>로 이동-->
    </div>

	</form>
	</div>
</body>
</html>