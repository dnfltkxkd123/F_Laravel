<?php
	require("../tools.php");
	require("BoardDao.php");
	$mdao = new BoardDao();
	$nowPage = reqeustValue("page");
	$listCount = $mdao -> getDataCount();
	define("PAGE_COUNT",3);
	define("LIST_COUNT",5);
	if($listCount>=0){
		$pageSum = ceil($listCount/LIST_COUNT);
		if($nowPage<1){
			$nowPage = 1;
		}
		if($nowPage>$pageSum){
			$nowPage = $pageSum;
		}

		$start = ($nowPage-1)*LIST_COUNT;
		$onePageData =$mdao -> getOnePageList($start,LIST_COUNT);
	}
	$firstLink = floor(($nowPage-1)/PAGE_COUNT)*PAGE_COUNT+1;
	$lastLink = $firstLink+PAGE_COUNT-1;
	if($lastLink>$pageSum){
		$lastLink = $pageSum;
	}
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
</head>
<body>
	<div class="container">
		<table class="table table-hover">
			<tr>
				<th class="List-num">번호</th>
				<th class="List-title">제목</th>
				<th class="List-writer">작성자</th>
				<th class="List-regtime">작성일시</th>
				<th>조회수</th>
			</tr>
			<?php foreach($onePageData as $row): ?>
				<tr onclick="location.href ='<?=bdUrl('view.php',$nowPage,$row['num'])?>'" style="cursor:pointer;"> 
					<td><?= $row['num']?></td>
					<td><?= $row['title']?></td>
					<td><?= $row['writer']?></td>
					<td><?= $row['regtime']?></td>
					<td><?= $row['hits']?></td>
				</tr>
			<?php endforeach?>
		</table>
		<?php if($firstLink>PAGE_COUNT):?>
			<a href="<?=bdUrl("board.php",$nowPage-PAGE_COUNT,0)?>"><</a>
		<?php endif?>
		<?php for($i=$firstLink ; $i<=$lastLink ; $i++):?>
			<a href="<?=bdUrl("board.php",$i,0)?>"><?=$i?></a>
		<?php endfor?>
		<?php if($lastLink!=$pageSum):?>
			<a href="<?=bdUrl("board.php",$nowPage+PAGE_COUNT,0)?>">></a>
		<?php endif?><br>
		<input class="btn brn-primary" type="button" value="글쓰기" onclick="location.href='write_form.php'">
	</div>

</body>
</html>