<?php
	if(isset($_POST["submit"]) && $_POST["submit"] == "登录")
	{
		$user = $_POST["cardnumber"];
		$psw = $_POST["password"];
		if($user == "" || $psw == "")
		{
			echo "<script>alert('请输入证件号码或密码！'); history.go(-1);</script>";
		}
		else
		{
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"homework");
			mysqli_query($con,"set names 'utf8'");
			$sql = "select cardnumber,password from user where cardnumber = '$_POST[cardnumber]' and password = '$_POST[password]'";
			$result = mysqli_query($con,$sql);
			$num = mysqli_num_rows($result);
			if($num)
			{
				$row = mysqli_fetch_array($result);	//将数据以索引方式储存在数组中
				
				
				$sql1 ="Select * from user where cardnumber='$_POST[cardnumber]'";
				$result1 = mysqli_query($con,$sql1);
				for($i=0;$i<1;$i++){
					$row=mysqli_fetch_assoc($result1);
					$_SESSION['username_info']=$row['username'];
					$_SESSION['usertype_info']=$row['type'];
					
					$_SESSION['username']=$row['username'];
					$_SESSION['cardnumber']=$user;
				}
				
				
				
				
				
				
				
				echo "<script>alert('登录成功！');</script>";
				echo '<script>window.location="Usermain.html";</script>';
			}
			else
			{
				echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('提交未成功！'); history.go(-1);</script>";
	}
 
?>
