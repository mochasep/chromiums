<?php
	$this->load->model('Mmakanan');
	$this->load->model('Mpelanggan');
?>
<div class="well">
	<h2>Selamat Datang, <?php echo $this->session->userdata('admin');?>!</h2>
</div>
	<a href="<?php echo base_url('tampil-pesanan-admin');?>" class="btn btn-default">Kembali</a>
	<h3>Detail Pesanan</h3>
</div>
<div class="col-md-6 col-md-offset-3">
	<a href="<?php echo base_url('selesai-pesanan/'.$pesanan->id);?>" class="btn btn-danger">Pesanan Selesai</a>
	<br><br>
	<table id="pemesanTable" class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>ID Pemesanan</th>
				<th>No. KTP Pelanggan</th>
				<th>Nama Pelanggan</th>
				<th>No. Telp Pelanggan</th>
				<th>Alamat Pelanggan</th>
				<th>meja</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $pesanan->id;?></td>
				<td><?php echo $this->Mpelanggan->tampil_satu_by_id($pesanan->id_pelanggan)->no_ktp;?></td>
				<td><?php echo $this->Mpelanggan->tampil_satu_by_id($pesanan->id_pelanggan)->nama;?></td>
				<td><?php echo $this->Mpelanggan->tampil_satu_by_id($pesanan->id_pelanggan)->no_telp;?></td>
				<td><?php echo $this->Mpelanggan->tampil_satu_by_id($pesanan->id_pelanggan)->alamat;?></td>
				<td><?php echo $this->Mpelanggan->tampil_satu_by_id($pesanan->id_pelanggan)->meja;?></td>
			</tr>
		</tbody>
	</table>
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
			<?php $no=1; foreach ($pesanan_details as $pesanan_makanan):?>
				<tr>
					<td><?php echo $no;?></td>
					<td><?php echo $pesanan_makanan->id_makanan;?></td>
					<td><?php echo $this->Mmakanan->get_by_kode($pesanan_makanan->id_makanan)->nama;?></td>
					<td><?php echo $pesanan_makanan->qty;?></td>
					<td class="harga-makanan"><?php echo $this->Mmakanan->get_by_kode($pesanan_makanan->id_makanan)->harga * $pesanan_makanan->qty;?></td>
				</tr>
			<?php $no++; endforeach;?>
			</tbody>
		</table>
	</div>
	<p>Total Harga = <span id="total-harga" style="color:red;"></span></p>
	<form method="post" role="form">
		<label>No Meja</label>
	    <input type="text" name="no_meja" class="form-control" placeholder="No Meja" value="<?php echo $pesanan->meja;?>" required>
	    <br>
	    <input type="submit" name="submit_ganti_meja" class="btn btn-primary" value="Proses">
	</form>
	<br>
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
</div>