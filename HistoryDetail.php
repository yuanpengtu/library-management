<?php
	@$p = $_GET['p']?$_GET['p']:1;
	$id=$p;
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from borrow_history where id = '$id'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($num){
		for($i=0;$i<1;$i++){
			$row=mysqli_fetch_assoc($result);
			$_SESSION['book_borrowtime']=$row['borrowtime'];
			$_SESSION['book_backtime']=$row['backtime'];
			$_SESSION['book_number']=$row['booknumber'];
			
			$booknum=$row['booknumber'];
			
			$sqli = "select * from book where booknumber = '$booknum'";
			$resulti = mysqli_query($con,$sqli);
			for($j=0;$j<1;$j++){
				$row1=mysqli_fetch_assoc($resulti);
				$_SESSION['book_name']=$row1['bookname'];
				$_SESSION['book_writer']=$row1['writer'];
				$_SESSION['book_publisher']=$row1['publisher'];
				$_SESSION['book_storeplace']=$row1['storeplace'];
			}
			
		}
		
		echo '<script>window.location="HistoryDetail.html";</script>';
	}
	else{
		echo "<script>alert('该记录不存在，系统错误！');history.go(-1);</script>";
	}
?>