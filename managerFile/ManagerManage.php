<?php
	


	$out_ManagerAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from manager";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++){
		
		$row=mysqli_fetch_assoc($result);
		if($row['managername']!=$_SESSION['managername']){
			$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
			$out_ManagerAll=$out_ManagerAll."".($i%33);
			$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
			$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>录入数据库时间：";
					
			$out_ManagerAll=$out_ManagerAll."".$row['comeintime'];//date("Y-m-d");;
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
			$out_ManagerAll=$out_ManagerAll."".$row['managername'];
			
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='desc'>";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."</p><p class='like'>所属部门：";
	
			$out_ManagerAll=$out_ManagerAll."".$row['apartment'];
			
			
			$out_ManagerAll=$out_ManagerAll.""."</p><a href=";
			$out_ManagerAll=$out_ManagerAll.""."'ModifyManager.php?p=";
			$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
			$out_ManagerAll=$out_ManagerAll.""."'><button class='btn btn-yellow btn-block'>";
			$out_ManagerAll=$out_ManagerAll.""."";
			$out_ManagerAll=$out_ManagerAll.""."<span class='fa fa-plus-circle'></span>&nbsp; modify";
			$out_ManagerAll=$out_ManagerAll.""."</button></a></td></tr>";
		}
	}
	
	
	$_SESSION['out_ManagerAll']=$out_ManagerAll;


	echo '<script>window.location="ManagerManage.html";</script>';
?>