<?php
	if(isset($_POST["submit"]))
	{
		$cardnumber = $_POST["cardnumber"];
		$email = $_POST["email"];
		$oldpassword = $_POST["oldpassword"];
		$newpassword = $_POST["newpassword"];
		$password_confirm = $_POST["password_confirm"];
		
		
		
		
		
		if($cardnumber == "")
		{
			echo "<script>alert('请输入证件号码！');</script>";
		}
		else if($email == "")
		{
			echo "<script>alert('请输入邮箱！');</script>";
		}
		else if($oldpassword == "")
		{
			echo "<script>alert('请输入原密码！');</script>";
		}
		else if($newpassword == "")
		{
			echo "<script>alert('请输入新密码！');</script>";
		}
		else if($password_confirm == "")
		{
			echo "<script>alert('请输入确认密码！');</script>";
		}
		else if($password_confirm!=$newpassword)
		{
			echo "<script>alert('新密码和确认密码不一致！');</script>";
		}
		else
		{
			$con=mysqli_connect("localhost","root","");
			mysqli_select_db($con,"homework");
			mysqli_query($con,"set names 'utf8'");
			$sql = "select password,email from user where cardnumber = '$_POST[cardnumber]'";
			$result = mysqli_query($con,$sql);
			$num = mysqli_num_rows($result);
			if($num)
			{
				$passwordold="";
				$emailold="";
				for($i=0;$i<1;$i++){
					$row=mysqli_fetch_assoc($result);
					$passwordold=$row['password'];
					$emailold=$row['email'];
				}
				if($passwordold!=$oldpassword){
					echo "<script>alert('原密码错误！');</script>";
				}
				else if($email!=$emailold){
					echo "<script>alert('邮箱错误！');</script>";
				}
				else{
					$sql_change = "update user set password='$newpassword' where cardnumber = '$cardnumber'";
					$result_update = mysqli_query($con,$sql_change);
				    if ($result_update) {
						echo "<script>alert('修改密码成功！');</script>";
						echo '<script>window.location="login.html";</script>';
                    } else {
                        echo "<script>alert('系统繁忙，请稍候！');</script>";
                    }
				}
			}
			else
			{
				echo "<script>alert('证件号不存在！');history.go(-1);</script>";
			}
		}
	}
	else
	{
		echo "<script>alert('提交未成功！');</script>";
	}
 
?>
