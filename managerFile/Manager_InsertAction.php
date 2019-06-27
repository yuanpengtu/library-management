<?php
	$cardnumber=$_POST['managercardnumber'];
	$password=$_POST['managerpassword'];
	$managername=$_POST['managername'];
	$apartment=$_POST['managerapartment'];
	$gender=$_POST['managergender'];
	$phone=$_POST['managerphone'];
	$email=$_POST['manageremail'];
	$country=$_POST['managercountry'];
	
	
	
	
	
	
	if($cardnumber==''){
		echo '<script>alert("请输入管理员证件号码！");history.go(-1);</script>';
	}
	else if($password==''){
		echo '<script>alert("请输入该管理员登录密码！");history.go(-1);</script>';
	}
	else if($managername==''){
		echo '<script>alert("请输入管理员姓名！");history.go(-1);</script>';
	}
	else if($apartment==''){
		echo '<script>alert("请输入所属部门！");history.go(-1);</script>';
	}
	else if($gender==''){
		echo '<script>alert("请输入性别！");history.go(-1);</script>';
	}
	else if($phone==''){
		echo '<script>alert("请输入电话号码！");history.go(-1);</script>';
	}
	else if($email==''){
		echo '<script>alert("请输入邮箱！");history.go(-1);</script>';
	}
	else if($country==''){
		echo '<script>alert("请输入所属国家！");history.go(-1);</script>';
	}
	else{
		if($gender=='男'||$gender=='女'){
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"homework");
			mysqli_query($con,"set names 'utf8'");
			$sql_exist="select * from manager where cardnumber='$cardnumber'";
			$result_exist=mysqli_query($con, $sql_exist);
			$num_exist=mysqli_num_rows($result_exist);
			if($num_exist){
				echo '<script>alert("该证件号已存在，请重新输入！");history.go(-1);</script>';
			}
			else{
				
				$comeintime_now=date('Y-m-d h:i:s', time());
				$sql = "insert into manager(cardnumber,password,managername,apartment,comeintime,gender,phone,email,country) values('$cardnumber','$password','$managername','$apartment','$comeintime_now','$gender','$phone','$email','$country')";
				
				$result = mysqli_query($con,$sql);
				if($result){
					echo '<script>alert("新增记录成功！");window.location.href="ManagerManage.php";</script>';
				}
				else{
					echo '<script>alert("新增记录失败！");history.go(-1);</script>';
				}
			}
		}
		else{
			echo '<script>alert("性别输入错误(男/女)！");history.go(-1);</script>';
		}
	}
?>