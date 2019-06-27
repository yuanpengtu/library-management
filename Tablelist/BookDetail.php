<?php
	@$p = $_GET['p']?$_GET['p']:1;
	if($p==1){
		$p=$_SESSION['comment_ISDN']?$_SESSION['comment_ISDN']:1;
	}
	$ISDN_GET=$p;
	unset($_SESSION['comment_ISDN']);
	
	
	$out_detail="";
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql="select distinct bookname,writer,publisher,booktype,summary,ISDN,publishtime from book where ISDN='$ISDN_GET'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	
	$out_detail=$out_detail.""."<h4>";
	$out_detail=$out_detail."".$row['bookname'];
	$out_detail=$out_detail.""."</h4><table class='table table-detail'><tr><td class='detail-left'>责任者</td>";
	$out_detail=$out_detail.""."<td>";
	$out_detail=$out_detail."".$row['writer'];
	$out_detail=$out_detail.""."著</td></tr><tr><td class='detail-left'>出版发行项</td><td>";
	$out_detail=$out_detail."".$row['publisher'];
	$out_detail=$out_detail."".",20";
	$timestrap=strtotime($row['publishtime']);
	$out_detail=$out_detail."".date('y',$timestrap);
	$out_detail=$out_detail.""."</td></tr><tr>";
	$out_detail=$out_detail.""."<td>ISDN号</td>";
	$out_detail=$out_detail.""."<td>";
	$out_detail=$out_detail."".$ISDN_GET;
	$out_detail=$out_detail.""."</td></tr><tr>";
	$out_detail=$out_detail.""."<td>学科主题</td>";
	$out_detail=$out_detail.""."<td>";
	$out_detail=$out_detail."".$row['booktype'];
	$out_detail=$out_detail.""."</td></tr><tr>";
	$out_detail=$out_detail.""."<td>提要文摘附注</td>";
	$out_detail=$out_detail.""."<td>";
	$out_detail=$out_detail."".$row['summary'];
	$out_detail=$out_detail.""."</td></tr></table>";

	$_SESSION['detail_html']=$out_detail;
	
	
	
	
	$out_bookall="";
	$sql_detail="select * from avaliablebook_view where ISDN='$ISDN_GET'";
	$result_detail = mysqli_query($con,$sql_detail);
	$num_detail = mysqli_num_rows($result_detail);
	for($j=0;$j<$num_detail;$j++){
		$row_detail=mysqli_fetch_array($result_detail);
		
		$out_bookall=$out_bookall.""."<tr><td>";
		$out_bookall=$out_bookall."".$row_detail['ISDN'];
		$out_bookall=$out_bookall.""."</td><td>";
		$out_bookall=$out_bookall."".$row_detail['booknumber'];
		$out_bookall=$out_bookall.""."</td><td>";
		$timestrap=strtotime($row_detail['publishtime']);
		$out_bookall=$out_bookall."".date('y',$timestrap);
		$out_bookall=$out_bookall."".".";
		$out_bookall=$out_bookall."".date('m',$timestrap);
		$out_bookall=$out_bookall.""."</td><td>";
		$out_bookall=$out_bookall."".$row_detail['storeplace'];
		$out_bookall=$out_bookall.""."</td><td class='info-available'>";
		$out_bookall=$out_bookall.""."<a class='info-available' href='BorrowBook.php?p=";
		$out_bookall=$out_bookall."".$row_detail['booknumber'];
		$out_bookall=$out_bookall.""."'>可借</a></td></tr>";
	}

	
	$sql_detail_no="select * from borrowbook_view where ISDN='$ISDN_GET'";
	$result_detail_no = mysqli_query($con,$sql_detail_no);
	$num_detail_no = mysqli_num_rows($result_detail_no);
	for($j=0;$j<$num_detail_no;$j++){
		$row_detail_no=mysqli_fetch_array($result_detail_no);
		$out_bookall=$out_bookall.""."<tr><td>";
		$out_bookall=$out_bookall."".$row_detail_no['ISDN'];
		$out_bookall=$out_bookall.""."</td><td>";
		$out_bookall=$out_bookall."".$row_detail_no['booknumber'];
		$out_bookall=$out_bookall.""."</td><td>";
		$timestrap=strtotime($row_detail_no['publishtime']);
		$out_bookall=$out_bookall."".date('y',$timestrap);
		$out_bookall=$out_bookall."".".";
		$out_bookall=$out_bookall."".date('m',$timestrap);
		$out_bookall=$out_bookall.""."</td><td>";
		$out_bookall=$out_bookall."".$row_detail_no['storeplace'];
		$out_bookall=$out_bookall.""."</td><td class='info-none'>";
		$out_bookall=$out_bookall.""."已借出</td></tr>";
	}
	$_SESSION['detail_html_all']=$out_bookall;

	$out_bookchart="";
	$out_bookchart=$out_bookchart.""."<script>var ctx = document.getElementById('myChart').getContext('2d');";
	$out_bookchart=$out_bookchart.""."var chart = new Chart(ctx, {";
	$out_bookchart=$out_bookchart.""."type: 'line',";
	$out_bookchart=$out_bookchart.""."data: {";
	$out_bookchart=$out_bookchart.""."labels: ['六月', '七月', '八月', '九月', '十月', '十一月', '十二月', '一月', '二月', '三月', '四月','五月'],";
	$out_bookchart=$out_bookchart.""."datasets: [{";
	$out_bookchart=$out_bookchart.""."label: '借阅趋势(过去一年)',";
	$out_bookchart=$out_bookchart.""."backgroundColor: 'rgb(251, 173, 76)',";
	$out_bookchart=$out_bookchart.""."borderColor: 'rgb(251, 173, 76)',";
	$out_bookchart=$out_bookchart.""."data: [";
	$sql_detail_6="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-6-1 00:00:00'  and '2018-7-1 00:00:00'";
	$sql_detail_7="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-7-1 00:00:00'  and '2018-8-1 00:00:00'";
	$sql_detail_8="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-8-1 00:00:00'  and '2018-9-1 00:00:00'";
	$sql_detail_9="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-9-1 00:00:00'  and '2018-10-1 00:00:00'";
	$sql_detail_10="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-10-1 00:00:00'  and '2018-11-1 00:00:00'";
	$sql_detail_11="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-11-1 00:00:00'  and '2018-12-1 00:00:00'";
	$sql_detail_12="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2018-12-1 00:00:00'  and '2019-1-1 00:00:00'";
	$sql_detail_1="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2019-1-1 00:00:00'  and '2019-2-1 00:00:00'";
	$sql_detail_2="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2019-2-1 00:00:00'  and '2019-3-1 00:00:00'";
	$sql_detail_3="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2019-3-1 00:00:00'  and '2019-4-1 00:00:00'";
	$sql_detail_4="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2019-4-1 00:00:00'  and '2019-5-1 00:00:00'";
	$sql_detail_5="select * from borrowhistory_view where ISDN='$ISDN_GET' and borrowtime between  '2019-5-1 00:00:00'  and '2019-6-1 00:00:00'";
	$result_detail = mysqli_query($con,$sql_detail_6);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_7);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_8);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_9);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_10);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_11);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_12);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_1);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_2);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_3);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_4);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart."".",";
	$result_detail = mysqli_query($con,$sql_detail_5);
	$num_detail = mysqli_num_rows($result_detail);
	$out_bookchart=$out_bookchart."".$num_detail;
	$out_bookchart=$out_bookchart.""."]";
	$out_bookchart=$out_bookchart.""."}]";
	$out_bookchart=$out_bookchart.""."},";
	$out_bookchart=$out_bookchart.""."options: {";
	$out_bookchart=$out_bookchart.""."scales: {";
	$out_bookchart=$out_bookchart.""."yAxes: [{";
	$out_bookchart=$out_bookchart.""."ticks: {";
	$out_bookchart=$out_bookchart.""."stepSize: 1";
	$out_bookchart=$out_bookchart.""."}";
	$out_bookchart=$out_bookchart.""."}]";
	$out_bookchart=$out_bookchart.""."}";
	$out_bookchart=$out_bookchart.""."}";
	$out_bookchart=$out_bookchart.""."});";
	$out_bookchart=$out_bookchart.""."</script>";
	
	$_SESSION['chart_book']=$out_bookchart;
	
	
	
	
	$sql_comment="select * from comment_view where ISDN='$ISDN_GET'";
	$result_comment = mysqli_query($con,$sql_comment);
	$num_comment = mysqli_num_rows($result_comment);
	$out_comment="";
	echo $num_comment;
	for($j=0;$j<$num_comment;$j++){
		$row_comment=mysqli_fetch_array($result_comment);
		$out_comment=$out_comment.""."<li class='gitment-comment'>";
		$out_comment=$out_comment.""."<a class='gitment-comment-avatar'>";
		$out_comment=$out_comment.""."<img class='gitment-comment-avatar-img' src='images/default.jpg'>";
		$out_comment=$out_comment.""."</a>";
		$out_comment=$out_comment.""."<div class='gitment-comment-main'>";
		$out_comment=$out_comment.""."<div class='gitment-comment-header'>";
		$out_comment=$out_comment.""."<a class='gitment-comment-name'>";
		$out_comment=$out_comment."".$row_comment['username'];
		$out_comment=$out_comment.""."</a><span>";
		$out_comment=$out_comment."".$row_comment['time'];
		$out_comment=$out_comment.""."</span>";
		$out_comment=$out_comment.""."<div class='gitment-comment-like-btn'>";
		$out_comment=$out_comment.""."<svg class='gitment-heart-icon' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 50 50'>";
		$out_comment=$out_comment.""."</svg>";
		$out_comment=$out_comment.""."</div></div><div class='gitment-comment-body gitment-markdown'><p>";
		$out_comment=$out_comment."".$row_comment['comment'];
		$out_comment=$out_comment.""."</p></div></div></li>";
	}
	
// 	<li class="gitment-comment">
// 	<a class="gitment-comment-avatar">
// 	<img class="gitment-comment-avatar-img" src="../images/default-avatar.png">
// 	</a>
// 	<div class="gitment-comment-main">
// 	<div class="gitment-comment-header">
// 	<a class="gitment-comment-name">
// 	张三
// 	</a>
// 	<span>2018.05.17</span>
	
// 	<div class="gitment-comment-like-btn">
// 	<svg class="gitment-heart-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
// 	<path d="M25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9 4.1 0 6.4 2.3 8 4.1 1.6-1.8 3.9-4.1 8-4.1 5 0 9 4 9 9 0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7 0 5.1 3.2 8.5 15 18.1 11.8-9.6 15-13 15-18.1 0-3.9-3.1-7-7-7-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z"></path>
// 	</svg>
// 	</div>
// 	</div>
// 	<div class="gitment-comment-body gitment-markdown"><p>评论的内容评论的内容评论的内容评论的内容评论的内容
// 	评论的内容评论的内容评论的内容评论的内容评论的内容评论的内容
// 	评论的内容评论的内容评论的内容评论的内容评论的内容评论的内容评论的内容
// 	评论的内容评论的内容评论的内容评论的内容</p></div>
// 	</div>
// 	</li>
	$_SESSION['comment_book']=$out_comment;
	$_SESSION['click_book_ISDN']=$ISDN_GET;
	echo '<script>window.location="book-detail.html";</script>';
?>
