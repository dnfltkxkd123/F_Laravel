<?php
	require("Dao.php");
	$num = $_REQUEST["num"];
	$dao = new Dao();
	$sort = $_REQUEST["sort"];
	$dir = $_REQUEST["dir"];
	$fileName = $dao -> delete($num);
    unlink("files/$fileName");

    header("Location: web.php?sort=$sort&dir=$dir");
?>
<script>
	alert("<?=$fileName?>");
</script>