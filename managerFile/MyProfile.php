<?php
	$p=$_SESSION['manager_cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from manager where cardnumber = '$p'";
	$result = mysqli_query($con,$sql);
	$info_delete="";
	$row=mysqli_fetch_assoc($result);
		if(1){
			$info_delete=$info_delete.""."<div class='panel panel-green'>";
			$info_delete=$info_delete.""."<div class='panel-heading'>个人信息</div><div class='panel-body'><table class='table table-hover-color'>";
			$info_delete=$info_delete.""."<thead><tr>";
			$info_delete=$info_delete.""."<th>参数名</th>";
			$info_delete=$info_delete.""."<th>参数值</th></tr></thead><tbody>";
			$info_delete=$info_delete.""."<tr><td>证件号</td><td>";
			$info_delete=$info_delete."".$row['cardnumber'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>姓名</td><td>";
			$info_delete=$info_delete."".$row['managername'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>所属部门</td><td>";
			$info_delete=$info_delete."".$row['apartment'];
			$info_delete=$info_delete.""."</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>记录时间</td><td>";
			$info_delete=$info_delete."".$row['comeintime'];
			$info_delete=$info_delete.""."</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>性别</td><td>";
			$info_delete=$info_delete."".$row['gender'];
			$info_delete=$info_delete.""."</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>联系电话</td><td>";
			$info_delete=$info_delete."".$row['phone'];
			$info_delete=$info_delete.""."</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>邮箱</td><td>";
			$info_delete=$info_delete."".$row['email'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>国籍</td><td>";
			$info_delete=$info_delete."".$row['country'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
		}
		
		$_SESSION['Personalinfo']=$info_delete;
		echo '<script>window.location="MyProfile.html";</script>';
?>