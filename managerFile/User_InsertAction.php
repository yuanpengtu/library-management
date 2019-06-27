<?php
	$cardnumber=$_POST['usercardnumber'];
	$username=$_POST['username'];
	$gender=$_POST['usergender'];
	$apartment=$_POST['userapartment'];
	$grade=$_POST['usergrade'];
	$phone=$_POST['userphone'];
	$email=$_POST['useremail'];
	$password=$_POST['userpassword'];
	$country=$_POST['usercountry'];
	$type=$_POST['usertype'];
	if($cardnumber==''){
		echo '<script>alert("请输入证件号码！");history.go(-1);</script>';
	}
	else if($username==''){
		echo '<script>alert("请输入姓名！");history.go(-1);</script>';
	}
	else if($gender==''){
		echo '<script>alert("请输入性别！");history.go(-1);</script>';
	}
	else if($apartment==''){
		echo '<script>alert("请输入所属部门！");history.go(-1);</script>';
	}
	else if($grade==''){
		echo '<script>alert("请输入年级！");history.go(-1);</script>';
	}
	else if($phone==''){
		echo '<script>alert("请输入手机号码！");history.go(-1);</script>';
	}
	else if($email==''){
		echo '<script>alert("请输入邮箱！");history.go(-1);</script>';
	}
	else if($password==''){
		echo '<script>alert("请输入密码！");history.go(-1);</script>';
	}
	else if($country==''){
		echo '<script>alert("请输入国籍！");history.go(-1);</script>';
	}
	else if($type==''){
		echo '<script>alert("请输入用户类别！");history.go(-1);</script>';
	}
	else{
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		$sql_judge = "select * from user where cardnumber='$cardnumber'";
		$result_judge = mysqli_query($con,$sql_judge);
		$num_judge=mysqli_num_rows($result_judge);
		if($gender!='男'&&$gender!='女'){
			echo '<script>alert("性别输入错误！");history.go(-1);</script>';
		}
		else if($num_judge>0){
			echo '<script>alert("证件号码已存在！");history.go(-1);</script>';
		}
		else{
			$time=date("y-m-d h:m:s",time());
			$sql = "insert into user(cardnumber,username,gender,apartment,grade,phone,email,password,country,type,effecttime,chargemoney) values('$cardnumber','$username','$gender','$apartment','$grade','$phone','$email','$password','$country','$type','$time','0')";
			
			$result = mysqli_query($con,$sql);
			if($result){
				echo '<script>alert("新增用户成功！");window.location.href="UserManage.php";</script>';
			}
			else{
				echo '<script>alert("新增用户失败！");history.go(-1);</script>';
			}
		}
	}
?>