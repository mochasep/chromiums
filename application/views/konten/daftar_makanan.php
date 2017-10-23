<div class="well">
	<h2>Selamat Datang, <?php echo $this->session->userdata('nama');?>!</h2>
	<h2>Meja <?php echo $this->session->userdata('meja');?></h2>
</div>
<ul class="nav nav-pills nav-justified">
	<li role="presentation" class="active"><a href="<?php echo base_url('daftar-makanan');?>">Makanan</a></li>
	<!-- <li role="presentation" class="btn btn-primary">Nomor Meja</li> -->
	<li role="presentation"><a href="<?php echo base_url('keluar');?>">Keluar</a></li>

</ul>
<div class="page-header">
	<h3>Daftar Makanan</h3>
</div>
<form role="form" action="" method="post">
<!-- <form role="form" action="" method="post" onsubmit="event.preventDefault(); if(validate()) submit();"> -->
	<div class="table-responsive">
		<table id="userTable" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Gambar</th>
					<th>Jumlah (ex. 3)</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1; foreach ($semua_makanan as $makanan):?>
				<tr>
					<td>
						<?php
							// $chk = array('name' => 'check'.$no, 'class' => 'food_checkbox', 'value' => $makanan->kode);
							// echo form_checkbox($chk);
							echo form_checkbox('check'.$no, $makanan->kode);
						?>
					</td>
					<td><?php echo $makanan->kode;?></td>
					<td><a href="#" title="<?php echo $makanan->deskripsi;?>"><?php echo $makanan->nama;?></a></td>
					<td><?php echo $makanan->harga;?></td>
					<td><img src="<?php echo base_url('images/gambar'.$makanan->kode.'.jpg');?>" class="img-responsive"></td>
					<td><input type="text" name="qty<?php echo $no;?>" class="form-control"></td>
				</tr>
			<?php $no++; endforeach;?>
			</tbody>
		</table>
		<?php echo form_hidden('pesanan_all', $no-1);?>
		<input type="submit" class="btn btn-primary" name="submit_pesanan_makanan" value="Submit">
		<input type="reset" class="btn btn-default" value="Reset">
	</div>
	<!--<script type="text/javascript">
		function validate () {
			var checks = document.getElementsByClassName('food_checkbox');
			for (var i = 0; i < checks.length; ++i) {
				if (checks[i].checked) {
					return true;
				}
			}
			alert('pesen dulu')
			return false;
		}
	</script>-->
</form>