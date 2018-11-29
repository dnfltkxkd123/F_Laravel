<?php
	require_once('recommend_bookSample2.php');
?>

<script>
	var r = $("<button type='button' class='btn btn-success btn-product' title='Edit' onclick=''><span class='glyphicon glyphicon-shopping-cart'>책받기</span></button>")
	r.attr('onclick',"location.href='orderSample.php'");
	$('#commentForm').append(r);
</script>