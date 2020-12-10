<?php
session_start();
unset($_SESSION['pegawai']);
header("location:../index.php");
?>