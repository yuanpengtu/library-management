<?php	
	
	$pagesize = 2;
	//确定页数p参数
	@$p = $_GET['p']?$_GET['p']:1;
	//数据指针
	$offset = ($p-1)*$pagesize;
	
	
	
	
	
	
	$cardnum=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select booknumber from borrowbook_view where cardnumber = '$cardnum'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$out="";
	if($num)
	{	
		
		$query_sql = "select * from borrowbook_view where cardnumber='$cardnum' limit $offset,$pagesize";
		$result_sql = mysqli_query($con,$query_sql);
		$num_sql = mysqli_num_rows($result_sql);
		$out=$out.""."<a>第<span>$p</span>页</a>";
		
		
		
		for($j=0;$j<$num_sql;$j++){
			$out=$out.""."<div class='feat_prod_box'>";
			$out=$out.""."<div class='prod_img'><a href='details.html'><img src='images/BookProd/prod1.gif' alt='' title='' border='0' /></a></div>";
			$out=$out.""."<div class='prod_det_box'>";
			$out=$out.""."<div class='box_top'></div>";
			$out=$out.""."<div class='box_center'>";
			$out=$out.""."<div class='prod_title'>";
			
			
			$row_borrow=mysqli_fetch_assoc($result_sql);
			$booknumber=$row_borrow['booknumber'];
			$sql_book = "select bookname,summary,version from borrowbook_view where booknumber = '$booknumber'";
			
			$result_book = mysqli_query($con,$sql_book);
			
			
			$summary_book="";
			for($i=0;$i<1;$i++){
				$row_book=mysqli_fetch_assoc($result_book);
				$summary_book=$summary_book."".$row_book['summary'];
				$out=$out."".$row_book['bookname'];
				$out=$out." "."第";
				$out=$out."".$row_book['version'];
				$out=$out.""."版";
			}
			$out=$out.""."</div><p class='details'>摘要：";
			$out=$out."".$summary_book;
			$out=$out.""."</p>";
			
			
			
			$sql_lost = "select * from lost where booknumber = '$booknumber'";
			$result_lost=mysqli_query($con, $sql_lost);
			$num_lost=mysqli_num_rows($result_lost);
			if($num_lost){
				$out=$out.""."<a href='#' class='more'>- 已挂失 -</a>";
			}
			else{
				$out=$out.""."<a href='LostUpEnsure.php?p=";
				$out=$out."".$booknumber;
				$out=$out.""."' class='more'>- 挂失 -</a>";
			}
			
			$out=$out.""."<div class='clear'></div></div>";
			$out=$out.""."<div class='box_bottom'></div></div>";
			$out=$out.""."<div class='clear'></div></div>";
		}
	}
	

	$pagenum = ceil($num/$pagesize);
	$out=$out."".'<a>共';
	$out=$out."".$num;
	$out=$out."".'条记录</a>';
	
	//循环输出个页数及链接
	if($pagenum>1){

		$out=$out.""."<nav aria-label='Page navigation'>";
		$out=$out.""."<ul class='pagination'><li class='disabled>";
		$out=$out.""."<a href='#' aria-label='Previous'>";
		$out=$out.""."<span aria-hidden='true'>&laquo;</span></a></li>";
		for($i = 1;$i<=$pagenum;$i++){
			if($i == $p){
				$out=$out.""."<li class='active'><a href='LostUp.php?p=";
				$out=$out."".$i;
				$out=$out.""."'>";
				$out=$out."".$i;
				$out=$out.""."<span class='sr-only'>(current)</span></a></li>";
			}
			else{
				$out=$out.""."<li><a href='LostUp.php?p=";
				$out=$out."".$i;
				$out=$out.""."'>";
				$out=$out."".$i;
				$out=$out."".'</a></li>';
			}
		}
			
		$out=$out.""."<li><a href='#' aria-label='Next'>";
		$out=$out.""."<span aria-hidden='true'>&raquo;</span></a></li></ul></nav>";
// 		for($i = 1;$i<=$pagenum;$i++){
// 			if($i == $p){
// 				$out=$out."".'<a>[';
// 				$out=$out."".$i;
// 				$out=$out."".']</a>';
	
// 			}else{
// 				$out=$out."".' <a href="Borrow.php?p=';
// 				$out=$out."".$i;
// 				$out=$out."".'">';
// 				$out=$out."".$i;
// 				$out=$out."".'</a>';
// 			}
// 		}
	}
	
	
	$_SESSION['Userout_Lost']=$out;
	echo '<script>window.location="LostUp.html";</script>';

?>