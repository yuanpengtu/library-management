<?php
	$identifier=$_POST['bookbuy_identifier'];
	$bookname=$_POST['bookbuy_bookname'];
	$publisher=$_POST['bookbuy_publisher'];
	$publishtime=$_POST['bookbuy_publishtime'];
	$writer=$_POST['bookbuy_writer'];
	$ISDN=$_POST['bookbuy_ISDN'];
	$summary=$_POST['bookbuy_summary'];
	$version=$_POST['bookbuy_version'];
	$booktype=$_POST['bookbuy_booktype'];
	
	
	$publishtime_true=strtr($publishtime,'T',' ');
	
	if($identifier==''){
		echo '<script>alert("请输入采购编号！");history.go(-1);</script>';
	}
	else if($bookname==''){
		echo '<script>alert("请输入书名！");history.go(-1);</script>';
	}
	else if($publisher==''){
		echo '<script>alert("请输入出版社！");history.go(-1);</script>';
	}
	else if($booktype==''){
		echo '<script>alert("请输入书籍类型！");history.go(-1);</script>';
	}
	else if($publishtime==''){
		echo '<script>alert("请输入出版时间！");history.go(-1);</script>';
	}
	else if($summary==''){
		echo '<script>alert("请输入简介！");history.go(-1);</script>';
	}
	else if($writer==''){
		echo '<script>alert("请输入作者！");history.go(-1);</script>';
	}
	else if($ISDN==''){
		echo '<script>alert("请输入ISDN号！");history.go(-1);</script>';
	}
	else{
		
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		
		$sql_search="select * from book_buy where identifier='$identifier'";
		$result_search=mysqli_query($con,$sql_search);
		$num=mysqli_num_rows($result_search);
		if($num){
			echo '<script>alert("采购编号已存在！");history.go(-1);</script>';
		}
		else{
			$sql = "insert into book_buy(bookname,publisher,publishtime,writer,summary,ISDN,booktype,version,identifier) values('$bookname','$publisher','$publishtime_true','$writer','$summary','$ISDN','$booktype','$version','$identifier')";
			
			$result = mysqli_query($con,$sql);
			if($result){
				echo '<script>alert("新增记录成功！");window.location.href="BuyBookManage.php";</script>';
			}
			else{
				echo '<script>alert("新增记录失败！");history.go(-1);</script>';
			}
		}
	}
?>