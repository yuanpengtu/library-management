<?php
	@$p = $_GET['p']?$_GET['p']:1;
	$booknumber=$p;
	$cardnumber=$_SESSION['cardnumber'];
	$borrowtime=date('Y-m-d h:i:s', time()); ;
	$backtime=$borrowtime;
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql="insert into borrow_now(booknumber,cardnumber,borrowtime,backtime,effective) values('$booknumber','$cardnumber','$borrowtime','$backtime',1)";
	$result = mysqli_query($con,$sql);
	if($result){
		echo "<script>alert('借阅成功！');location.href='../Usermain.html';</script>";
	}
	else{
		echo '<script>alert("借阅失败！");history.go(-1);</script>';
	}
?>