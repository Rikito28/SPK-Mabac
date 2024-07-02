<?php
session_start();
echo "<script>alert('ANDA TELAH LOG OUT')</script>";
session_destroy();
header("location:login.php");
?>