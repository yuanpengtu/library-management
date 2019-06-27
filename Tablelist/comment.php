<?php
	error_reporting(0);
	if($_SESSION['cardnumber']!=NULL){
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		
		$tmp=$_SESSION['cardnumber'];
		$comment=$_POST['commentdetail'];
		$ISDN=$_SESSION['click_book_ISDN'];
		$time=date('y-m-d h:m:s',time());
		$sql_comment="insert into comment(time,cardnumber,comment,ISDN) values('$time','$tmp','$comment','$ISDN')";
		$result_comment = mysqli_query($con,$sql_comment);
		if($result_comment){
			echo "<script>alert('评论成功！');</script>";
			
			//$line="<script>window.location='BookDetail.php?p=";
			$_SESSION['comment_ISDN']=$ISDN;
			echo "<script>window.location='BookDetail.php';</script>";
		}
		else{
			echo "<script>alert('评论失败！');</script>";
			echo "<script>window.location='book-detail.html';</script>";
		}
	}
	else{
		echo "<script>alert('您还未登录>_<,请先登录！');</script>";
	}
?>