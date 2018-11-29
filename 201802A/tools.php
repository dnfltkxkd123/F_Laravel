<?php
	define("MAIN_PAGE","login_main.php");
	function reqeustValue($name){
		return isset($_REQUEST[$name])?$_REQUEST[$name]:"";
	}

	function errorBack($msg){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
			<script>
				alert('<?=$msg?>');
				history.back();
			</script>
		</body>
		</html>
		<?php
		exit();
	}

	function okGo($msg,$url){
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Document</title>
		</head>
		<body>
			<script>
				alert('<?=$msg?>');
				location.href = '<?=$url?>';
			</script>
		</body>
		</html>
		<?php
		exit();
	}

	function sessionValue($name){
		return isset($_SESSION[$name])?$_SESSION[$name]:"";
	}

	function bdUrl($url,$page,$num){
		$join = "?";
		if($page){
			$url.= $join."page=".$page;
			$join = "&";
		}
		if($num){
			$url.= $join."num=".$num;
		}
		return $url;
	}
?>