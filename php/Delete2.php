<?php
	require("Dao2.php");
	$dao = new Dao();
	$num = $_REQUEST["num"];
	$sort = $_REQUEST["sort"];
	$dir = $_REQUEST["dir"];
	$fileName = $dao -> delete($num);
	unlink("files/$fileName");
	header("Location: Web2.php?sort=$sort&dir=$dir");
?>
<script>
	alert("<?=$num?>");
</script>
