<?php
	$s = "localhost";
	$u = "root";
	$p = "";
	$db= "db_kp";

	$dbcon=mysqli_connect($s,$u,$p,$db);

	if (!$dbcon) {
		die("Gagal ke DataBase : ".mysqli_connect_error());
	}else{
		//echo"TERHUBUNG";
	}
?>