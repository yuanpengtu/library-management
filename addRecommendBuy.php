<?php
	$bookname = $_POST["bookname"];
	$writer = $_POST["writer"];
	$publisher=$_POST["publisher"];;
	$ISDN=$_POST["ISDN"];;
	$booktype=$_POST["booktype"];;
	$cardnumber=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$timenow=date('Y-m-d h:i:s', time());
	$sql="insert into recommendbuy(bookname,writer,publisher,ISDN,booktype,cardnumber,recommendtime) values('$bookname','$writer','$publisher','$ISDN','$booktype','$cardnumber','$timenow')";
	$result = mysqli_query($con,$sql);
	if($result){
		echo "<script>alert('新增荐购成功！');</script>";
		echo '<script>window.location="RecommendBuy.php";</script>';
	}
	else{
		echo "<script>alert('新增荐购失败！');</script>";
	}
?>