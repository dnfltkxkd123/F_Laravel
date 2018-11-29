@extends('layouts.template')

 

@section('title')

	게시글 리스트

@endsection

 

@section('content')

 

	<div class="container">

  		<h2>게시글 리스트</h2> 

	</div>

 

<div class="container">

		<table class="table table-hover">

			<tr>

				<th>번호</th>

				<th>제목</th>

				<th>작성자</th>

				<th>작성일시</th>

				<th>조회수</th>

			</tr>	

			@foreach($msgs as $row)

				<tr>

					<td>{{$row["Num"]}}</td>

					<td>

						<a href="view?id={{$row["Num"]}}&page={{$currentPage}}">

							{{$row["Title"]}}						

						</a>		

					</td>

					<td>{{$row["Writer"]}}</td>

					<td>{{$row["Regtime"]}}</td>

					<td>{{$row["Hits"]}}</td>

				</tr>

			@endforeach	

 

		</table>	

		<input type="button" value="글쓰기" onclick="location.href='write'" class="btn btn-danger">

	</div>	

	<br><br>

	<div class="container">

	<ul class="pagination">

	<?php

		if($startPage > 1) {

	?>		<li class="page-item">

				<a class="page-link"  href="?page=<?= $startPage-1 ?>"> Previous </a>

			</li>

	<?php		

		}

		for ($i=$startPage; $i<=$endPage; $i++) {

			if($i==$currentPage) {

	?>

			<li class="page-item  active">

				<a class="page-link"  href="?page=<?= $i ?>"> 

					<?= $i ?> 

				</a>

			</li>	

	<?php			

				

			}else {

	?>		<li class="page-item">	

				<a class="page-link"  href="?page=<?= $i ?>"> <?= $i ?> </a>

			</li>	

	<?php			

			}	

		}

		if ($endPage < $totalPages) {

	?>		<li class="page-item">

				<a class="page-link"  href="?page=<?= $endPage+1 ?>"> Next </a>

			</li>	

	<?php		

		}

	?>

	</ul>

	</div>

 

@endsection