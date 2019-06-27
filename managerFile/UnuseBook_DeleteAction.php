<?php
	@$p = $_GET['p']?$_GET['p']:"1";
	
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from book_out where booknumber = '$p'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);
	if($num){
		$booknumber=$row['booknumber'];
		$bookname=$row['bookname'];
		$publisher=$row['publisher'];
		$publishtime=$row['publishtime'];
		$writer=$row['writer'];
		$summary=$row['summary'];
		$ISDN=$row['ISDN'];
		$booktype=$row['booktype'];
		$version=$row['version'];
		$storeplace=$row['storeplace'];
		$cometime=$row['cometime'];
		$borrowflag=0;
		$price=$row['Price'];
		$sqli="insert into book(booknumber,bookname,publisher,publishtime,writer,summary,ISDN,booktype,version,storeplace,cometime,borrowflag,Price) values('$booknumber','$bookname','$publisher','$publishtime','$writer','$summary','$ISDN','$booktype','$version','$storeplace','$cometime','$borrowflag','$price')";
		$resulti = mysqli_query($con,$sqli);
	}
	echo '<script>window.location="UnuseBook.html";</script>';
?>