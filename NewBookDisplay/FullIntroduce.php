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
			
			$out_NewBook=$out_NewBook.""."<li id='id-";
			$out_NewBook=$out_NewBook."".($i+1);
			$out_NewBook=$out_NewBook.""."' class='brand'>";
			$out_NewBook=$out_NewBook.""."<div class='imagebox left'>";
			$out_NewBook=$out_NewBook.""."<div class='mosaic-block zoom'>";
			$out_NewBook=$out_NewBook.""."<a href='images/content/portfolio/portfolio_image_";
			$out_NewBook=$out_NewBook."".($i+1);
			$out_NewBook=$out_NewBook."".".jpg' class='mosaic-overlay' title='Donec Gravida' rel='prettyPhoto[portfolio]'>&nbsp;</a>";
			$out_NewBook=$out_NewBook.""."<div class='mosaic-backdrop'><img src='images/content/portfolio/portfolio_2col_thumb_";
			
			$out_NewBook=$out_NewBook."".($i+1);
			$out_NewBook=$out_NewBook."".".jpg' alt='' /></div>";
			$out_NewBook=$out_NewBook.""."</div></div><div class='project-info right'>";
			$out_NewBook=$out_NewBook.""."<h3>";
			$out_NewBook=$out_NewBook."".$row_page['bookname'];
			$out_NewBook=$out_NewBook.""."</h3>";
			$out_NewBook=$out_NewBook.""."<p>摘要：";
			
			$out_NewBook=$out_NewBook."".$row_page['summary'];
			$out_NewBook=$out_NewBook.""."</p>";
			$out_NewBook=$out_NewBook.""."<div class='project-details'>";
			$out_NewBook=$out_NewBook.""."<span><strong>出版社:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['publisher'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			
			$out_NewBook=$out_NewBook.""."<span><strong>责任人:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['writer'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			$out_NewBook=$out_NewBook.""."<span><strong>ISDN:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['ISDN'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			$out_NewBook=$out_NewBook.""."<span><strong>版次:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['version'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			$out_NewBook=$out_NewBook.""."<span><strong>类型:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['booktype'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			$out_NewBook=$out_NewBook.""."<span><strong>馆藏地:</strong> ";
			$out_NewBook=$out_NewBook."".$row_page['storeplace'];
			$out_NewBook=$out_NewBook.""."</span>";
			
			$out_NewBook=$out_NewBook.""."<span class='share'><strong>Share:</strong><a href='#' title='Twitter'><img src='images/social/twitter_small.png' alt='Twitter' /></a><a href='#' title='Flickr'><img src='images/social/flickr_small.png' alt='Flickr' /></a></span>";
			$out_NewBook=$out_NewBook.""."</div></div></li>";
// 			<li id="id-5" class="brand">
// 			<div class="imagebox left">
// 			<div class="mosaic-block zoom">
// 			<a href="images/content/portfolio/portfolio_image_5.jpg" class="mosaic-overlay" title="Donec Gravida" rel="prettyPhoto[portfolio]">&nbsp;</a>
// 			<div class="mosaic-backdrop"><img src="images/content/portfolio/portfolio_2col_thumb_5.jpg" alt="" /></div>
// 			</div>
// 			</div>
// 			<div class="project-info right">
// 			<h3>Donec Gravida</h3>
// 			<p>Nulla dignissim tortor bibendum libero via tempus. Integer elementum massa ac diam sodales mattis. Aenean semper tortor lobortis. Aliquam vulputate, mi non semper malesuada, tellus sem aliquet est, feugiat ullamcorper augue nibh iaculis neque.</p>
// 			<div class="project-details">
// 			<span><strong>Client:</strong> IntroPoint (<a href="http://www.intropoint.com/" rel="external">www.intropoint.com</a>)</span>
// 			<span><strong>Project:</strong> Photography, Corporate Brochure</span>
// 			<span><strong>Completed:</strong> January, 2012</span>
// 			<span><strong>Work Team:</strong> Darren Leaks, Cody Meritt</span>
// 			<span class="share"><strong>Share:</strong><a href="#" title="Twitter"><img src="images/social/twitter_small.png" alt="Twitter" /></a><a href="#" title="Flickr"><img src="images/social/flickr_small.png" alt="Flickr" /></a></span>
// 			</div>
// 			</div>
// 			</li>
						
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
					$out_BookPage=$out_BookPage.""."<li class='active'><a href='FullIntroduce.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."<span class='sr-only'>(current)</span></a></li>";
				}
				else{
					$out_BookPage=$out_BookPage.""."<li><a href='FullIntroduce.php?p=";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage.""."'>";
					$out_BookPage=$out_BookPage."".$i;
					$out_BookPage=$out_BookPage."".'</a></li>';
				}
			}
			
			$out_BookPage=$out_BookPage.""."<li><a href='#' aria-label='Next'>";
			$out_BookPage=$out_BookPage.""."<span aria-hidden='true'>&raquo;</span></a></li></ul></nav>";
		}
			
		
		
		
		
		$_SESSION['out_FullIntroduce']=$out_NewBook;
		$_SESSION['out_FullPage']=$out_BookPage;
		echo '<script>window.location="FullIntroduce.html";</script>';
	}
	else{
		echo "<script>alert('系统错误！o(╯□╰)o');history.go(-1);</script>";
	}
	





?>