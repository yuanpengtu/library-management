<?php
	@$p = $_GET['p']?$_GET['p']:"海南:南海出版公司";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from publisher where name = '$p'";
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
			$info_delete=$info_delete.""."<tr><td>出版社名</td><td>";
			$info_delete=$info_delete."".$row['name'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>成立时间</td><td>";
			$info_delete=$info_delete."".$row['establishtime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>宗旨</td><td>";
			$info_delete=$info_delete."".$row['principle'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>运营范围</td><td>";
			$info_delete=$info_delete."".$row['Bookrange'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>官网</td><td><a href='";
			$info_delete=$info_delete."".$row['html'];
			$info_delete=$info_delete.""."'>";
			$info_delete=$info_delete."".$row['name'];
			$info_delete=$info_delete.""."</a></td><tr>";
			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
			$info_delete=$info_delete.""."<form action='Publisher_DeleteAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
			$info_delete=$info_delete.""."<div class='form-group'>";
			$info_delete=$info_delete.""."<label for='inputPassword' class='col-md-3 control-label'>请输入密码：</label>";
			$info_delete=$info_delete.""."<div class='col-md-9'><div class='input-icon right'><i class='fa fa-lock'></i>";
			$info_delete=$info_delete.""."<input id='inputPassword' type='text' placeholder='请输入登录密码...' class='form-control' /></div></div></div>";
			$info_delete=$info_delete.""."<div class='form-actions pal'><div class='form-group mbn'><div class='col-md-offset-3 col-md-6'>";
			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>确认删除</button></div></div></div></form>";
		}
		
		$_SESSION['publisherinfo_delete']=$info_delete;
		
		
		
		if(1){


			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社名";
			$info_modify=$info_modify.""."</label><textarea name='publishername' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['name'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社宗旨";
			$info_modify=$info_modify.""."</label><textarea name='publisherprinciple' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['principle'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社经营范围";
			$info_modify=$info_modify.""."</label><textarea name='publisherrange' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['Bookrange'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社主页";
			$info_modify=$info_modify.""."</label><textarea name='publisherhtml' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['html'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社建立时间";
			$info_modify=$info_modify.""."</label><i class='fa fa-user'></i>";
			
			$info_modify=$info_modify.""."<input type='datetime-local' step='01' name='publisherestablishtime' />";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社简介";
			$info_modify=$info_modify.""."</label><textarea name='publishersummary' rows='5' class='form-control'>";
			$info_modify=$info_modify."".$row['summary'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$_SESSION['ForEnsureModify_info']=$row['name'];
			
		}
 		$_SESSION['publisherinfo_modify']=$info_modify;
		
		if(1){
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社名";
			$info_insert=$info_insert.""."</label><textarea name='publishername' rows='1' class='form-control' placeholder='请输入出版者名字...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社宗旨";
			$info_insert=$info_insert.""."</label><textarea name='publisherprinciple' rows='1' class='form-control' placeholder='请输入出版者宗旨...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社经营范围";
			$info_insert=$info_insert.""."</label><textarea name='publisherrange' rows='1' class='form-control' placeholder='请输入出版者经营范围...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社主页";
			$info_insert=$info_insert.""."</label><textarea name='publisherhtml' rows='1' class='form-control' placeholder='请输入出版者主页网址...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社建立时间";
			$info_insert=$info_insert.""."</label><i class='fa fa-user'></i>";
				
			$info_insert=$info_insert.""."<input type='datetime-local' step='01' name='publisherestablishtime' />";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社简介";
			$info_insert=$info_insert.""."</label><textarea name='publishersummary' rows='5' class='form-control' placeholder='请输入出版者简介信息...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
		}
 		$_SESSION['publisherinfo_insert']=$info_insert;
	}
	echo '<script>window.location="ModifyPublisher.html";</script>';
	

?>