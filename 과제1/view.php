<!--작성글 조회창-->
<?php
	require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
	require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
	$dao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
	$num = requestValue("num");//tools.php에서 requestValue()를 호출 해서 num 값을 구함
	$page = requestValue("page");//tools.php에서 requestValue()를 호출 해서 page 값을 구함
	$dao -> increaseHits($num);//조회수 증가
	$data = $dao -> getData($num);//$num을 이용해서 글정보를 얻음
	
	/*
		request 에서 글의 id를 추출
		해당 번호의 글을 읽고, 조회수 1증가
		읽은 글을 추출력한다.
	*/

	/*mysql에서 얻은 텍스트를 html에 맞게 변환*/
	$data["title"] = str_replace("", "&nbsp;", $data["title"]);//$data["title"]의 "" 를-> &nbsp; 로 변환
	$data["content"] = str_replace("", "&nbsp;", $data["content"]);//$data["content"]의 "" 를-> &nbsp; 로 변환
	$data["content"] = str_replace("\n", "<br>", $data["content"]);//$data["content"]의 \n 를-> &nbsp; 로 변환
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
  		if(yn == false){
  			return;
  		}else{
  			location.href = "<?=bdUrl('delete.php',$page,$num)?>";
  		};
  	}//삭제할때 선택할지 안할지 다시 확인후 삭제
  </script>
</head>

<body>
	<div class="container">
		<table class="table">
			<tr>
				<th>제목</th>
				<td><?= $data['title']?></td><!--글제목-->
			</tr>
			<tr>
				<th>작성자</th>
				<td><?= $data['writer']?></td><!--작성자 이름-->
			</tr>
			<tr>
				<th>작성일시</th>
				<td><?= $data['regtime']?></td><!--글 등록 또는 수정 시간-->
			</tr>
			<tr>
				<th>조회수</th>
				<td><?= $data['hits']?></td><!--조회수-->
			</tr>
			<tr>
				<th>내용</th>
				<td><?= $data['content']?></td><!--글내용-->
			</tr>
		</table>
		<input type="button" class="btn brn-primary" onclick="location.href='<?=bdUrl('board.php',$page,0)?>'" value="목록보기"><!--클릭하면 게시판으로 이동-->
		<input type="button" class="btn brn-primary" onclick="location.href='<?=bdUrl('update_form.php',$page,$num)?>'" value="수정"><!--클릭하면 수정창으로 이동-->
		<input type="button" class="btn brn-primary" onclick="delReq()" value="삭제">
	</div>

	

</body>
</html>