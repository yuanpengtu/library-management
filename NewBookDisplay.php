<?php

	$pagesize=4;
	@$p = $_GET['p']?$_GET['p']:1;
	//数据指针
	$offset = ($p-1)*$pagesize;

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "SELECT * FROM book where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(cometime)";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	
	$out_NewBook="";
	if($num){
		$sql_page = "SELECT * FROM book where DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(cometime) limit $offset,$pagesize";
		$result_page = mysqli_query($con,$sql_page);
		$num_page = mysqli_num_rows($result_page);
		for($i=0;$i<$num_page;$i++){
			
			
			
			$row_page=mysqli_fetch_assoc($result_page);
			
			if($i==3){
				$out_NewBook=$out_NewBook.""."<div class='service-box one-fourth plus latest'>";
			}
			else{
				$out_NewBook=$out_NewBook.""."<div class='service-box one-fourth plus'>";
			}
			$out_NewBook=$out_NewBook.""."<div class='content'><div class='mosaic-block'>";
			$out_NewBook=$out_NewBook.""."<a href='#' class='mosaic-overlay'>&nbsp;</a>";
			$out_NewBook=$out_NewBook.""."<div class='mosaic-backdrop'><img src='images/content/service/service_image_";
			$out_NewBook=$out_NewBook."".($i+1);
			$out_NewBook=$out_NewBook."".".jpg' alt='' /></div>";
			$out_NewBook=$out_NewBook.""."</div><h2><a href='#'>";
			$out_NewBook=$out_NewBook."".$row_page['bookname'];
			$out_NewBook=$out_NewBook.""." 第";
			$out_NewBook=$out_NewBook."".$row_page['version'];
			$out_NewBook=$out_NewBook.""."版";
			$out_NewBook=$out_NewBook.""."</a></h2><div class='horizon-line'></div><p>";
			$out_NewBook=$out_NewBook."".$row_page['summary'];
			$out_NewBook=$out_NewBook.""."</p></div></div>";
						
		}
		
		$pagenum = ceil($num/$pagesize);
		
		$out_BookPage="";
		$out_BookPage=$out_BookPage."".'<a>共';
		$out_BookPage=$out_BookPage."".$num;
		$out_BookPage=$out_BookPage."".'条记录</a>';
		
		//循环输出个页数及链接
		if($pagenum>1){
		
			$out_BookPage=$out_BookPage.""."<nav aria-label='Page navigation'>";
			$out_BookPage=$out_BookPage.""."<ul class='pagination'><li class='disabled>";
			$out_BookPage=$out_BookPage.""."<a href='#' aria-label='Previous'>";
			$out_BookPage=$out_BookPage.""."<span aria-hidden='true'>&laquo;</span></a></li>";
			for($i = 1;$i<=$pagenum;$i++)
			{
				if($i == $p){
					$out_BookPage=$out_BookPage.""."<li class='active'><a href='../NewBookDisplay.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."<span class='sr-only'>(current)</span></a></li>";
				}
				else{
					$out_BookPage=$out_BookPage.""."<li><a href='../NewBookDisplay.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage."".'</a></li>';
				}
			}
			
			$out_BookPage=$out_BookPage.""."<li><a href='#' aria-label='Next'>";
			$out_BookPage=$out_BookPage.""."<span aria-hidden='true'>&raquo;</span></a></li></ul></nav>";
		}
			
		
		
		
		
		$_SESSION['out_NewBook']=$out_NewBook;
		$_SESSION['out_BookPage']=$out_BookPage;
		echo '<script>window.location="NewBookDisplay/index.html";</script>';
	}
	else{
		echo "<script>alert('最近没有新书哦！o(╯□╰)o');history.go(-1);</script>";
	}
	





?>