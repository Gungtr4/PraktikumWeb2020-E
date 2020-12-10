<?php
include("koneksi.php");
?>
<html>
<head>
<title> Sign in</title>
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password">
							</div>
							<div class="checkbox">
							</div>
							<input type="submit" name="submit" value="Login" />
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	
<?php
if (isset($_POST['submit'])){
	$user  = $_POST['username'];
	$pass  = $_POST['pass'];
	
	
	$q = 'SELECT * FROM user WHERE username="'.$user.'" AND pass="'.$pass.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error($koneksi));
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	
	if ($n>0 && $r['level'] == 'admin'){
		session_start();
		$_SESSION['admin'] = $r['id_user'];
		$_SESSION['role'] = $r['level'];		
			
			echo' 
				<script>
					alert("Sucessfully!");
					window.location="admin/index_a.php";
				</script>';}
	elseif ($n>0 && $r['level'] == 'pegawai'){
		session_start();
		$_SESSION['pegawai'] = $r['id_user'];
		$_SESSION['role'] = $r['level'];		
			
			echo' 
				<script>
					alert("Sucessfully!");
					window.location="pegawai/index_p.php";
				</script>';}
			else{
				echo'
					<script>
						alert("Sorry! your username or password is wrongs");
						window.location="index.php";
					</script>';	
	}
}
?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
