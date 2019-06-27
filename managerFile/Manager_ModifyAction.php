<?php
	$cardnumber=$_POST['managercardnumber'];
	$password=$_POST['managerpassword'];
	$name=$_POST['managername'];
	$apartment=$_POST['managerapartment'];
	$gender=$_POST['managergender'];
	$phone=$_POST['managerphone'];
	$email=$_POST['manageremail'];
	$country=$_POST['managercountry'];
	
	
	if($gender=='男'||$gender=='女'){
		
		$oricardnumber=$_SESSION['Cardnumber_of_ModifyManager'];
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		$sql = "update manager set cardnumber='$cardnumber',password='$password',managername='$name',apartment='$apartment',gender='$gender',phone='$phone',email='$email',country='$country'  where cardnumber = '$oricardnumber'";
		$result = mysqli_query($con,$sql);
		if($result){
			echo '<script>alert("修改成功！");window.location.href="ManagerManage.php";</script>';
		}
		else{
			echo '<script>alert("修改失败！");history.go(-1);</script>';
		}
	}
	else{
		echo '<script>alert("性别输入错误！");history.go(-1);</script>';
	}
?>