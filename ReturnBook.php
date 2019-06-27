<?php
	@$p = $_GET['p']?$_GET['p']:1;
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "DELETE from borrow_now where id='$p'";
	
	
	$result = mysqli_query($con,$sql);
	
	
	$sqli="update book set borrowflag=0 where booknumber='$p'";
	$resulti=mysqli_query($con,$sqli);
	if($result&&$resulti){
		echo '<script>alert("还书成功！");window.location="Borrow.php";</script>';
	}
	else{
		echo '<script>alert("还书失败！");window.location="Borrow.php";</script>';
	}
?>