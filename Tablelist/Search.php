<?php
//error_reporting(0);
function foo($arg_1)
{
	$search_result="";

	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql=$arg_1;
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	if($num){
	for($i=0;$i<$num;$i++){
		$row=mysqli_fetch_array($result);
		$search_result=$search_result.""."<div class='book-item bg-light'>";
		$search_result=$search_result.""."<div class='card'>";
		$search_result=$search_result.""."<div class='card-body'>";
		$search_result=$search_result.""."<h4 class='card-title'><a href='BookDetail.php?p=";
		$search_result=$search_result."".$row['ISDN'];
		$search_result=$search_result.""."'>";
		$search_result=$search_result."".$row['bookname'];
		$search_result=$search_result.""." 第";
		$search_result=$search_result."".$row['version'];
		$search_result=$search_result.""."版</a></h4><ul class='list-inline book-meta' style='margin-top: 10px;'>";
		$search_result=$search_result.""."<li class='list-inline-item' >";
		$search_result=$search_result.""."<a href='' style='font-size: 14px;font-weight: bold;'><i class='fa fa-at' ></i>";
		$search_result=$search_result."".$row['writer'];
		$search_result=$search_result.""."编著";
		$search_result=$search_result.""."</a></li><li class='list-inline-item'>";
		$search_result=$search_result.""."<a href='' style='font-size: 14px'><i class='fa fa-group' ></i>";
		$search_result=$search_result."".$row['publisher'];
		$search_result=$search_result.""."</a></li></ul><div class='bookstate'>";
		$tmp=$row['bookname'];
		$tmp_ver=$row['version'];
		$sql_detail="select * from avaliablebook_view where bookname='$tmp' and version='$tmp_ver'";
		$result_detail = mysqli_query($con,$sql_detail);
		$num_detail = mysqli_num_rows($result_detail);
		if($num_detail>0){
			$search_result=$search_result.""."<i class='fa icon-state-good'>可借</i></div>";
		}
		else{
			$search_result=$search_result.""."<i class='fa icon-state-bad'>暂无</i></div>";
		}
 		$search_result=$search_result.""."<div class='booknumber'>";
 		$search_result=$search_result.""."<i>";
 		$search_result=$search_result."".$row['ISDN'];
 		$search_result=$search_result.""."</i></div></div></div>";
 		$search_result=$search_result.""."<div class='card-extra'><div class='card-body'>";
 		$search_result=$search_result.""."<h5 class='card-title'><a href=''>馆藏信息</a></h5><table class='table save-info'><thead>";
 		$search_result=$search_result.""."<tr><td>ISDN</td><td>书号</td><td>年卷期</td><td>馆藏地</td><td>状态</td></tr></thead><tbody>";
		for($j=0;$j<$num_detail;$j++){
			$row_detail=mysqli_fetch_array($result_detail);
			$search_result=$search_result.""."<tr><td>";
			$search_result=$search_result."".$row_detail['ISDN'];
			$search_result=$search_result.""."</td><td>";
			$search_result=$search_result."".$row_detail['booknumber'];
			$search_result=$search_result.""."</td><td>";
			$timestrap=strtotime($row_detail['publishtime']);
			$search_result=$search_result."".date('y',$timestrap);
			$search_result=$search_result."".".";
			$search_result=$search_result."".date('m',$timestrap);
			$search_result=$search_result.""."</td><td>";
			$search_result=$search_result."".$row_detail['storeplace'];
			$search_result=$search_result.""."</td><td class='info-available'>可借</td></tr>";
		}
		$sql_detail_no="select * from borrowbook_view where bookname='$tmp'  and version='$tmp_ver'";
		$result_detail_no = mysqli_query($con,$sql_detail_no);
		$num_detail_no = mysqli_num_rows($result_detail_no);
		for($j=0;$j<$num_detail_no;$j++){
			$row_detail_no=mysqli_fetch_array($result_detail_no);
			$search_result=$search_result.""."<tr><td>";
			$search_result=$search_result."".$row_detail_no['ISDN'];
			$search_result=$search_result.""."</td><td>";
			$search_result=$search_result."".$row_detail_no['booknumber'];
			$search_result=$search_result.""."</td><td>";
			$timestrap=strtotime($row_detail_no['publishtime']);
			$search_result=$search_result."".date('y',$timestrap);
			$search_result=$search_result."".".";
			$search_result=$search_result."".date('m',$timestrap);
			$search_result=$search_result.""."</td><td>";
			$search_result=$search_result."".$row_detail_no['storeplace'];
			$search_result=$search_result.""."</td><td class='info-none'>已借出</td></tr>";
		}
		$search_result=$search_result.""."</tbody></table></div></div></div>";
		//$search_result=$search_result.""."</div></div>";
		}
	  
	}
	return $search_result;
}

	$search_tmp="搜索";
	if($_GET['p']){
		$searchtype=6;
		$searchsame=3;
	}
	else{
		$searchtype=$_POST['searchtype'];
		$searchsame=$_POST['searchtype_second'];
	}
	
	
	$keyword=$_POST['keyword'];
	$search_result="";
	$out="";
	if($searchtype==3){
		$search_tmp=$search_tmp.""."出版社 ";
		if($searchsame==3){
			$sql_arg="select distinct bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publisher like '$keyword%'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publisher='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publisher REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	else if($searchtype==1){
		$search_tmp=$search_tmp.""."作者 ";
		if($searchsame==3){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where writer REGEXP '^$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where writer='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where writer REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	else if($searchtype==2){
		$search_tmp=$search_tmp.""."出版日期 ";
		if($searchsame==3){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publishtime like '$keyword%'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publishtime='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where publishtime REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	else if($searchtype==4){
		$search_tmp=$search_tmp.""."内容摘要 ";
		if($searchsame==3){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where summary REGEXP '^$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where summary='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where summary REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	else if($searchtype==5){
		$search_tmp=$search_tmp.""."书号 ";
		if($searchsame==3){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where booknumber like '$keyword%'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where booknumber='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where booknumber REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	else if($searchtype==6){
		$search_tmp=$search_tmp.""."题名 ";
		if($searchsame==3){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where bookname like '$keyword%'";
			$out=foo($sql_arg);
		}
		else if($searchsame==2){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where bookname='$keyword'";
			$out=foo($sql_arg);
		}
		else if($searchsame==1){
			$sql_arg="select DISTINCT bookname,ISDN,writer,publisher,version,publishtime,storeplace from book where bookname REGEXP '$keyword'";
			$out=foo($sql_arg);
		}
	}
	if($searchsame==3){
		$search_tmp=$search_tmp.""."前方一致=‘";
	}
	else if($searchsame==2){
		$search_tmp=$search_tmp.""."完全一致=‘";
	}
	else if($searchsame==1){
		$search_tmp=$search_tmp.""."任意匹配=‘";
	}
	$search_tmp=$search_tmp."".$keyword;
	$search_tmp=$search_tmp.""."’的结果：";
	$_SESSION['keyword']=$search_tmp;
	$_SESSION['search_result']=$out;
	
	
	
    if($_SESSION['username']!=NULL){
    	$con=mysqli_connect("localhost","root","");
    	mysqli_select_db($con,"homework");
    	mysqli_query($con,"set names 'utf8'");
    	$time=date('Y-m-d h:i:s', time());
    	$card=$_SESSION['cardnumber'];
    	
    	$sql_all="select * from searchhistory";
    	$result_all = mysqli_query($con,$sql_all);
    	$num_all=mysqli_num_rows($result_all);
    	$num_all++;
		$sql_history="insert into searchhistory(time,cardnumber,word,id,ip) values('$time','$card','$keyword','$num_all','192.168.80.230')";
		$result_history = mysqli_query($con,$sql_history);
	}
	echo '<script>window.location="search-result.html";</script>';
?>