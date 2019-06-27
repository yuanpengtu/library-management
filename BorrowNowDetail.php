<?php
	@$p = $_GET['p']?$_GET['p']:1;
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "SELECT * FROM borrowbook_view where id='$p'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	
	$out_BorrowDetail="";
	if($num){
		$row=mysqli_fetch_assoc($result);
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td style='width:50px;'><span class='round round-danger'>B</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."书籍编号";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."booknumber";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail."".$row['booknumber'];
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td><span class='round'>N</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."书名";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."bookname";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail."".$row['bookname'];
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td><span class='round round-danger'>P</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."出版社";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."publisher";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail."".$row['publisher'];
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td><span class='round round-success'>W</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."作者";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."writer";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail."".$row['writer'];
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td><span class='round round-warning'>T</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."借阅时间";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."borrowtime";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail."".$row['borrowtime'];
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		$out_BorrowDetail=$out_BorrowDetail.""."<tr><td><span class='round round-primary'>S</span></td><td><h6>";
		$out_BorrowDetail=$out_BorrowDetail.""."状态";
		$out_BorrowDetail=$out_BorrowDetail.""."</h6><small class='text-muted'>";
		$out_BorrowDetail=$out_BorrowDetail.""."status";
		$out_BorrowDetail=$out_BorrowDetail.""."</small></td><td>";
		$out_BorrowDetail=$out_BorrowDetail.""."生效中";
		$out_BorrowDetail=$out_BorrowDetail.""."</td></tr>";
		
		
		
		$out_BorrowDetail=$out_BorrowDetail.""."</tbody></table><div class='col-md-6 col-4 align-self-center'>";
		$out_BorrowDetail=$out_BorrowDetail.""."<a href='ReturnBook.php?p=";
		$out_BorrowDetail=$out_BorrowDetail."".$row['id'];
		$out_BorrowDetail=$out_BorrowDetail.""."' class='btn pull-right hidden-sm-down btn-success'>还书</a></div>";
		$_SESSION['$out_BorrowDetail']=$out_BorrowDetail;
		echo '<script>window.location="BorrowNowDetail.html";</script>';
	}
	else{
		echo "<script>alert('查询出错...！o(╯□╰)o');history.go(-1);</script>";
	}

?>