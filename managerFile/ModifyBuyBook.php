<?php
	@$p = $_GET['p']?$_GET['p']:"123456";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book_buy where identifier = '$p'";
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
			$info_delete=$info_delete.""."<tr><td>采购编号</td><td>";
			$info_delete=$info_delete."".$row['identifier'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>书名</td><td>";
			$info_delete=$info_delete."".$row['bookname'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>版次</td><td>";
			$info_delete=$info_delete."".$row['version'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>作者</td><td>";
			$info_delete=$info_delete."".$row['writer'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>出版社</td><td>";
			$info_delete=$info_delete."".$row['publisher'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>出版时间</td><td>";
			$info_delete=$info_delete."".$row['publishtime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>ISDN</td><td>";
			$info_delete=$info_delete."".$row['ISDN'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>书籍类型</td><td>";
			$info_delete=$info_delete."".$row['booktype'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>书籍简介</td><td>";
			$info_delete=$info_delete."".$row['summary'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
			$info_delete=$info_delete.""."<form action='BookBuy_DeleteAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
			$info_delete=$info_delete.""."<div class='form-group'>";
			$info_delete=$info_delete.""."<label for='inputPassword' class='col-md-3 control-label'>请输入密码：</label>";
			$info_delete=$info_delete.""."<div class='col-md-9'><div class='input-icon right'><i class='fa fa-lock'></i>";
			$info_delete=$info_delete.""."<input id='inputPassword' type='text' placeholder='请输入登录密码...' class='form-control' /></div></div></div>";
			$info_delete=$info_delete.""."<div class='form-actions pal'><div class='form-group mbn'><div class='col-md-offset-3 col-md-6'>";
			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>确认删除</button></div></div></div></form>";
		}
		
		$_SESSION['bookbuy_delete']=$info_delete;
		
		
		
		if(1){


			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>采购编号";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_identifier' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['identifier'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书名";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_bookname' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['bookname'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>版次";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_version' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['version'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>作者";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_writer' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['writer'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_publisher' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['publisher'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			

			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版时间";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_publishtime' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['publishtime'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>ISDN";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_ISDN' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['ISDN'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书籍类型";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_booktype' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['booktype'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书籍简介";
			$info_modify=$info_modify.""."</label><textarea name='bookbuy_summary' rows='5' class='form-control'>";
			$info_modify=$info_modify."".$row['summary'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$_SESSION['ori_identifier']=$p;
			
		}
 		$_SESSION['bookbuy_modify']=$info_modify;
		
		if(1){
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>采购编号";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_identifier' rows='1' class='form-control' placeholder='请输入采购编号...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书名";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_bookname' rows='1' class='form-control' placeholder='请输入书名...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>版次";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_version' rows='1' class='form-control' placeholder='请输入版次...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>作者";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_writer' rows='1' class='form-control' placeholder='请输入作者...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_publisher' rows='1' class='form-control' placeholder='请输入出版社...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版时间";
			$info_insert=$info_insert.""."</label><i class='fa fa-user'></i>";
				
			$info_insert=$info_insert.""."<input type='datetime-local' step='01' name='bookbuy_publishtime' />";
			$info_insert=$info_insert.""."</div></div></div>";
				
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>ISDN";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_ISDN' rows='1' class='form-control' placeholder='请输入ISDN号...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书籍类型";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_booktype' rows='1' class='form-control' placeholder='请输入书籍类型...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
				
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书籍简介";
			$info_insert=$info_insert.""."</label><textarea name='bookbuy_summary' rows='5' class='form-control' placeholder='请输入书籍简介信息...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
		}
 		$_SESSION['bookbuy_insert']=$info_insert;
	}
	echo '<script>window.location="ModifyBookBuy.html";</script>';
	

?>