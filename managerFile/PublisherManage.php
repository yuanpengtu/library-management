<?php
	


	$out_PublisherAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from publisher";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++){
		
		$row=mysqli_fetch_assoc($result);
		$out_PublisherAll=$out_PublisherAll.""."<tr class='tbl-item'>";
		$out_PublisherAll=$out_PublisherAll.""."<td class='img'><img src='images/icon_filter/";
		$out_PublisherAll=$out_PublisherAll."".($i%33);
		$out_PublisherAll=$out_PublisherAll.".jpg' alt='' title=''/></td>";
		$out_PublisherAll=$out_PublisherAll.""."<td class='td-block'><p class='date'>建立时间：";
				
		$out_PublisherAll=$out_PublisherAll."".$row['establishtime'];//date("Y-m-d");;
		$out_PublisherAll=$out_PublisherAll.""."</p><p class='title'>";
		$out_PublisherAll=$out_PublisherAll."".$row['name'];
		
		$out_PublisherAll=$out_PublisherAll.""."</p><p class='desc'>";
		$out_PublisherAll=$out_PublisherAll."".$row['summary'];
		$out_PublisherAll=$out_PublisherAll.""."</p><p class='like'>";
		
		
		$name_pub=$row['name'];
		$sql_count = "select * from book where publisher='$name_pub'";
		$result_count = mysqli_query($con,$sql_count);
		$num_count = mysqli_num_rows($result_count);
		
		$out_PublisherAll=$out_PublisherAll."".$num_count;
		
		
		$out_PublisherAll=$out_PublisherAll.""." books in library</p><a href=";
		$out_PublisherAll=$out_PublisherAll.""."'ModifyPublihser.php?p=";
		$out_PublisherAll=$out_PublisherAll."".$row['name'];
		$out_PublisherAll=$out_PublisherAll.""."'><button class='btn btn-yellow btn-block'>";
		$out_PublisherAll=$out_PublisherAll.""."";
		$out_PublisherAll=$out_PublisherAll.""."<span class='fa fa-plus-circle'></span>&nbsp; modify";
		$out_PublisherAll=$out_PublisherAll.""."</button></a></td></tr>";
	}
	
	
	$_SESSION['out_PublisherAll']=$out_PublisherAll;


	echo '<script>window.location="PublisherManage.html";</script>';
?>