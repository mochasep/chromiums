<!DOCTYPE html>
<html>
<head>
	<title>Form Pelanggan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?php echo base_url('plugins/jQuery/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>
<body>
	<div class="col-md-4 col-md-offset-4">
		<h2 align='center'>Form Pelanggan</h2>
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error']==1) {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Perhatian!</strong> Anda harus mengisi Daftar Pelanggan terlebih dahulu
		</div>
		<?php
				}
			}
		?>
		<div class="well">
			<form method="post" role="form">
				<input type="text" name="no_ktp" class="form-control" placeholder="No. KTP" required>
				<br />
				<input type="text" name="nama" class="form-control" placeholder="Nama" required>
				<br />
				<input type="text" name="no_telp" class="form-control" placeholder="No. Telp" required>
				<br />
				<textarea name="alamat" class="form-control" placeholder="Alamat" required></textarea>
				<br />
				<input type="text" name="meja" class="form-control" placeholder="Meja" required>
				<br />
				<input type="submit" name="submit_daftar_pelanggan" class="btn btn-primary btn-block" value="Submit">
			</form>
		</div>
	</div>
</body>
</html>