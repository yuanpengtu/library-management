<?php
	$username=$_POST['username'];
	$gender=$_POST['usergender'];
	$apartment=$_POST['userapartment'];
	$grade=$_POST['usergrade'];
	$phone=$_POST['userphone'];
	$email=$_POST['useremail'];
	$password=$_POST['userpassword'];
	$country=$_POST['usercountry'];
	$type=$_POST['usertype'];
	$p=$_SESSION['UserDeleteEnsure_info'];
	if($gender!='男'&&$gender!='女'){
		echo '<script>alert("性别错误！");history.go(-1);</script>';
	}
	else{
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		$sql = "update user set username='$username',gender='$gender',apartment='$apartment',grade='$grade',phone='$phone',email='$email',password='$password',country='$country',type='$type'  where cardnumber = '$p'";
		$result = mysqli_query($con,$sql);
		if($result){
			echo '<script>alert("修改成功！");window.location.href="UserManage.php";</script>';
		}
		else{
			echo '<script>alert("修改失败！");history.go(-1);</script>';
		}
	}
?>