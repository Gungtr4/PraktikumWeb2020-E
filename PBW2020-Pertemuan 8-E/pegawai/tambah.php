<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h3>Tambah Data</h3></td>
    </tr>
</table>

<table align="center" class="customers" border="0">
	<tr>
    	<th>NIM</th>
        <td><input type="text" name="id" required="required" />
        </td>
    </tr>
    <tr>
    	<th>Nama</th>
        <td><input type="text" name="nama" required="required" /></td>
    </tr> 
    <tr>
    	<th>Alamat</th>
        <td><textarea name="alamat"></textarea></td>
   	<tr>
    	<td colspan="2"><input type="submit" name="submit" value="Save" />
        	<a href="index_p.php"><input style="color: black" type="button" value="Cancel" /></a></td>
    </tr>
<?php
	if(isset($_POST['submit'])){
		$nim	    = $_POST['id'];
		$nama		= $_POST['nama'];
		$alamat	    = $_POST['alamat'];
		
		$sql	     ='insert into mahasiswa(nim,nama,alamat,up_by)value ("'.$nim.'","'.$nama.'","'.$alamat.'","'.$_SESSION['pegawai'].'")';
		$query 	    =mysqli_query($koneksi,$sql) or die (mysqli_error());
		if($query){
			echo'
			<script>
				alert("You Successfuly Added Data");
				window.location="index_p.php";
			</script>';
		}
	}
?>
</table>
</form>