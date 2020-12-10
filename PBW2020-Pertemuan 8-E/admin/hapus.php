<table align="center">
	<thead>
    	<th>
         <?php
		 	if(isset($_GET['kode'])){
				$sql	='SELECT * FROM mahasiswa WHERE nim="'.$_GET['kode'].'" LIMIT 1';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error($koneksi));
				$arr	= mysqli_fetch_array($query);
				
				$id		= $arr['nim'];
				$nama  	= $arr['nama'];
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $nama;?>" with id "<?php echo  $id;?> "?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id" value="<?php echo $id;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index_a.php"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$nim	= $_POST['id'];
				$sql	='DELETE FROM mahasiswa WHERE nim="'.$nim.'"';
				$query	= mysqli_query($koneksi,$sql) or die (mysqli_error());
				if($query){
					echo'
					<script>
						alert("You Deleted Successfuly");
						window.location="index_a.php";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>