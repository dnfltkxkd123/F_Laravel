@extends('layouts.template')

 

@section('title')

	글 상세보기 

@endsection

 

@section('content')

 

	<script>

			function delReq(num) {

				var yn = confirm("Are you sure?");

				if (yn == false) return;

 

				location.href="delete?num="+num+"&page="+<?=$page?>;

			}

	</script>	

 

	<div class="container">

  		<h2>게시글 상세 정보</h2>

  	</div>	

 

 

	<div class="container">

		<table class="table">

			<tr> 

				<th>제목</th>

				<td><?= $msg["Title"]?></td>

			</tr>	

			<tr> 

				<th>작성자</th>

				<td><?= $msg["Writer"]?></td>

			</tr>	

			<tr> 

				<th>작성일시</th>

				<td><?= $msg["Regtime"]?></td>				

			</tr>	

			<tr> 

				<th>조회수</th>

				<td><?= $msg["Hits"]?></td>				

			</tr>	

			<tr> 

				<th>내용</th>

				<td><?= $msg["Content"]?></td>				

			</tr>				

		</table>	

 

	</div>	

	

	<div class="container">

		<div class="row">

			<input type="button" class="btn btn-primary" 

				onclick="location.href='bbs?page=<?=$page?>'" value="목록보기">

			<input type="button" class="btn btn-success" 

				onclick="location.href='modify?num=<?= $msg["Num"] ?>&page=<?= $page ?>'" value="수정">

			<form action="delete" method="post">

				@csrf

				<input type="hidden" name="num" 

					value="{{$msg['Num']}}">

				<input type="hidden" name="page" 

					value="{{$page}}">	

				<button type="submit" class="btn btn-danger">

					삭제

				</button>	

			</form>					

		</div>	

	</div>	

 

@endsection

