<?php	

	$pagesize = 3;
	//确定页数p参数
	@$p = $_GET['p']?$_GET['p']:1;
	//数据指针
	$offset = ($p-1)*$pagesize;



	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from notice order by publishertime desc";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$title="";
	$detail_Newest="";
	if($num){
		for($i=0;$i<$num;$i++){
			$row=mysqli_fetch_assoc($result);
			$title=$title."".'<li>';
			$title=$title.""."<a href='";
			$title=$title."".$row['hosthtml'];
			$title=$title.""."'>";
			$title=$title."".$row['title'];
			$title=$title.""."</a></li>";
			

			
			
		}
		
		$sqli = "select * from notice order by publishertime desc limit $offset,$pagesize";
		$resulti = mysqli_query($con,$sqli);
		$numi = mysqli_num_rows($resulti);
		for($j=0;$j<$numi;$j++){
			$row1=mysqli_fetch_assoc($resulti);
			if(!($j%2)){
				$detail_Newest=$detail_Newest.""."<div class='about-grid1 agileits w3layouts' ";
				$detail_Newest=$detail_Newest.""."onclick='window.open('";
				$detail_Newest=$detail_Newest."".$row1['hosthtml'];
				$detail_Newest=$detail_Newest.""."','";
				$detail_Newest=$detail_Newest.""."_self')'>";
				$detail_Newest=$detail_Newest.""."<div class='col-md-6 col-sm-6 agileits w3layouts about-grid about-info'>";
				
				
				$detail_Newest=$detail_Newest.""."<h3><a ";
				$detail_Newest=$detail_Newest.""."href='";
				$detail_Newest=$detail_Newest."".$row1['hosthtml'];
				$detail_Newest=$detail_Newest.""."'>";
				$detail_Newest=$detail_Newest."".$row1['title'];
				$detail_Newest=$detail_Newest.""."</a></h3>";
				
				$detail_Newest=$detail_Newest.""."<p>";
				$detail_Newest=$detail_Newest."".$row1['Detail'];
				$detail_Newest=$detail_Newest.""."</p></div>";
				$detail_Newest=$detail_Newest.""."<div class='col-md-6 col-sm-6 agileits w3layouts about-grid about-image'>";
				$detail_Newest=$detail_Newest.""."<img src='images/NewestInfo/about-1.jpg' alt='agileits w3layouts'>";
				$detail_Newest=$detail_Newest.""."</div><div class='clearfix'></div></div>";
			
			
			}
			else{
				$detail_Newest=$detail_Newest.""."<div class='about-grid2 agileits w3layouts' ";
				$detail_Newest=$detail_Newest.""."onclick='window.open('";
				$detail_Newest=$detail_Newest."".$row1['hosthtml'];
				$detail_Newest=$detail_Newest.""."','";
				$detail_Newest=$detail_Newest.""."_self')'>";
				
				
				
				$detail_Newest=$detail_Newest.""."<div class='col-md-6 col-sm-6 agileits w3layouts about-grid about-image'>";
				$detail_Newest=$detail_Newest.""."<img src='images/NewestInfo/about-2.jpg' alt='agileits w3layouts'>";
				$detail_Newest=$detail_Newest.""."</div>";
				$detail_Newest=$detail_Newest.""."<div class='col-md-6 col-sm-6 agileits w3layouts about-grid about-info'>";
				$detail_Newest=$detail_Newest.""."<h3><a ";
				$detail_Newest=$detail_Newest.""."href='";
				$detail_Newest=$detail_Newest."".$row1['hosthtml'];
				$detail_Newest=$detail_Newest.""."'>";
				$detail_Newest=$detail_Newest."".$row1['title'];
				$detail_Newest=$detail_Newest.""."</a></h3>";
			
				$detail_Newest=$detail_Newest.""."<p>";
				$detail_Newest=$detail_Newest."".$row1['Detail'];
				$detail_Newest=$detail_Newest.""."</p></div>";
			
				$detail_Newest=$detail_Newest.""."<div class='clearfix'></div></div>";
			}
		}
		
		
		
		
		$pagenum = ceil($num/$pagesize);
		$detail_Newest=$detail_Newest."".'<a>共';
		$detail_Newest=$detail_Newest."".$num;
		$detail_Newest=$detail_Newest."".'条记录</a>';
		
		//循环输出个页数及链接
		if($pagenum>1){
			
			$detail_Newest=$detail_Newest.""."<nav aria-label='Page navigation'>";
			$detail_Newest=$detail_Newest.""."<ul class='pagination'><li class='disabled>";
			$detail_Newest=$detail_Newest.""."<a href='#' aria-label='Previous'>";
			$detail_Newest=$detail_Newest.""."<span aria-hidden='true'>&laquo;</span></a></li>";
			
			
			
			for($i = 1;$i<=$pagenum;$i++){
				if($i == $p){
					$detail_Newest=$detail_Newest.""."<li class='active'><a href='NewestInfo.php?p=";
					$detail_Newest=$detail_Newest."".$i;
					$detail_Newest=$detail_Newest.""."'>";
					$detail_Newest=$detail_Newest."".$i;
					$detail_Newest=$detail_Newest.""."<span class='sr-only'>(current)</span></a></li>";
				}
				else{
					$detail_Newest=$detail_Newest.""."<li><a href='NewestInfo.php?p=";
					$detail_Newest=$detail_Newest."".$i;
					$detail_Newest=$detail_Newest.""."'>";
					$detail_Newest=$detail_Newest."".$i;
					$detail_Newest=$detail_Newest."".'</a></li>';
				}
			}
			
			$detail_Newest=$detail_Newest.""."<li><a href='#' aria-label='Next'>";
			$detail_Newest=$detail_Newest.""."<span aria-hidden='true'>&raquo;</span></a></li></ul></nav>";
		}
		
		
		$_SESSION['title_info']=$title;
		$_SESSION['title_detail_info']=$detail_Newest;
		echo '<script>window.location="NewestInfo.html";</script>';
		
	}
	else{
		echo "<script>alert('当前没有公告⊙▂⊙');history.go(-1);</script>";
	}


?>