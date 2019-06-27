<?php
	@$p = $_GET['p'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	
	if(1){
		if($p){
			$sql_delete="delete from book where booknumber='$p'";
			$result=mysqli_query($con, $sql_delete);
			if($result){
				echo '<script>alert("删除成功！");</script>';
				echo '<script>window.location="BookManage.php";</script>';
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