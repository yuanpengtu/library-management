<?php
	$cardnumber=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "SELECT * FROM recommendbuy where cardnumber='$cardnumber'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$out="";
	for($i=1;$i<=$num;$i++){
		$row=mysqli_fetch_assoc($result);
		$out=$out.""."<tr><td>";
		$out=$out."".$i;
		$out=$out.""."</td><td>";
		$out=$out."".$row['bookname'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['writer'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['publisher'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['booktype'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['ISDN'];
		
		$out=$out.""."</td><td><a href='recommenddelete.php?p=";
		$out=$out."".$row['id'];
		$out=$out.""."'>";
		$out=$out.""."删除";
		$out=$out.""."</tr>";
	}
	$_SESSION['recommendbuy_table']=$out;
	echo '<script>window.location="RecommendBuy.html";</script>';
?>