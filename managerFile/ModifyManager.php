<?php
	@$p = $_GET['p']?$_GET['p']:"123456";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from manager where cardnumber = '$p'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	$info_delete="";
	$info_modify="";
	$info_insert="";
	
	
	if($num){
		$row=mysqli_fetch_assoc($result);
		if(1){
			
			$info_delete=$info_delete.""."<div class='panel panel-green'>";
			$info_delete=$info_delete.""."<div class='panel-heading'>删除</div><div class='panel-body'><table class='table table-hover-color'>";
			$info_delete=$info_delete.""."<thead><tr>";
			$info_delete=$info_delete.""."<th>参数名</th>";
			$info_delete=$info_delete.""."<th>参数值</th></tr></thead><tbody>";
			$info_delete=$info_delete.""."<tr><td>证件号码</td><td>";
			$info_delete=$info_delete."".$row['cardnumber'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>登录密码</td><td>";
			$info_delete=$info_delete."".$row['password'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>姓名</td><td>";
			$info_delete=$info_delete."".$row['managername'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>所属部门</td><td>";
			$info_delete=$info_delete."".$row['apartment'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>性别</td><td>";
			$info_delete=$info_delete."".$row['gender'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>手机号码</td><td>";
			$info_delete=$info_delete."".$row['phone'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>Email</td><td>";
			$info_delete=$info_delete."".$row['email'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>国家</td><td>";
			$info_delete=$info_delete."".$row['country'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>记录时间</td><td>";
			$info_delete=$info_delete."".$row['comeintime'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
			$info_delete=$info_delete.""."<form action='Manager_DeleteAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
			$info_delete=$info_delete.""."<div class='form-group'>";
			$info_delete=$info_delete.""."<label for='inputPassword' class='col-md-3 control-label'>请输入密码：</label>";
			$info_delete=$info_delete.""."<div class='col-md-9'><div class='input-icon right'><i class='fa fa-lock'></i>";
			$info_delete=$info_delete.""."<input id='inputPassword' type='text' placeholder='请输入登录密码...' class='form-control' /></div></div></div>";
			$info_delete=$info_delete.""."<div class='form-actions pal'><div class='form-group mbn'><div class='col-md-offset-3 col-md-6'>";
			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>确认删除</button></div></div></div></form>";
		}
		
		$_SESSION['managerinfo_delete']=$info_delete;
		
		
		
		if(1){


			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>证件号码";
			$info_modify=$info_modify.""."</label><textarea name='managercardnumber' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['cardnumber'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>登录密码";
			$info_modify=$info_modify.""."</label><textarea name='managerpassword' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['password'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>管理员姓名";
			$info_modify=$info_modify.""."</label><textarea name='managername' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['managername'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>所属部门";
			$info_modify=$info_modify.""."</label><textarea name='managerapartment' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['apartment'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			

			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>性别";
			$info_modify=$info_modify.""."</label><textarea name='managergender' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['gender'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>手机号码";
			$info_modify=$info_modify.""."</label><textarea name='managerphone' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['phone'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>邮箱";
			$info_modify=$info_modify.""."</label><textarea name='manageremail' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['email'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>国家";
			$info_modify=$info_modify.""."</label><textarea name='managercountry' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['country'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$_SESSION['Cardnumber_of_ModifyManager']=$p;
			
		}
 		$_SESSION['managerinfo_modify']=$info_modify;
		
		if(1){
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>证件号码";
			$info_insert=$info_insert.""."</label><textarea name='managercardnumber' rows='1' class='form-control' placeholder='请输入证件号码...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>登录密码";
			$info_insert=$info_insert.""."</label><textarea name='managerpassword' rows='1' class='form-control' placeholder='请设置登录密码...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>管理员姓名";
			$info_insert=$info_insert.""."</label><textarea name='managername' rows='1' class='form-control' placeholder='请输入管理员姓名...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>所属部门";
			$info_insert=$info_insert.""."</label><textarea name='managerapartment' rows='1' class='form-control' placeholder='请输入所属部门...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>性别";
			$info_insert=$info_insert.""."</label><textarea name='managergender' rows='1' class='form-control' placeholder='请输入性别...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>手机号码";
			$info_insert=$info_insert.""."</label><textarea name='managerphone' rows='1' class='form-control' placeholder='请输入手机号码...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>邮箱";
			$info_insert=$info_insert.""."</label><textarea name='manageremail' rows='1' class='form-control' placeholder='请输入邮箱...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>国籍";
			$info_insert=$info_insert.""."</label><textarea name='managercountry' rows='1' class='form-control' placeholder='请输入国籍...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
		}
 		$_SESSION['managerinfo_insert']=$info_insert;
	}
	echo '<script>window.location="ModifyManager.html";</script>';
	

?>