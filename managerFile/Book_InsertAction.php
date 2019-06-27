<?php
	$booknumber=$_POST['booknumber'];
	$bookname=$_POST['bookname'];
	$publisher=$_POST['publisher'];
	$publishtime=$_POST['publishtime'];
	$writer=$_POST['writer'];
	$summary=$_POST['summary'];
	$ISDN=$_POST['ISDN'];
	$booktype=$_POST['booktype'];
	$version=$_POST['version'];
	$storeplace=$_POST['storeplace'];
	$Price=$_POST['Price'];
	
	
	$publishtime_true=strtr($publishtime,'T',' ');
	
	if($storeplace==''){
		echo '<script>alert("请输入馆藏地！");history.go(-1);</script>';
	}
	else if($booknumber==''){
		echo '<script>alert("请输入书号！");history.go(-1);</script>';
	}
	else if($bookname==''){
		echo '<script>alert("请输入书名！");history.go(-1);</script>';
	}
	else if($Price==''){
		echo '<script>alert("请输入单价！");history.go(-1);</script>';
	}
	else if($version==''){
		echo '<script>alert("请输入版次！");history.go(-1);</script>';
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
		
		$sql_search="select * from book where booknumber='$booknumber'";
		$result_search=mysqli_query($con,$sql_search);
		$num=mysqli_num_rows($result_search);
		if($num){
			echo '<script>alert("书籍编号已存在！");history.go(-1);</script>';
		}
		else{
			
			$time=date('y-m-d h:m:s',time());
			$sql = "insert into book(booknumber,bookname,publisher,publishtime,writer,summary,ISDN,booktype,version,storeplace,cometime,borrowflag,Price) values('$booknumber','$bookname','$publisher','$publishtime_true','$writer','$summary','$ISDN','$booktype','$version','$storeplace','$time','0','$Price')";
			
			$result = mysqli_query($con,$sql);
			if($result){
				echo '<script>alert("新增记录成功！");window.location.href="BookManage.php";</script>';
			}
			else{
				echo '<script>alert("新增记录失败！");history.go(-1);</script>';
			}
		}
	}
?>