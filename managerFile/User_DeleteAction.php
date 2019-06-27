<?php
	@$p = $_GET['p'];
// 	$username=$_SESSION['managername'];
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	
	$sql_search="select * from borrow_now where cardnumber='$p'";
	$result_search=mysqli_query($con, $sql_search);
	$num_search=mysqli_num_rows($result_search);
	for($i=0;$i<$num_search;$i++){
		$row=mysqli_fetch_assoc($result_search);
		$booknumber=$row['booknumber'];
		$sql_search="update book set borrowflag=0 where booknumber='$booknumber'";
		$result_search=mysqli_query($con, $sql_search);;
	}
	
	if(1){
		if($p){
			$sql_delete="delete from user where cardnumber='$p'";
			$result=mysqli_query($con, $sql_delete);
			
			
			if($result){
				echo '<script>alert("删除成功！");</script>';
				echo '<script>window.location="UserManage.php";</script>';
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