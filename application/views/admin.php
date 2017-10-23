<html>
<head>
	<title>form admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?php echo base_url('plugins/jQuery/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>
<body>
	<div class="col-md-4 col-md-offset-4">
		<h2 align='center'>Admin Page</h2>
		<?php
			if (isset($_GET['error'])) {
				if ($_GET['error']==1) {
		?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Perhatian!</strong> Pastikan username dan password benar!
		</div>
		<?php
				}
			}
		?>
		<div class="well">
			<form method="post" role="form">
				<input type="text" name="username" class="form-control" placeholder="Username" required>
				<br />
				<input type="password" name="password" class="form-control" placeholder="Password" required>
				<br />
				<input type="submit" name="submit_admin" class="btn btn-danger btn-block" value="Login">
			</form>
		</div>
	</div>
</body>
</html>