<?php
	


	$out_ManagerAll="";
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from borrowbook_view";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	for($i=1;$i<=$num;$i++){
		
		$row=mysqli_fetch_assoc($result);
		$out_ManagerAll=$out_ManagerAll.""."<tr class='tbl-item'>";
		$out_ManagerAll=$out_ManagerAll.""."<td class='img'><img src='images/icon_filter/";
		$out_ManagerAll=$out_ManagerAll."".($i%33);
		$out_ManagerAll=$out_ManagerAll.".jpg' alt='' title=''/></td>";
		$out_ManagerAll=$out_ManagerAll.""."<td class='td-block'><p class='date'>id：";
				
		$out_ManagerAll=$out_ManagerAll."".$row['id'];//date("Y-m-d");;
		$out_ManagerAll=$out_ManagerAll.""."</p><p class='title'>";
		
		
		$booknumber=$row['booknumber'];
		$sql_book = "select * from book where booknumber='$booknumber'";
		$result_book = mysqli_query($con,$sql_book);
		$row_book=mysqli_fetch_assoc($result_book);
		$out_ManagerAll=$out_ManagerAll."".$row_book['bookname'];
		
		

		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>书籍编号：</a><p class='desc'>";
		$out_ManagerAll=$out_ManagerAll."".$row['booknumber'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>借阅人：</a><p class='desc_writer'>";
		$out_ManagerAll=$out_ManagerAll."".$row['cardnumber'];
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>借阅日期：</a><p class='desc_publisher'>";
		$out_ManagerAll=$out_ManagerAll."".$row['borrowtime'];
		
		
		$out_ManagerAll=$out_ManagerAll.""."</p><a>应还日期：</a><p class='desc_publishtime'>";
		
		
		$return_date=$row['borrowtime'].""." +30 days";
		$return_date=date("Y-m-d h:m:s",strtotime($return_date));
		$out_ManagerAll=$out_ManagerAll."".$return_date;
		

		
		
		
		$out_ManagerAll=$out_ManagerAll.""."</p>";
		$out_ManagerAll=$out_ManagerAll.""."</td></tr>";
	}
	
	
	$_SESSION['out_BorrowNow']=$out_ManagerAll;


	echo '<script>window.location="BorrowNow.html";</script>';
?>