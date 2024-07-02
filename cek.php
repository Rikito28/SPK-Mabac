<?php
	session_start();
	if ($_SESSION['stat']!='masuk') {
		echo "<script>alert('ANDA BELUM LOGIN')</script>";
		header("location:login.php?id=out");
	}

?>