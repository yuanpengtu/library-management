<?php
	


	$out_ManagerAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql_search = "SELECT cardnumber FROM borrow_now where DATE_SUB(CURDATE(), INTERVAL 30 DAY) > date(borrowtime) ";
	$result_search = mysqli_query($con,$sql_search);
	$num_search = mysqli_num_rows($result_search);
	for($i=1;$i<=$num_search;$i++){
		
		$row_search=mysqli_fetch_assoc($result_search);
		$cardnumber=$row_search['cardnumber'];
		$sql = "SELECT * FROM user where cardnumber='$cardnumber'";
		$result = mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		
			$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
			$out_ManagerAll=$out_ManagerAll."".($i%33);
			$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>注册时间：";
					
			$out_ManagerAll=$out_ManagerAll."".$row['effecttime'];//date("Y-m-d");;
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
			$out_ManagerAll=$out_ManagerAll."".$row['username'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a>证件号码：</a><p class='desc'>";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."</p><a>性别：</a><p class='desc_gender'>";
	
			$out_ManagerAll=$out_ManagerAll."".$row['gender'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a>所属部门：</a><p class='desc_apartment'>";
			$out_ManagerAll=$out_ManagerAll."".$row['apartment'];
				
			$out_ManagerAll=$out_ManagerAll.""."</p><a>年级：</a><p class='desc_grade'>";
			$out_ManagerAll=$out_ManagerAll."".$row['grade'];
			$out_ManagerAll=$out_ManagerAll.""."";
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a>超期数量：</a><p class='desc_apartment'>";
			
			
			$sql_num = "SELECT * FROM Borrow_Now where cardnumber='$cardnumber'";
			$result_num = mysqli_query($con,$sql_num);
			$num_num = mysqli_num_rows($result_num);
			
			$out_ManagerAll=$out_ManagerAll."".$num_num;
			
			
			$out_ManagerAll=$out_ManagerAll.""."本</p><a href=";
			$out_ManagerAll=$out_ManagerAll.""."'UserManageDetail.php?p=";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."'><button class='btn btn-yellow btn-block'>";
			$out_ManagerAll=$out_ManagerAll.""."";
			$out_ManagerAll=$out_ManagerAll.""."<span class='fa fa-plus-circle'></span>&nbsp; modify";
			$out_ManagerAll=$out_ManagerAll.""."</button></a></td></tr>";
	}
	
	
	$_SESSION['out_OverDue']=$out_ManagerAll;


	echo '<script>window.location="OverdueReader.html";</script>';
?>