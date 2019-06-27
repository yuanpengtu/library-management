<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book where booknumber = '$p'";
	$sqlii = "select * from lost where booknumber = '$p'";
	
	
	
	$result = mysqli_query($con,$sql);
	$resultii = mysqli_query($con,$sqlii);
	$row=mysqli_fetch_assoc($result);
	$rowii=mysqli_fetch_assoc($resultii);
	$usernumber=$rowii['usernumber'];
	$booknumber=$rowii['booknumber'];
	if(1){
		$money=$row['Price'];
		

		
		
		$sqliii = "select * from user where cardnumber = '$usernumber'";
		$resultiii = mysqli_query($con,$sqliii);
		$rowiii=mysqli_fetch_assoc($resultiii);
		$money_current=$rowiii['chargemoney'];
		$update_money=$money_current+$money;
		
		
		$date_now=date("y-m-d h:m:s",time());
		//$sqli_history="insert into chargehistory(chargemoney,chargetime,dealflag,usernumber,chargetype) values('$update_money','$date_now','0','$usernumber','1')";
		//$result_history=mysqli_query($con, $sqli_history);		

 		$sqliiii="update user set chargemoney='$update_money' where cardnumber='$usernumber'";
 		$resultiiii=mysqli_query($con, $sqliiii);
		if($resultiiii){
			//echo $p;
 			$sql_delete="delete from book where booknumber='$p'";
 			$result_delete=mysqli_query($con, $sql_delete);
 			//echo mysqli_errno($con);
 			//echo $result_delete;
 			if($result_delete){
 					echo '<script>alert("处理记录成功！");</script>';
 					echo '<script>window.location="LostBook.php";</script>';
 			}
 			else{
 				echo '<script>alert("删除书籍失败！");history.go(-1);</script>';
 			}
		}
		else{
			echo '<script>alert("更新罚款失败！");history.go(-1);</script>';
		}
	}

		

?>