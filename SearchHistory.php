<?php
	$cardnumber=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "SELECT * FROM searchhistory where cardnumber='$cardnumber'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$out="";
	for($i=1;$i<=$num;$i++){
		$row=mysqli_fetch_assoc($result);
		$out=$out.""."<tr><td>";
		$out=$out."".$i;
		$out=$out.""."</td><td>";
		$out=$out."".$row['word'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['time'];
		$out=$out.""."</td><td>";
		$out=$out."".$row['ip'];
		$out=$out.""."</tr>";
	}
	$_SESSION['searchhistory_table']=$out;
	echo '<script>window.location="SearchHistory.html";</script>';
?>