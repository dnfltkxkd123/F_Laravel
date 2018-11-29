<?php
	require("../tools.php");
	require("BoardDao.php");
	$dao = new BoardDao();
	$num = reqeustValue("num");
	$page = reqeustValue("page");
	$dao -> increaseHits($num);
	$data = $dao -> getData($num);
	
	/*
		request 에서 글의 id를 추출
		해당 번호의 글을 읽고, 조회수 1증가
		읽은 글을 추출력한다.
	*/
	$data["title"] = str_replace("", "&nbsp;", $data["title"]);
	$data["content"] = str_replace("", "&nbsp;", $data["content"]);
	$data["content"] = str_replace("\n", "<br>", $data["content"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script>
  	function delReq(){
  		var yn = confirm("Are you sure");
  		if(yn == false)return;
  		location.href = '<?=bdUrl('delete.php',$page,$num)?>';
  	}
  </script>
</head>
<
<body>
	<div class="container">
		<table class="table">
			<tr>
				<th>제목</th>
				<td><?= $data['title']?></td>
			</tr>
			<tr>
				<th>작성자</th>
				<td><?= $data['writer']?></td>
			</tr>
			<tr>
				<th>작성일시</th>
				<td><?= $data['regtime']?></td>
			</tr>
			<tr>
				<th>조회수</th>
				<td><?= $data['hits']?></td>
			</tr>
			<tr>
				<th>내용</th>
				<td><?= $data['content']?></td>
			</tr>
		</table>
		<input type="button" class="btn brn-primary" onclick="location.href='<?=bdUrl('board.php',$page,0)?>'" value="목록보기">
		<input type="button" class="btn brn-primary" onclick="location.href='<?=bdUrl('update_form.php',$page,$num)?>'" value="수정">
		<input type="button" class="btn brn-primary" onclick="delReq()" value="삭제">
	</div>

	

</body>
</html>