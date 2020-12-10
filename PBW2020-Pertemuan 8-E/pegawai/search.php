<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/font-awesome.min.css" rel="stylesheet">
	<link href="../css/datepicker3.css" rel="stylesheet">
	<link href="../css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Mahasiswa</div>
				<div class="panel-body">
			
<?php
session_start();
if (!isset($_SESSION['pegawai']) && $_SESSION['role']!='admin'){
	header("location:../login.php");}
	else {
		include("../koneksi.php");
	}
if (isset($_POST['submit'])){
	$nim  = $_POST['nim'];	
	
	$q = 'SELECT * FROM mahasiswa WHERE nim="'.$nim.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error($koneksi));
	$n = mysqli_num_rows($p);
	if($n !=0){
		while($d=mysqli_fetch_array($p))
		{
			$id			= $d['nim'];
			$nama		= $d['nama'];
			$alamat		= $d['alamat'];
			$up		    = $d['up_by'];
			
			echo'
			<form role="form">
				<fieldset>
				<div class="form-group">
				<label>NIM</label>
                	<input class="form-control" name="username" type="text" disabled="" name="nim" value="'.$id.'">
				</div>
                <div class="form-group">
				<label>Nama</label>
                	<input class="form-control" name="username" type="text" disabled="" name="nim" value="'.$nama.'">
				</div>
				<div class="form-group">
				<label>NIM</label>
					<textarea class="form-control" name="alamat" disabled="">'.$alamat.'</textarea>
				</div>                
           		<div class="form-group">
				<label>Uploaded By</label>
                	<input class="form-control" name="username" type="text" disabled="" name="nim" value="'.$up.'">
				</div>';
		}
	}
}
?>
			<div class="form-group">
				<a href="index_p.php">BACK</a>
            </div>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
