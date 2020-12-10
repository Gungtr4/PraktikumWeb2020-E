<?php
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['role']!='admin'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
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
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="index.php"><span>Mahasiswa </span><?php echo($_SESSION['role'])?></a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em><img src="../assets/image/PngItem_4212617.png" width="10px"></em>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="">
								<div><em></em><?php echo($_SESSION['admin'])?>
								</div>
							</a></li>
							<li class="divider"></li>
							<li><a href="logout.php">
								<div><em></em>Logut
								</div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
<!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo($_SESSION['admin'])?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search" method="post" enctype="multipart/form-data" action="search.php">
			<div class="form-group">
				<input type="text" class="form-control" name="nim" placeholder="Search by NIM..">
			</div>
			<input type="submit" name="submit" value="Search" />
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index_a.php?form=tambah"><em class="fa fa-dashboard">&nbsp;</em> Tambah Data</a></li>
			<li class="active"><a href="logout.php"><em class="fa fa-dollar">&nbsp;</em> Logout</a></li>
			
	</ul>
	</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user-circle"></em>
				</a></li>
				<li class="active">User</li>
			</ol>
		</div>
<!--/.row--> 
        <div><table class="customers" >
            <tr>
                <th>Nim</th>
                <th>nama</th>
				<th>Alamat</th>
                <th>Uploaded By</th>
                <th>Edit</th>
                <th>Hapus</th>
            </tr>
            <?php
	$a	 ='SELECT * FROM mahasiswa m INNER JOIN user u ON m.up_by=u.id_user ';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id			= $d['nim'];
			$nama		= $d['nama'];
			$alamat		= $d['alamat'];
			$up		    = $d['up_by'];
			
			echo'
				<tr align="center">
					<td>'.$id.'</td>
					<td>'.$nama.'</td>
					<td>'.$alamat.'</td>
					<td>'.$up.'</td>
					<td><a href="index_a.php?page=produk&form=edit&kode='.$id.'">EDIT</td>
					<td><a href="index_a.php?page=produk&form=hapus&kode='.$id.'">DELETE</td>				
				</tr>';
		}
	}
?>

        </table></div>	    
<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("hapus.php");
}
?>
</div>
		</div><!--/.row-->
	</div><!--/.row-->
</div>	<!--/.main-->
	<script src="../js/jquery-1.11.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/chart.min.js"></script>
	<script src="../js/chart-data.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>