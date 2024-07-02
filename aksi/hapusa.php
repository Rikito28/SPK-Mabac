<?php
	session_start();
	include '../onek.php';

	if (isset($_GET['name'])) {
		
		$penghuni = $_GET['name'];
		mysqli_query($dbcon,"DELETE FROM penghuni WHERE kode_penghuni = '$penghuni'");
		mysqli_query($dbcon,"DELETE FROM penilaian WHERE kode_penghuni='$penghuni'");
		echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
		header("location:../alternatif.php");

	}else{
		echo "<h1>NGAPAIN WOI</h1>";
	}

?>