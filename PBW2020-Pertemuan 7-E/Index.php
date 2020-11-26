<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Data Mahasiswa</title>
	<link rel="stylesheet" href="CSS/Style.css">
</head>

<body>
<?php
	include("koneksi.php");
?>
<div class="bgimg">
	<div id="container">
	<form method="post" enctype="multipart/form-data">
		<fieldset>
			<legend><h3>Data Mahasiswa</h3></legend>
		<div class="row">
		<div class="col-25"><label>Nama</label></div>
		<div class="col-75"><input type="text" name="nama" placeholder="Masukan Nama..."/></div>
			</div>
			
		<div class="row">
		<div class="col-25"><label>NIM</label></div>	
		<div class="col-75"><input type="text" name="nim" placeholder="Masukan NIM..."/></div>
			</div>
			
		<div class="row">
		<div class="col-25"><label>Nilai Tugas</label></div>	
		<div class="col-75"><input type="text" name="tugas" placeholder="Masukan Nilai Tugas..."/></div>
			</div>
			
		<div class="row">
		<div class="col-25"><label>Nilai UTS</label></div>	
		<div class="col-75"><input type="text" name="uts" placeholder="Masukan Nilai UTS..."/></div>
			</div>
			
		<div class="row">
		<div class="col-25"><label>Nilai UAS</label></div>	
		<div class="col-75"><input type="text" name="uas" placeholder="Masukan Nilai UAS..."/></div>
			</div>
			
		</fieldset>
			<div><input type="submit" name="submit" value="Simpan" /></div>
			
	<?php
	if(isset($_POST['submit'])){
		$nim  		= $_POST['nim'];
		$nama		= $_POST['nama'];		
		$tugas		= $_POST['tugas'];
		$uts	    = $_POST['uts'];
		$uas  		= $_POST['uas'];
		$predikat;
		$akhir		= ($tugas + $uts + $uas)/3;
		
		session_start();
		$_SESSION['id']=$nim;
		
		if($akhir >=60 && $akhir <=69){
			$predikat = 'C';
		}elseif($akhir >=70 && $akhir <=79){
			$predikat = 'B';
		}elseif($akhir >=80){
			$predikat = 'A';
		}else{
			$predikat = 'tdk lulus';
		}
		
		$insert	= 'insert into data_mahasiswa(nim,Nama,tugas,uts,uas,akhir,predikat)value
		("'.$nim.'","'.$nama.'","'.$tugas.'","'.$uts.'","'.$uas.'","'.$akhir.'","'.$predikat.'")';
		$query   = mysqli_query($koneksi,$insert) or die (mysqli_error());
		
		if($query){
			echo'
			<script>
				alert("Data Mahasiswa Berhasil Dimasukan");
				window.location="hasil.php";
			</script>';
			}
		}
	?>
		</form>
	</div>
</div>
</body>
</html>