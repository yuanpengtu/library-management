<?php
	$usercard=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql1 ="Select username,gender,apartment,grade,phone,email,country,type,effecttime from user where cardnumber='$usercard'";
	$result1 = mysqli_query($con,$sql1);
	$num = mysqli_num_rows($result1);
	if($num){
		for($i=0;$i<1;$i++){
			$row=mysqli_fetch_assoc($result1);
			$_SESSION['card_info']=$usercard;
			$_SESSION['username_info']=$row['username'];
			$_SESSION['gender_info']=$row['gender'];
			$_SESSION['apartment_info']=$row['apartment'];
			$_SESSION['phone_info']=$row['phone'];
			$_SESSION['grade_info']=$row['grade'];
			$_SESSION['email_info']=$row['email'];
			$_SESSION['country_info']=$row['country'];
			$_SESSION['usertype_info']=$row['type'];
			$_SESSION['effecttime_info']=$row['effecttime'];
			echo '<script>window.location="PersonalInfo.html";</script>';
		}
	}
	else
		echo "<script>alert('用户名不存在，系统错误！');history.go(-1);</script>";
// 	echo '<script>window.location="PersonalInfo.html";</script>';
?>