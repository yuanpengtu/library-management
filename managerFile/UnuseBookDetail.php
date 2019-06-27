<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book_out where booknumber = '$p'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	$info_delete="";
	
	
	if($num){
		$row=mysqli_fetch_assoc($result);
		if(1){
			
			$info_delete=$info_delete.""."<div class='panel panel-green'>";
			$info_delete=$info_delete.""."<div class='panel-heading'>详情</div><div class='panel-body'><table class='table table-hover-color'>";
			$info_delete=$info_delete.""."<thead><tr>";
			$info_delete=$info_delete.""."<th>参数名</th>";
			$info_delete=$info_delete.""."<th>参数值</th></tr></thead><tbody>";
			$info_delete=$info_delete.""."<tr><td>书号</td><td>";
			$info_delete=$info_delete."".$row['booknumber'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>书名</td><td>";
			$info_delete=$info_delete."".$row['bookname'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>出版社</td><td>";
			$info_delete=$info_delete."".$row['publisher'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>出版时间</td><td>";
			$info_delete=$info_delete."".$row['publishtime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>作者</td><td>";
			$info_delete=$info_delete."".$row['writer'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>摘要</td><td>";
			$info_delete=$info_delete."".$row['summary'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>ISDN</td><td>";
			$info_delete=$info_delete."".$row['ISDN'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>书籍类型</td><td>";
			$info_delete=$info_delete."".$row['booktype'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>版次</td><td>";
			$info_delete=$info_delete."".$row['version'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>馆藏地</td><td>";
			$info_delete=$info_delete."".$row['storeplace'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>入馆时间</td><td>";
			$info_delete=$info_delete."".$row['cometime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>报废时间</td><td>";
			$info_delete=$info_delete."".$row['outtime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>报废处理人员编号</td><td>";
			$info_delete=$info_delete."".$row['outmanager'];
			$info_delete=$info_delete.""."</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
			$info_delete=$info_delete.""."<form action='UnuseBook_DeleteAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
			$info_delete=$info_delete.""."<div class='form-group'>";
			$info_delete=$info_delete.""."<label for='inputPassword' class='col-md-3 control-label'>请输入密码：</label>";
			$info_delete=$info_delete.""."<div class='col-md-9'><div class='input-icon right'><i class='fa fa-lock'></i>";
			$info_delete=$info_delete.""."<input id='inputPassword' type='text' placeholder='请输入登录密码...' class='form-control' /></div></div></div>";
			$info_delete=$info_delete.""."<div class='form-actions pal'><div class='form-group mbn'><div class='col-md-offset-3 col-md-6'>";
			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>确认删除</button></div></div></div></form>";
		}
	}
		
		$_SESSION['UnuseBook_DetailInfo']=$info_delete;
		echo '<script>window.location="UnuseBookDetail.html";</script>';
?>