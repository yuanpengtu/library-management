<?php
	@$p = $_GET['p']?$_GET['p']:1;
	$cardnumber=$_SESSION['cardnumber']?$_SESSION['cardnumber']:0;
	
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql="select * from user where cardnumber='$cardnumber'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($num){
		$alert="<script> if(confirm( '是否借阅该书籍？ '))  location.href='BorrowEnsure.php?p=";
		$alert=$alert."".$p;
		$alert=$alert.""."';</script>";
		
		echo $alert;
	}
	else{
		echo '<script>alert("您还未登录，请以用户身份先登录！");history.go(-1);</script>';
	}
	


?>