<?php
	session_destroy();
	unset($_SESSION['username']);
	unset($_SESSION['cardnumber']);
	echo "<script>window.close();window.open('login.html');</script>";
?>