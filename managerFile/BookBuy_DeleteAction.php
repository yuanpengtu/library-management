<?php
	@$p = $_GET['p'];
	//$username=$_SESSION['managername'];
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	
// 	$password=$_SESSION['managerlogin_password'];
// 	$sql = "select * from manager where managername = '$username' and password='$password'";
// 	$result = mysqli_query($con,$sql);
// 	$num = mysqli_num_rows($result);
	
	if(1){
		if($p){
			$sql_delete="delete from book_buy where identifier='$p'";
			$result=mysqli_query($con, $sql_delete);
			if($result){
				echo '<script>alert("删除成功！");</script>';
				echo '<script>window.location="BuyBookManage.php";</script>';
			}
			else{
				echo '<script>alert("删除失败！");</script>';
			}
		}
	}
	else{
		echo '<script>alert("密码错误！");history.go(-1);</script>';
	}

?>