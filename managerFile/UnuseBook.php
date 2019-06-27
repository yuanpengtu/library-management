<?php
	


	$out_ManagerAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book_out";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++){
		
		$row=mysqli_fetch_assoc($result);
			$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
			$out_ManagerAll=$out_ManagerAll."".($i%33);
			$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>出版时间：";
					
			$out_ManagerAll=$out_ManagerAll."".$row['publishtime'];//date("Y-m-d");;
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
			$out_ManagerAll=$out_ManagerAll."".$row['bookname'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc'>";
			$out_ManagerAll=$out_ManagerAll."".$row['publisher'];
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='like'>操作人员编号：";
	
			$out_ManagerAll=$out_ManagerAll."".$row['outmanager'];
			
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a href=";
			$out_ManagerAll=$out_ManagerAll.""."'UnuseBookDetail.php?p=";
			$out_ManagerAll=$out_ManagerAll."".$row['booknumber'];
			$out_ManagerAll=$out_ManagerAll.""."'><button class='btn btn-yellow btn-block'>";
			$out_ManagerAll=$out_ManagerAll.""."";
			$out_ManagerAll=$out_ManagerAll.""."<span class='fa fa-plus-circle'></span>&nbsp; modify";
			$out_ManagerAll=$out_ManagerAll.""."</button></a></td></tr>";
	}
	
	
	$_SESSION['out_UnuseBook']=$out_ManagerAll;


	echo '<script>window.location="UnuseBook.html";</script>';
?>