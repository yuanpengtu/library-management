<?php
	$establishtime=$_POST['publisherestablishtime'];
	$name=$_POST['publishername'];
	$html=$_POST['publisherhtml'];
	$summary=$_POST['publishersummary'];
	$range=$_POST['publisherrange'];
	$principle=$_POST['publisherprinciple'];
	
	$establishtime_true=strtr($establishtime,'T',' ');
	
	if($name==''){
		echo '<script>alert("请输入出版社名字！");history.go(-1);</script>';
	}
	else if($principle==''){
		echo '<script>alert("请输入出版社宗旨！");history.go(-1);</script>';
	}
	else if($range==''){
		echo '<script>alert("请输入出版社经营范围！");history.go(-1);</script>';
	}
	else if($html==''){
		echo '<script>alert("请输入出版社主页网站！");history.go(-1);</script>';
	}
	else if($establishtime==''){
		echo '<script>alert("请输入出版社建立时间！");history.go(-1);</script>';
	}
	else if($summary==''){
		echo '<script>alert("请输入简介！");history.go(-1);</script>';
	}
	else{
	
		$con=mysqli_connect("localhost","root","");
		mysqli_select_db($con,"homework");
		mysqli_query($con,"set names 'utf8'");
		$sql = "insert into publisher(name,summary,establishtime,principle,Bookrange,html) values('$name','$summary','$establishtime_true','$principle','$range','$html')";
		
		$result = mysqli_query($con,$sql);
		if($result){
			echo '<script>alert("新增记录成功！");window.location.href="PublisherManage.php";</script>';
		}
		else{
			echo '<script>alert("新增记录失败！");history.go(-1);</script>';
		}
	}
?>