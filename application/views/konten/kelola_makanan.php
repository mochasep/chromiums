<div class="well">
	<h2>Selamat Datang, <?php echo $this->session->userdata('admin');?>!</h2>
</div>
<ul class="nav nav-pills nav-justified">
	<li role="presentation" class="active"><a href="<?php echo base_url('kelola-makanan');?>">Kelola Makanan</a></li>
	<li role="presentation"><a href="<?php echo base_url('tampil-pesanan-admin');?>">Pesanan Masuk</a></li>
	<li role="presentation"><a href="<?php echo base_url('keluar-admin');?>">Keluar</a></li>
<div class="page-header">
	<h3>Daftar Makanan</h3>
</div>
<form role="form" action="" method="post">
	<div class="table-responsive">
		<table id="userTable" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>Gambar</th>
					<th>Deskripsi</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1; foreach ($semua_makanan as $makanan):?>
				<tr>
					<td><a href="<?php echo base_url('makanan/'.$makanan->kode.'');?>"><?php echo $makanan->kode;?></a></td>
					<td><?php echo $makanan->nama;?></td>
					<td><img src="<?php echo base_url('images/gambar'.$makanan->kode.'.jpg');?>" class="img-responsive"></td>
					<td><?php echo $makanan->deskripsi;?></td>
					<td><?php echo $makanan->harga;?></td>
				</tr>
			<?php $no++; endforeach;?>
			</tbody>
		</table>
		<?php echo form_hidden('pesanan_all', $no-1);?>
	</div>
</form>