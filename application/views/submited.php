<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang, <?php echo $this->session->userdata('nama');?>!</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?php echo base_url('plugins/jQuery/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>
<body>
	<div class="col-md-6 col-md-offset-3">
		<?php
			include "konten/".$konten.".php";
		?>
	</div>
</body>
</html>