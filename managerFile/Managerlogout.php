<?php
	session_destroy();
	unset($_SESSION['managername']);
	unset($_SESSION['manager_cardnumber']);
	unset($_SESSION['managerlogin_password']);
	echo "<script>window.close();window.open('../managerlogin.html');</script>";
?>