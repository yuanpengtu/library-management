<?php
	


	$out_ManagerAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from user";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++){
		
		$row=mysqli_fetch_assoc($result);
			$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
			$out_ManagerAll=$out_ManagerAll."".($i%33);
			$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>注册时间：";
					
			$out_ManagerAll=$out_ManagerAll."".$row['effecttime'];//date("Y-m-d");;
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
			$out_ManagerAll=$out_ManagerAll."".$row['username'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc'>";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc_gender'>";
	
			$out_ManagerAll=$out_ManagerAll."".$row['gender'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc_apartment'>";
			$out_ManagerAll=$out_ManagerAll."".$row['apartment'];
				
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc_grade'>";
			$out_ManagerAll=$out_ManagerAll."".$row['grade'];
			$out_ManagerAll=$out_ManagerAll.""."";
			
			
			
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a href=";
			$out_ManagerAll=$out_ManagerAll.""."'UserManageDetail.php?p=";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."'><button class='btn btn-yellow btn-block'>";
			$out_ManagerAll=$out_ManagerAll.""."";
			$out_ManagerAll=$out_ManagerAll.""."<span class='fa fa-plus-circle'></span>&nbsp; modify";
			$out_ManagerAll=$out_ManagerAll.""."</button></a></td></tr>";
	}
	
	
	$_SESSION['out_UserManage']=$out_ManagerAll;

	
// 	$out_temp="";
// 	$out_temp=$out_temp.""."<div class='text-filter-box'>";
// 	$out_temp=$out_temp.""."<div class='input-group'><span class='input-group-addon'><i class='fa fa-search'></i></span><input data-path='.title' type='text' value='' placeholder='Filter by Name' data-control-type='textbox' data-control-name='title-filter' data-control-action='filter' class='form-control'/></div>";
// 	$out_temp=$out_temp.""."</div>";
// 	$out_temp=$out_temp.""."<div class='text-filter-box'>";
// 	$out_temp=$out_temp.""."<div class='input-group'><span class='input-group-addon'><i class='fa fa-search'></i></span><input data-path='.desc' type='text' value='' placeholder='Filter by Cardnumber' data-control-type='textbox' data-control-name='desc-filter' data-control-action='filter' class='form-control'/></div>";
// 	$out_temp=$out_temp.""."</div>";
// 	$out_temp=$out_temp.""."<div class='text-filter-box'>";
// 	$out_temp=$out_temp.""."<div class='input-group'><span class='input-group-addon'><i class='fa fa-search'></i></span><input data-path='.desc_gender' type='text' value='' placeholder='Filter by Gender' data-control-type='textbox' data-control-name='desc_gender-filter' data-control-action='filter' class='form-control'/></div>";
// 	$out_temp=$out_temp.""."</div>";
// 	$out_temp=$out_temp.""."<div class='text-filter-box'>";
// 	$out_temp=$out_temp.""."<div class='input-group'><span class='input-group-addon'><i class='fa fa-search'></i></span><input data-path='.title_apartment' type='text' value='' placeholder='Filter by Apartment' data-control-type='textbox' data-control-name='title_apartment-filter' data-control-action='filter' class='form-control'/></div>";
// 	$out_temp=$out_temp.""."</div>";

// 	$out_temp=$out_temp.""."<div class='text-filter-box'>";
// 	$out_temp=$out_temp.""."<div class='input-group'><span class='input-group-addon'><i class='fa fa-search'></i></span><input data-path='.desc_grade' type='text' value='' placeholder='Filter by Grade' data-control-type='textbox' data-control-name='desc_grade-filter' data-control-action='filter' class='form-control'/></div>";
// 	$out_temp=$out_temp.""."</div>";
//	$_SESSION['out_UserFilter']=$out_temp;

	echo '<script>window.location="UserManage.html";</script>';
?>