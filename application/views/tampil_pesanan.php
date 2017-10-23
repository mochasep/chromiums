<?php
	$this->load->model('Mmakanan');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pesanan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="<?php echo base_url('plugins/jQuery/jquery.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
</head>
<body>
	<div class="col-md-6 col-md-offset-3">
		<div class="page-header">
			<h3>Daftar Makanan Meja <?php echo $this->session->userdata('meja');?></h3>
		</div>
		<form role="form" action="" method="post">
			<div class="table-responsive">
				<table id="userTable" class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Makanan</th>
							<th>Nama Makanan</th>
							<th>Jumlah</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
					<?php $no=1; foreach ($pesanan_makanan_semua as $pesanan_makanan):?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $pesanan_makanan->id_makanan;?></td>
							<td><?php echo $this->Mmakanan->get_by_kode($pesanan_makanan->id_makanan)->nama;?></td>
							<td><?php echo $pesanan_makanan->qty;?></td>
							<td class="harga-makanan"><?php echo $this->Mmakanan->get_by_kode($pesanan_makanan->id_makanan)->harga * $pesanan_makanan->qty;?></td>
							<?php $nomor_pemesanan = $pesanan_makanan->id_pesanan;?>
						</tr>
					<?php $no++; endforeach;?>
					</tbody>
				</table>
				<p>Total Harga = <span id="total-harga" style="color:red;"></span></p>
				<!-- <a href="<?php echo base_url('landing');?>" class="btn btn-primary" >Pesan Lagi</a> -->
				<a href="<?php echo base_url('keluar');?>" class="btn btn-danger" onclick="alert('Nomor Pemesanan anda adalah: <?php echo $nomor_pemesanan;?>. HARAP DICATAT!!!')">Selesai</a>
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(calculateSum);
		function calculateSum() {
			var sum = 0;
			$(".harga-makanan").each(function(){
				var value = $(this).text();
				if(!isNaN(value) && value.length != 0){
					sum += parseFloat(value);
				}
			});
			$('#total-harga').text(sum);    
		};
	</script>
</body>
</html>