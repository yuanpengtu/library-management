<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	$booknumber=$p;
	$usernumber=$_SESSION['cardnumber'];
	$losttime=date('Y-m-d h:i:s',time());
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "insert into lost(booknumber,usernumber,losttime) values('$booknumber','$usernumber','$losttime')";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($result){
		echo '<script>alert("挂失成功，等待管理员处理！");history.go(-1);</script>';
	}
	else{
		echo '<script>alert("挂失失败！");history.go(-1);</script>';
	}
?>