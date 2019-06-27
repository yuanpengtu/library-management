<?php
	

	@$p = $_GET['p']?$_GET['p']:"1652262";
	$out_ManagerAll="";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from borrowbook_view where cardnumber='$p'";
	$result_borrow = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result_borrow);
	for($i=1;$i<=$num;$i++){
		
		
		
		
		
		$row_borrow=mysqli_fetch_assoc($result_borrow);

		
		$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
		$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
		$out_ManagerAll=$out_ManagerAll."".($i%33);
		$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
		$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>馆藏地：";
				
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['storeplace'];//date("Y-m-d");;
		$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['bookname'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>书号：</a><p class='desc'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['booknumber'];
		$out_ManagerAll=$out_ManagerAll.""."</p><a>出版社：</a><p class='desc_publisher'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['publisher'];
		
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>出版日期：</a><p class='desc_publishtime'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['publishtime'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>作者：</a><p class='desc_writer'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['writer'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>摘要：</a><p class='desc_summary'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['summary'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>借阅日期：</a><p class='like'>";
		$out_ManagerAll=$out_ManagerAll."".$row_borrow['borrowtime'];
		

		
		
		
		$return_date=$row_borrow['borrowtime'].""." +30 days";
		$return_date=date("Y-m-d h:m:s",strtotime($return_date));
		$out_ManagerAll=$out_ManagerAll.""."</p><a>应还日期：</a><p class='like'>";
		$out_ManagerAll=$out_ManagerAll."".$return_date;
		
		
		$out_ManagerAll=$out_ManagerAll.""."</p></td></tr>";
	}
	
	
	$_SESSION['out_UserBorrowList']=$out_ManagerAll;


	echo '<script>window.location="UserBorrowList.html";</script>';
?>