<?php
	$establishtime=$_POST['publisherestablishtime'];
	$name=$_POST['publishername'];
	$html=$_POST['publisherhtml'];
	$summary=$_POST['publishersummary'];
	$range=$_POST['publisherrange'];
	$principle=$_POST['publisherprinciple'];
	
	$establishtime_true=strtr($establishtime,'T',' ');
	$original_name=$_SESSION['ForEnsureModify_info'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "update publisher set Bookrange='$range',name='$name',summary='$summary',html='$html',principle='$principle',establishtime='$establishtime_true'  where name = '$original_name'";
	$result = mysqli_query($con,$sql);
	if($result){
		echo '<script>alert("修改成功！");window.location.href="PublisherManage.php";</script>';
	}
	else{
		echo '<script>alert("修改失败！");history.go(-1);</script>';
	}
?>