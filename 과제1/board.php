<!--게시판 창-->
<?php
	session_start();//세션의 정보를 불러오기 위해 세션을 시작
	require("tools.php");//공용 메서드의 정의 한 tools.php의 정보를 불러옴
	require("BoardDao.php");//db의 정보를 불러올BoardDao.php정보를 불러옴
	$mdao = new BoardDao();//BoardDao.php 안에 있는BoardDao클래스르 인스턴스
	$nowPage = requestValue("page");//tools.php에서 requestValue()를 호출 해서 현제 페이지 값을 구함
	$listCount = $mdao -> getDataCount()?$mdao -> getDataCount():false;//게시판의 게시물 수를 불러옴 없으면 false를 반환
	define("PAGE_COUNT",3);//화면에 보일 페이지 수를 상수로 설정
	define("LIST_COUNT",5);//한페이지에 보일 리스트 수를 상수로 설정
	$idSession = sessionValue("id");//tools.php에서 sessionValue()를 호출 해서 세션 값을 구함
	if($listCount>=0 && $listCount != false){
		$pageSum = ceil($listCount/LIST_COUNT);//총페이지 수를 반환
		if($nowPage<1){
			$nowPage = 1;
		}//현제 페이지가 1보타 작으면 1로 설정
		if($nowPage>$pageSum){
			$nowPage = $pageSum;
		}//현제 페이지가 $pageSum 보다 크면 $nowPage를 $pageSum로 설정

		$start = ($nowPage-1)*LIST_COUNT;//화면에 보일 첫번째 리스트
		$onePageData =$mdao -> getOnePageList($start,LIST_COUNT);//현제 페이지에 보여줄 게시글의 데이터를 부름
		$firstLink = floor(($nowPage-1)/PAGE_COUNT)*PAGE_COUNT+1;//화면에 보일 첫번째 페이지값
		$lastLink = $firstLink+PAGE_COUNT-1;//화면에 보일 마지막 페이지 값
		if($lastLink>$pageSum){
			$lastLink = $pageSum;
		}//마지막 페이지의 값이 $pageSum봐 크면 값이 $pageSum임
	}//$listCount가 0보다 크거나 false가 아니면 실행
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<style>
		.login_box{
			float:right;
			
		}
		.logoff_box{
			width:200px;
		}
		.lofon_box{
			width:500px;
		}
		.my_list{
			cursor:pointer;
			background-color:#F7F8E0;
		}
	</style>
</head>
<body>
	<div class="container">
		<table class="table table-hover">
				<?php 
					if($idSession){//세션의 값이 있으면 화면에 로그인에 성공 했을때 창 출력
						echo $_SESSION["name"],"님 환영합니다.<br>";
						?>
						<div class="login_box ">
							<button class="btn btn-primary" onclick="location.href = 'logout.php'">로그아웃</button><!--로그아웃 버튼 클릭하면 logout.php(로그아웃 창)로 이동-->
			    			<button class="btn btn-primary" onclick="location.href = 'member_update_form.php'">회원정보 수정</button><!--회원정보 수정 버튼 버튼 클릭하면 member_update_form.php(회원정보 수정 차)로 이동-->
		    			</div>
						<?php
						
					}else{//세션 값이 없으면 출력되는 화면
						?>
						<div class="login_box logoff_box">
							<form action="login.php" method="post" enctype="multipart/form-data">
								아이디<input type="text" class="" id="usr" name="id"><br><!--아이디를 적을 텍스트 창-->
								비밀번호<input type="password" class="" id="usr" name="pw"><br>
								<!--비밀번호 를 적을 텍스트 창-->
								<input type="submit" class="btn btn-primary" value="로그인">&nbsp;<!--로그인 아이디와 비밀번호 정보를 login.php 에 전달-->
								<input type="button" class="btn btn-primary" onclick="location.href ='register_form.php'" value="회원가입"><!--회원가입 버튼 클릭하면 register_form.php(회원가입 창)으로 이동-->
								<br>
								<br>
							</form>
						</div>
		  				<?php
					}
				?>
			
			<tr><!-- 게시판의 메뉴창 -->
				<th class="List-num">번호</th>
				<th class="List-title">제목</th>
				<th class="List-writer">작성자</th>
				<th class="List-regtime">작성일시</th>
				<th>조회수</th>
			</tr><!-- 게시판의 메뉴창 -->
			<?php if($listCount != false):?><!--$listCount가 false가 아니면 실행-->
				<?php foreach($onePageData as $row): ?><!--$onePageData(화면에 보일 개시글 정보를) $row로 설정해서 foreach 문으로 돌림-->
					<?php
						if($row['id'] == $idSession){//세션값과 $row['id']의 값이 같으면 내가 작성한 글목록에 대한 이벤트를 설정
							?>
								<tr  onclick="location.href ='<?=bdUrl('view.php',$nowPage,$row['num'])?>'" class="my_list"> 
									<td><?= $row['num']?></td>
									<td><?= $row['title']?></td>
									<td><?= $row['writer']?></td>
									<td><?= $row['regtime']?></td>
									<td><?= $row['hits']?></td>
								</tr><!--내가 작성한 글은 바탕색은 #F7F8E0이며  클릭하면 현제 페이지와 row['num']의 정보를 view.php로 전달-->
							<?php
						}else{//세션값과 $row['id']의 값이 다르면 화면에 보일 목록의 값을 불러옴
							?>
								<tr> 
									<td><?= $row['num']?></td>
									<td><?= $row['title']?></td>
									<td><?= $row['writer']?></td>
									<td><?= $row['regtime']?></td>
									<td><?= $row['hits']?></td>
								</tr>
							<?php
						}
					?>
				<?php endforeach?><!--화면에 보일 개시글을 불러올 foreach문 종료-->
			<?php endif ?><!--화면에 보일 개시글을 불러올 if문 종료--><!--$listCount가 false가 아니면 실행-->
		</table>

		<?php if($listCount != false):?><!--$listCount가 false가 아니면 실행-->
			<?php if($firstLink>PAGE_COUNT):?><!--첫번째 페이지 값이 PAGE_COUNT보다 크면 실행-->
				<a href="<?=bdUrl("board.php",$nowPage-PAGE_COUNT,0)?>"><</a><!--다음 +3페이지로 넘어갈 '>' 버튼-->
			<?php endif?><!--if문 종료--><!--첫번째 페이지 값이 PAGE_COUNT보다 크면 실행-->

			<?php for($i=$firstLink ; $i<=$lastLink ; $i++):?><!--첫번째 페이지 링크 부터 마지막 링크 까지의 값을 보여줄 버튼을 for문으로 이용해서 화면에 구현-->
				<a href="<?=bdUrl("board.php",$i,0)?>"><?=$i?></a><!--클릭하면 $i번째 페이지로 이동-->
			<?php endfor?><!--for문 종료--><!--첫번째 페이지 링크 부터 마지막 링크 까지의 값을 보여줄 버튼을 for문으로 이용해서 화면에 구현-->

			<?php if($lastLink!=$pageSum):?><!--$lastLink 값이 $pageSum보다 같지 않으면 실행-->
				<a href="<?=bdUrl("board.php",$nowPage+PAGE_COUNT,0)?>">></a><!-- -3페이지로 넘어갈 '>' 버튼-->
			<?php endif?><!--if문 종료--><!--$lastLink 값이 $pageSum보다 같지 않으면 실행-->
		<?php endif ?><!--if문 종료--><!--$listCount가 false가 아니면 실행-->

		<br>

		<?php if($idSession):?><!--로그인을 했으면 글쓰기 버튼이 보임-->
			<input class="btn brn-primary" type="button" value="글쓰기" onclick="location.href='write_form.php'"><!--글쓰기 버튼 클릭하면 글쓰기 창(write_form.php)으로 이동-->
		<?php endif ?><!--if문 종료-->
	</div>
</body>
</html>