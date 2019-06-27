<?php
	@$p = $_GET['p']?$_GET['p']:1;
	$sql="delete from recommendbuy where id='$p'";
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$result = mysqli_query($con,$sql);
	if($result){
		echo "<script>alert('撤销荐购成功！');</script>";
		echo '<script>window.location="RecommendBuy.php";</script>';
	}
	else{
		echo "<script>alert('撤销荐购失败！');</script>";
	}
?>