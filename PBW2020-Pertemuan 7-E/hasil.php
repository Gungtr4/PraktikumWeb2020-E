<?php
	include("koneksi.php");
?>
<table align="center" width="600" border="1">
<thead>
		<th>NIM</th>
        <th>Nama</th>
        <th>Nilai Tugas</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Predikat</th>
</thead>
<tbody>
<?php
	session_start();
	$id		 = $_SESSION['id'];
	$col	 ='SELECT * FROM data_mahasiswa where nim ="'.$id.'" LIMIT 1';
	$query	 = mysqli_query($koneksi,$col) or die (mysqli_error());
	$row	 = mysqli_num_rows($query);
	if($row !=0){
		while($arr=mysqli_fetch_array($query))
		{
			$nim		= $arr['nim'];
			$nama		= $arr['Nama'];
			$tugas		= $arr['tugas'];
			$uts		= $arr['uts'];
			$uas		= $arr['uas'];
			$akhir		= $arr['akhir'];
			$predikat	= $arr['predikat'];
			echo'
				<tr align="center">
					<td>'.$nim.'</td>
					<td>'.$nama.'</td>
					<td>'.$tugas.'</td>
					<td>'.$uts.'</td>
					<td>'.$uas.'</td>
					<td>'.$akhir.'</td>
					<td>'.$predikat.'</td>			
				</tr>';
		}
	}
?>
<a href="Index.php">Kembali</a>