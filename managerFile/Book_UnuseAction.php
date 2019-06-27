<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
		if($p){
			$sql_out="select * from book where booknumber = '$p'";
			$result_out=mysqli_query($con, $sql_out);
			$row=mysqli_fetch_assoc($result_out);
			$booknumber=$row['booknumber'];
			$bookname=$row['bookname'];
			$publisher=$row['publisher'];
			$publishtime=$row['publishtime'];
			$writer=$row['writer'];
			$summary=$row['summary'];
			$ISDN=$row['ISDN'];
			$booktype=$row['booktype'];
			$version=$row['version'];
			$storeplace=$row['storeplace'];
			$cometime=$row['cometime'];
			$outmanager=$_SESSION['manager_cardnumber'];
			$Price=$row['Price'];
			
			
			
			
			$timenow=date('Y-m-d h:m:s',time());
			$sql_out_insert="insert into book_out(booknumber,bookname,publisher,publishtime,writer,summary,ISDN,booktype,version,storeplace,cometime,outtime,outmanager,Price) values('$booknumber','$bookname','$publisher','$publishtime','$writer','$summary','$ISDN','$booktype','$version','$storeplace','$cometime','$timenow','$outmanager','$Price')";
			$result_out_insert=mysqli_query($con, $sql_out_insert);
 			$sql_delete="delete from book where booknumber='$p'";
 			$result=mysqli_query($con, $sql_delete);
			
			if($result&&$result_out_insert){
				
				
				echo '<script>alert("报废成功！");</script>';
				echo '<script>window.location="BookManage.php";</script>';
			}
			else{
				echo '<script>alert("报废失败！");</script>';
			}
		}
?>