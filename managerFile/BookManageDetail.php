<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book where booknumber = '$p'";
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
			
			
			$info_delete=$info_delete.""."<tr><td>书籍类别</td><td>";
			$info_delete=$info_delete."".$row['booktype'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>版次</td><td>第";
			$info_delete=$info_delete."".$row['version'];
			$info_delete=$info_delete.""."版</td></tr>";
			$info_delete=$info_delete.""."<tr><td>馆藏地</td><td>";
			$info_delete=$info_delete."".$row['storeplace'];
			$info_delete=$info_delete.""."</td></tr>";

			$info_delete=$info_delete.""."<tr><td>入馆时间</td><td>";
			$info_delete=$info_delete."".$row['cometime'];
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>是否可借</td><td>";
			if($row['borrowflag']=='0'){
				$info_delete=$info_delete.""."可借";
			}
			else{
				$info_delete=$info_delete.""."不可借";
			}
			$info_delete=$info_delete.""."</td></tr>";
			$info_delete=$info_delete.""."<tr><td>定价</td><td>";
			$info_delete=$info_delete."".$row['Price'];
			$info_delete=$info_delete.""."元</td></tr>";
			
			
			$info_delete=$info_delete.""."<tr><td>总书目数</td><td>";
			
			
			$temp_ISDN=$row['ISDN'];
			$sql_all="select * from book where ISDN='$temp_ISDN'";
			$result_all=mysqli_query($con, $sql_all);
			$num_all=mysqli_num_rows($result_all);
			$avaliable_book=0;
			for($i=0;$i<$num_all;$i++){
				$row=mysqli_fetch_assoc($result_all);
				$booknumber_all=$row['booknumber'];
				$sql_borrow="select * from borrow_now where booknumber='$booknumber_all'";
				$result_borrow=mysqli_query($con, $sql_borrow);
				$num_borrow=mysqli_num_rows($result_borrow);
				if($num_borrow==0){
					$avaliable_book++;
				}
			}
			
			
			
			$info_delete=$info_delete."".$num_all;
			$info_delete=$info_delete.""."本</td></tr>";
			$info_delete=$info_delete.""."<tr><td>相同书目可借数</td><td>";
			$info_delete=$info_delete."".$avaliable_book;
			$info_delete=$info_delete.""."本</td></tr>";
			
			$info_delete=$info_delete.""."<tr><td>是否报废</td><td><a href='Book_UnuseAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete.""."'>";
			$info_delete=$info_delete.""."点击报废</a>";
			$info_delete=$info_delete.""."</td></tr>";
			
			
			$info_delete=$info_delete.""."<tr><td>状态</td><td><span class='label label-sm label-success'>Approved</span></td></tr></tbody></table></div></div>";
			$info_delete=$info_delete.""."<form action='Book_DeleteAction.php?p=";
			$info_delete=$info_delete."".$p;
			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
			$info_delete=$info_delete.""."<div class='form-group'>";
			$info_delete=$info_delete.""."<label for='inputPassword' class='col-md-3 control-label'>请输入密码：</label>";
			$info_delete=$info_delete.""."<div class='col-md-9'><div class='input-icon right'><i class='fa fa-lock'></i>";
			$info_delete=$info_delete.""."<input id='inputPassword' type='text' placeholder='请输入登录密码...' class='form-control' /></div></div></div>";
			$info_delete=$info_delete.""."<div class='form-actions pal'><div class='form-group mbn'><div class='col-md-offset-3 col-md-6'>";
			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>确认删除</button></div></div></div></form>";
			
			
// 			$info_delete=$info_delete.""."<form action='Book_UnuseAction.php?p=";
// 			$info_delete=$info_delete."".$p;
// 			$info_delete=$info_delete."' class='form-horizontal' method='post'>";
// 			$info_delete=$info_delete.""."<button type='submit' class='btn btn-primary'>加入报废</button></form>";
		}
		
		$_SESSION['Bookinfo_delete']=$info_delete;
		
		
		
		if(1){


			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书号";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='booknumber' rows='1' class='form-control' readonly>";
			$info_modify=$info_modify."".$row['booknumber'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书名";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='bookname' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['bookname'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版社";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='publisher' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['publisher'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>出版时间";
			$info_modify=$info_modify.""."</label><i class='fa fa-user'></i>";
			
			$info_modify=$info_modify.""."<input type='datetime-local' step='01' name='publishtime' />";
			$info_modify=$info_modify.""."</div></div></div>";
			

			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>作者";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='writer' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['writer'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>简介";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='summary' rows='5' class='form-control'>";
			$info_modify=$info_modify."".$row['summary'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			

			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>ISDN";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='ISDN' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['ISDN'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>书籍类型";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='booktype' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['booktype'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>版次";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='version' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['version'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>馆藏地";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='storeplace' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['storeplace'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			$info_modify=$info_modify.""."<div class='form-body pal'>";
			$info_modify=$info_modify.""."<div class='form-group'>";
			$info_modify=$info_modify.""."<div class='input-icon right'>";
			$info_modify=$info_modify.""."<label for='inputMessage' class='control-label'>定价";
			$info_modify=$info_modify.""."</label><textarea style='overflow:hidden;' name='Price' rows='1' class='form-control'>";
			$info_modify=$info_modify."".$row['Price'];
			$info_modify=$info_modify.""."</textarea>";
			$info_modify=$info_modify.""."</div></div></div>";
			
			
			
			$_SESSION['BookModifyEnsure_info']=$p;
			
		}
 		$_SESSION['Bookinfo_modify']=$info_modify;
		
		if(1){
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书号";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='booknumber' rows='1' class='form-control' placeholder='请输入书号...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书名";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='bookname' rows='1' class='form-control' placeholder='请输入书名...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版社";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='publisher' rows='1' class='form-control' placeholder='请输入出版社...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>出版时间";
			$info_insert=$info_insert.""."</label><i class='fa fa-user'></i>";
			
			$info_insert=$info_insert.""."<input type='datetime-local' step='01' name='publishtime' />";
			$info_insert=$info_insert.""."</div></div></div>";
			

			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>作者";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='writer' rows='1' class='form-control' placeholder='请输入作者...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>简介";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='summary' rows='5' class='form-control' placeholder='请输入简介...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			

			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>ISDN";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='ISDN' rows='1' class='form-control' placeholder='请输入ISDN号...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>书籍类型";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='booktype' rows='1' class='form-control' placeholder='请输入书籍类型...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>版次";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='version' rows='1' class='form-control' placeholder='请输入版次...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>馆藏地";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='storeplace' rows='1' class='form-control' placeholder='请输入馆藏地...'>";
			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
			$info_insert=$info_insert.""."<div class='form-body pal'>";
			$info_insert=$info_insert.""."<div class='form-group'>";
			$info_insert=$info_insert.""."<div class='input-icon right'>";
			$info_insert=$info_insert.""."<label for='inputMessage' class='control-label'>定价";
			$info_insert=$info_insert.""."</label><textarea style='overflow:hidden;' name='Price' rows='1' class='form-control' placeholder='请输入定价...'>";

			$info_insert=$info_insert.""."</textarea>";
			$info_insert=$info_insert.""."</div></div></div>";
			
		}
 		$_SESSION['Bookinfo_insert']=$info_insert;
	}
	echo '<script>window.location="BookManageDetail.html";</script>';
	

?>