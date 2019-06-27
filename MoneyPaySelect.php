<?php
	$frm_tag = $_POST['checkbox'];
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	
	
	for($i=0;$i<count($frm_tag);$i++){
		$sql = "update chargehistory set dealflag=1 where id = '$frm_tag[$i]'";

		$result = mysqli_query($con,$sql);
	}
	echo "<script>alert('处理成功！);history.go(-1);</script>";
	echo '<script>window.location="MoneyPay.php";</script>';

?>