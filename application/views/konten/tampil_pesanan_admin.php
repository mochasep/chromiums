<div class="well">
	<h2>Selamat Datang, <?php echo $this->session->userdata('admin');?>!</h2>
</div>
<ul class="nav nav-pills nav-justified">
	<li role="presentation"><a href="<?php echo base_url('kelola-makanan');?>">Kelola Makanan</a></li>
	<li role="presentation" class="active"><a href="<?php echo base_url('tampil-pesanan-admin');?>">Pesanan Masuk</a></li>
	<li role="presentation"><a href="<?php echo base_url('keluar-admin');?>">Keluar</a></li>
<div class="page-header">
	<h3>Daftar Makanan</h3>
	<a href="<?php echo base_url('tampil-pesanan-admin');?>" class="btn btn-default">Baru</a>
	<a href="?selesai=0" class="btn btn-primary">Diproses</a>
	<a href="?selesai=1" class="btn btn-success">Sudah Selesai</a>
	<a href="<?php echo base_url('kelola-makanan');?>" class="btn btn-danger">kembali</a>
</div>
<form role="form" action="" method="post">
	<div class="table-responsive">
		<table id="userTable" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>ID Pemesanan</th>
					<th>Id Pelanggan</th>
					<!-- <th>Meja</th> -->
					<th>Timestamp</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($semua_pesanan as $pesanan):?>
				<tr>
					<td><a href="<?php echo base_url('pesanan-detail/'.$pesanan->id);?>"><?php echo $pesanan->id;?></a></td>
					<td><?php echo $pesanan->id_pelanggan;?></a></td>
					<!-- <td><?php if ($pesanan->meja==0) {echo "belum diset";} else { echo $pesanan->meja; };?></a></td> -->
					<td><?php echo $pesanan->timestamp;?></a></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
</form>