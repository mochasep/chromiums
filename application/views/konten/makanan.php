<div class="well">
	<h2>Selamat Datang, <?php echo $this->session->userdata('admin');?>!</h2>
</div>
	<h3>Edit Makanan</h3>
</div>
<div class="col-md-6 col-md-offset-3">
	<form method="post" role="form">
	    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" value="<?php echo $makanan->nama;?>" required>
	    <br>
	    <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" value="<?php echo $makanan->harga;?>" required>
	    <br>
	    <textarea id="deskripsi" name="deskripsi" class="form-control" placeholder="Deskripsi"><?php echo $makanan->deskripsi;?></textarea>
	    <br>
	    <input type="submit" name="submit_edit_makanan" class="btn btn-default" value="Edit">
	<!--     <a href="<?php echo base_url('addmakanan/'.$makanan->kode.'');?>" class="btn btn-primary ">Tambah</a> -->
	    <a href="<?php echo base_url('deletemakanan/'.$makanan->kode.'');?>" class="btn btn-primary ">Hapus</a>
	    <a href="<?php echo base_url('kelola-makanan');?>" class="btn btn-danger">kembali</a>
	</form>
</div>
