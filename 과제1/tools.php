<!--공용메소드-->
<?php
	//메시지를 출력하고 url로 이동하는 메소드
	function okGo($msg/*메시지*/ , $url/*url*/){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
			<script>
				alert("<?=$msg?>");
				location.href = "<?=$url?>";
			</script>
		</body>
		</html>
		
		<?php
		exit();
	}

	//오류메시지를 출력하고 이전 페이지로 이동하는 메소드
	function errorBack($msg/*메시지*/){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
			<script>
				alert("<?=$msg?>");//메세지 출력
				history.back();//이전사이트로 이동
			</script>
		</body>
		</html>
		<?php
		exit();
	}

	//세션의 값을 구할때 사용하는 메소드
	function sessionValue($name/*세션이름*/){
		return isset($_SESSION[$name])?$_SESSION[$name]:"";
	}

	//url주소를 만드는 메소드
	function bdUrl($url,$page,$num){
		$join = "?";
		if($page){
			$url.= $join."page=".$page;/* <?=$url?>?page=<?=$page?>*/
			$join = "&";//
		}
		if($num){
			$url.= $join."num=".$num;/* <?=$url?>?page=<?=$page?>&num=<?=$num?>*/
		}
		return $url;
	}

	function requestValue($name){
		return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
	}
?>