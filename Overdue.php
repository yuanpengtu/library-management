<?php

	$pagesize=3;
	@$p = $_GET['p']?$_GET['p']:1;
	//数据指针
	$offset = ($p-1)*$pagesize;

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	
	
	$cardnumber=$_SESSION['cardnumber'];
	$sql = "SELECT * FROM borrow_now where DATE_SUB(CURDATE(), INTERVAL 30 DAY) > date(borrowtime) and cardnumber='$cardnumber'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	$out_BorrowNoList="";
	$out_BorrowNo="";
	if($num){
		$sql_page = "SELECT * FROM borrow_now where DATE_SUB(CURDATE(), INTERVAL 30 DAY) > date(borrowtime) and cardnumber='$cardnumber' limit $offset,$pagesize";
		$result_page = mysqli_query($con,$sql_page);
		$num_page = mysqli_num_rows($result_page);
		for($i=0;$i<$num_page;$i++){
			$row_page=mysqli_fetch_assoc($result_page);
			$out_BorrowNoList=$out_BorrowNoList.""."<tr>";
			$out_BorrowNoList=$out_BorrowNoList.""."<td style='width:50px;'><span class='round'>S</span></td>";
			$out_BorrowNoList=$out_BorrowNoList.""."<td><h6>";
			
			
			
			$booknumber=$row_page['booknumber'];
			$sql_getBookname="SELECT * FROM book where booknumber = '$booknumber'";
			$result_getBookname = mysqli_query($con,$sql_getBookname);
			$row_getBookname=mysqli_fetch_assoc($result_getBookname);

			$out_BorrowNoList=$out_BorrowNoList."".$row_getBookname['bookname'];
			$out_BorrowNoList=$out_BorrowNoList.""."</h6><small class='text-muted'>第";
			$out_BorrowNoList=$out_BorrowNoList."".$row_getBookname['version'];
			$out_BorrowNoList=$out_BorrowNoList.""."版</small></td><td>";
			$out_BorrowNoList=$out_BorrowNoList."".$row_page['borrowtime'];
			$out_BorrowNoList=$out_BorrowNoList.""."</td><td>";
			
			
			
			$zero1=strtotime(date("y-m-d h:i:s"));
			$zero2=strtotime($row_page['borrowtime']);
			$dayUp=ceil(($zero1-$zero2)/86400)-30;
			
			$out_BorrowNoList=$out_BorrowNoList."".$dayUp;
			$out_BorrowNoList=$out_BorrowNoList.""."天</td></tr>";
			
			
			$out_BorrowNo=$out_BorrowNo.""."<div class='col-lg-4'><div class='card'>";
			$out_BorrowNo=$out_BorrowNo.""."<img class='card-img-top img-responsive' src='assets/images/big/img";
			$out_BorrowNo=$out_BorrowNo.($i+1);
			$out_BorrowNo=$out_BorrowNo."".".jpg' alt='Card'>";
			$out_BorrowNo=$out_BorrowNo.""."<div class='card-block'>";
			$out_BorrowNo=$out_BorrowNo.""."<ul class='list-inline font-14'>";
			$out_BorrowNo=$out_BorrowNo.""."<li class='p-l-0'>第";
			
			$out_BorrowNo=$out_BorrowNo."".$row_getBookname['version'];
			$out_BorrowNo=$out_BorrowNo.""."版</li><li><a href='javascript:void(0)' class='link'>3 Comment</a></li>";
			$out_BorrowNo=$out_BorrowNo.""."</ul><h3 class='font-normal'>";
			$out_BorrowNo=$out_BorrowNo."".$row_getBookname['bookname'];
			$out_BorrowNo=$out_BorrowNo.""."</h3></div></div></div>";
		}
		
		$pagenum = ceil($num/$pagesize);
		
		$out_BookPage="";

		
		$_SESSION['sumup_Noreturn']=$num;
		if($pagenum>1){
		
			$out_BookPage=$out_BookPage.""."<nav aria-label='Page navigation'>";
			

			
			
			
			$out_BookPage=$out_BookPage.""."<ul class='pagination'><li class='disabled>";

			$out_BookPage=$out_BookPage.""."<a href='#' aria-label='Previous'>";
			$out_BookPage=$out_BookPage.""."<span aria-hidden='true'>&laquo;</span></a></li>";
			for($i = 1;$i<=$pagenum;$i++)
			{
				if($i == $p){
					$out_BookPage=$out_BookPage.""."<li class='active'><a href='Overdue.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."<span class='sr-only'>(current)</span></a></li>";
				}
				else{
					$out_BookPage=$out_BookPage.""."<li><a href='Overdue.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage."".'</a></li>';
				}
			}
			
			$out_BookPage=$out_BookPage.""."<li><a href='#' aria-label='Next'>";
			$out_BookPage=$out_BookPage.""."<span aria-hidden='true'>&raquo;</span></a></li></ul></nav>";
		}
		
		$_SESSION['out_NoReturnBookImage']=$out_BorrowNo;
		$_SESSION['out_NoReturnBookInfo']=$out_BorrowNoList;
		$_SESSION['out_NoReturnBookPage']=$out_BookPage;
		echo '<script>window.location="Overdue.html";</script>';
	}
	else{
		echo "<script>alert('最近没有超期图书哦！o(╯□╰)o');history.go(-1);</script>";
	}
	





?>