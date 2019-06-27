<?php

	$pagesize=4;
	@$p = $_GET['p']?$_GET['p']:1;
	//数据指针
	$offset = ($p-1)*$pagesize;

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "SELECT * FROM publisher";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	
	$out_NewPublisher="";
	if($num){
		$sql_page = "SELECT * FROM publisher limit $offset,$pagesize";
		$result_page = mysqli_query($con,$sql_page);
		$num_page = mysqli_num_rows($result_page);
		for($i=0;$i<$num_page;$i++){
			$row_page=mysqli_fetch_assoc($result_page);
			
			$out_NewPublisher=$out_NewPublisher.""."<div class='blog'>";
			$out_NewPublisher=$out_NewPublisher.""."<div class='blog-title'>";
			$out_NewPublisher=$out_NewPublisher.""."<h3><a href='";
			$out_NewPublisher=$out_NewPublisher."".$row_page['html'];
			$out_NewPublisher=$out_NewPublisher.""."'>";
			$out_NewPublisher=$out_NewPublisher."".$row_page['name'];
			$out_NewPublisher=$out_NewPublisher.""."</a></h3><span class='blog-info'>";
			$out_NewPublisher=$out_NewPublisher.""."Established in ";
			$out_NewPublisher=$out_NewPublisher."".$row_page['establishtime'];
			$out_NewPublisher=$out_NewPublisher.""."| 10 comments</span>";
			$out_NewPublisher=$out_NewPublisher.""."</div><div class='imagebox right-margin'>";
			$out_NewPublisher=$out_NewPublisher.""."<a href='";
			$out_NewPublisher=$out_NewPublisher.$row_page['html'];
			
			$out_NewPublisher=$out_NewPublisher."'><img src='images/content/blog/blog_image_";
			$out_NewPublisher=$out_NewPublisher."".($i+1);
			
			$out_NewPublisher=$out_NewPublisher.".jpg' alt='Quisque gravida aliquet sapien' /></a>";
			$out_NewPublisher=$out_NewPublisher.""."</div><div><p>";
			$out_NewPublisher=$out_NewPublisher."".$row_page['summary'];
			$out_NewPublisher=$out_NewPublisher.""."</p>";
			$out_NewPublisher=$out_NewPublisher.""."<span class='readmore'><a href='";
			$out_NewPublisher=$out_NewPublisher."".$row_page['html'];
			$out_NewPublisher=$out_NewPublisher.""."' class='blue-button'>主页</a></span>";
			$out_NewPublisher=$out_NewPublisher.""."</div></div>";			
		}
		$pagenum = ceil($num/$pagesize);
		

		$out_NewPublisher=$out_NewPublisher."".'<a>共';
		$out_NewPublisher=$out_NewPublisher."".$num;
		$out_NewPublisher=$out_NewPublisher."".'条记录</a>';
		
		//循环输出个页数及链接
		if($pagenum>1){
		
			$out_NewPublisher=$out_NewPublisher.""."<div class='blog-nav'><span>Page ";
			$out_NewPublisher=$out_NewPublisher."".$p;
			$out_NewPublisher=$out_NewPublisher.""."of ";
			$out_NewPublisher=$out_NewPublisher."".$pagenum;
			$out_NewPublisher=$out_NewPublisher.""."</span><ul class='blue-button-nav'>";
			for($i=1;$i<=$pagenum;$i++){
				if($i==$p){
					$out_NewPublisher=$out_NewPublisher.""."<li><a href='PublisherIntroduce.php?p=";
					$out_NewPublisher=$out_NewPublisher."".$i;
					$out_NewPublisher=$out_NewPublisher.""."' class='current'>";
					$out_NewPublisher=$out_NewPublisher."".$i;
					$out_NewPublisher=$out_NewPublisher.""."</a></li>";
				}
				else{
					$out_NewPublisher=$out_NewPublisher.""."<li><a href='PublisherIntroduce.php?p=";
					$out_NewPublisher=$out_NewPublisher."".$i;
					$out_NewPublisher=$out_NewPublisher.""."'>";
					$out_NewPublisher=$out_NewPublisher."".$i;
					$out_NewPublisher=$out_NewPublisher.""."</a></li>";
				}
			}
			$out_NewPublisher=$out_NewPublisher.""."</ul></div>";
		}
		$_SESSION['out_PublisherNew']=$out_NewPublisher;
		echo '<script>window.location="PublisherIntroduce.html";</script>';
	}
	else{
		echo "<script>alert('系统错误！o(╯□╰)o');history.go(-1);</script>";
	}
	





?>