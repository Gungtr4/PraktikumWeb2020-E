<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT Data
                 <?php
				 	if(isset($_GET['kode'])){
						$sql	='SELECT * FROM mahasiswa WHERE nim="'.$_GET['kode'].'" LIMIT 1';
						$query	= mysqli_query($koneksi,$sql) or die (mysqli_error()); 
						$arr	= mysqli_fetch_array($query);
						
						$id			= $arr['nim'];
						$nama		= $arr['nama'];
						$alamat		= $arr['alamat'];
						$up		    = $arr['up_by'];
					}
				 ?>
                </td>
            </tr>
     </table>
	 <table align="center" class="customers">   
   			<tr>
            	<th>NIM</th>
                <td><input type="text" disabled="" value="<?php echo $id;?>"/>
                	<input type="hidden" name="id" value="<?php echo $id;?>" />
                </td>
            </tr>
            
            <tr>
            	<th>Nama</th>
                <td><input type="text" name="nama" value="<?php echo $nama;?>">
                </td>
            </tr>
			<tr>
            	<th>alamat</th>
                <td><textarea name="alamat"><?php echo($alamat)?></textarea>
                </td>
            </tr>
            <tr>
            	<th>Uploaded By</th>
                <td>
				<?php
	$qsk = 'select * from user';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="up" class="form-control">
		 	<option>'.$up.'</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_user'];
				$kname = $rsk['nama'];
				echo'<option value="'.$kcode.'">'.$kcode.'&nbsp;| &nbsp;'.$kname.'</option>';	
				}
			}
			echo "</select>"
			?>
                </td>
            </tr> 	 	
     <table align="center" class="customers">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save"></td
				<td>
                    <a href="index_a.php"><input type="button" value="Cancel"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
		$id		    = $_POST['id'];
		$name	    = $_POST['nama'];
		$alm		= $_POST['alamat'];
		$upd		= $_POST['up'];
					
			$sql	= 'UPDATE mahasiswa SET nama="'.$nama.'",alamat="'.$alm.'",up_by="'.$upd.'" WHERE nim="'.$id.'"';
			$query   = mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
			if($query){
				echo'
				<script>
					alert("You Edited Successfuly ");
					window.location="index_a.php";
				</script>';
			}
		}
	 ?>
     </table>
</form>