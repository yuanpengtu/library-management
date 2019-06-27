<?php

	$cardnum=$_SESSION['cardnumber'];
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"homework");
	mysqli_query($con,"set names 'utf8'");
	$sql = "select * from chargehistory where usernumber = '$cardnum'";
	$result = mysqli_query($con,$sql);
	$num = mysqli_num_rows($result);
	$out="";
	$out_current="";
	$out_history="";
	for($i=0;$i<$num;$i++){
		$row=mysqli_fetch_assoc($result);
		

		$out=$out.""."<a href='#' class='list-group-item'>";
		$out=$out.""."<input type='checkbox' name='checkbox[]' value='";
		$out=$out."".$row['id'];
		$out=$out.""."'/><span class='fa fa-star-o mrm mlm'></span><span style='min-width: 120px; display: inline-block;' class='name'>";
		$out=$out."".$row['chargemoney'];
		$out=$out.""."</span><span>";
		$out=$out."".$row['chargetime'];
		$out=$out.""."</span>&nbsp; - &nbsp;<span style='font-size: 11px;' class='text-muted'>";
		if($row['dealflag']=='1'){
			$out=$out.""."已处理";
		}
		else{
			$out=$out.""."未处理";
		}
		$out=$out.""."</span><span class='time-badge'>";
		if($row['chargetype']=='1'){
			$out=$out.""."遗失罚款";
		}
		else{
			$out=$out.""."超期罚款";
		}
		$out=$out.""."</span><span class='pull-right mrl'><span class='fa fa-paperclip'></span></span></a>";
		
		if($row['dealflag']=='0'){
			$out_current=$out_current.""."<a href='#' class='list-group-item'>";
			$out_current=$out_current.""."<input type='checkbox' name='checkbox[]' value='";
			$out_current=$out_current."".$row['id'];
			$out_current=$out_current.""."'/><span class='fa fa-star-o mrm mlm'></span><span style='min-width: 120px; display: inline-block;' class='name'>";
			$out_current=$out_current."".$row['chargemoney'];
			$out_current=$out_current.""."</span><span>";
			$out_current=$out_current."".$row['chargetime'];
			$out_current=$out_current.""."</span>&nbsp; - &nbsp;<span style='font-size: 11px;' class='text-muted'>";
			if($row['dealflag']=='1'){
				$out_current=$out_current.""."已处理";
			}
			else{
				$out_current=$out_current.""."未处理";
			}
			$out_current=$out_current.""."</span><span class='time-badge'>";
			if($row['chargetype']=='1'){
				$out_current=$out_current.""."遗失罚款";
			}
			else{
				$out_current=$out_current.""."超期罚款";
			}
			$out_current=$out_current.""."</span><span class='pull-right mrl'><span class='fa fa-paperclip'></span></span></a>";
		}
		else if($row['dealflag']=='1'){
			$out_history=$out_history.""."<a href='#' class='list-group-item'>";
			$out_history=$out_history.""."<input type='checkbox' name='checkbox[]' value='";
			$out_history=$out_history."".$row['id'];
			$out_history=$out_history.""."'/><span class='fa fa-star-o mrm mlm'></span><span style='min-width: 120px; display: inline-block;' class='name'>";
			$out_history=$out_history."".$row['chargemoney'];
			$out_history=$out_history.""."</span><span>";
			$out_history=$out_history."".$row['chargetime'];
			$out_history=$out_history.""."</span>&nbsp; - &nbsp;<span style='font-size: 11px;' class='text-muted'>";
			if($row['dealflag']=='1'){
				$out_history=$out_history.""."已处理";
			}
			else{
				$out_history=$out_history.""."未处理";
			}
			$out_history=$out_history.""."</span><span class='time-badge'>";
			if($row['chargetype']=='1'){
				$out_history=$out_history.""."遗失罚款";
			}
			else{
				$out_history=$out_history.""."超期罚款";
			}
			$out_history=$out_history.""."</span><span class='pull-right mrl'><span class='fa fa-paperclip'></span></span></a>";
		}
	
	}
	$_SESSION['charge_ALL']=$out;
	$_SESSION['charge_current']=$out_current;
	$_SESSION['charge_history']=$out_history;
	echo '<script>window.location="MoneyPay.html";</script>';
// <a href="#" class="list-group-item"><input type="checkbox" name="checkbox[]" value="11"/><span class="fa fa-star-o mrm mlm"></span><span
// style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde
 // </span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit ...</span><span class="time-badge">12:10 AM</span><span class="pull-right mrl"><span
// </span><span class="time-badge">12:10 AM</span><span class="pull-right mrl"><span class="fa fa-paperclip"></span></span></a>


// <a href="#" class="list-group-item"><input type="checkbox"/><span class="fa fa-star-o mrm mlm"></span><span style="min-width: 120px; display: inline-block;" class="name">Bhaumik Patel</span><span>Sed ut perspiciatis unde</span>&nbsp; - &nbsp;<span style="font-size: 11px;" class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit</span><span
// class="time-badge">12:10 AM</span><span class="pull-right mrl"><span class="fa fa-paperclip"></span></span></a>
?>
