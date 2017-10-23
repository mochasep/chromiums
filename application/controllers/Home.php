  <?php
class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Mpelanggan');
		$this->load->model('Mmakanan');
		$this->load->model('Mpesanan');
		$this->load->model('Mpesananmakanan');
		$this->load->model('Madmin');
	}

	public function landing() {
		if ($this->session->userdata('nama')==null) {
			if ($this->input->post('submit_daftar_pelanggan')) {
				$this->session->set_userdata('nama', $this->input->post('nama'));
				$this->session->set_userdata('meja', $this->input->post('meja'));
				$this->Mpelanggan->tambah();
				$id_aktif = $this->Mpelanggan->ambil_id_by_no_ktp($this->input->post('no_ktp'));
				$this->session->set_userdata('id', $id_aktif);
				redirect(base_url('daftar-makanan'));
			}
			$this->load->view('form_pelanggan');
		}
		else {
			redirect(base_url('daftar-makanan'));
		}
	}

	public function daftar_makanan() {
		if ($this->session->userdata('nama')==null) {
			redirect(base_url('landing?error=1'));
		}
		else {
			if ($this->input->post('submit_pesanan_makanan')) {
				$id_pelanggan=$this->session->userdata('id');
				$this->Mpesanan->tambah($id_pelanggan);
				$id_pesanan=$this->Mpesanan->ambil_id_by_id_pelanggan($id_pelanggan);
				$this->Mpesananmakanan->tambah_pesanan_makanan($id_pesanan);
				redirect(base_url('tampil-pesanan'));
			}
			$data['pelanggan']=$this->Mpelanggan->tampil_satu($this->session->userdata('id'));
			$data['semua_makanan']=$this->Mmakanan->tampilkan();
			$data['konten']="daftar_makanan";
			$this->load->view('submited', $data);
		}
	}

	public function tampil_pesanan() {
		$id_pelanggan=$this->session->userdata('id');
		$id_pesanan=$this->Mpesanan->ambil_id_by_id_pelanggan($id_pelanggan);
		$data['pesanan_makanan_semua']=$this->Mpesananmakanan->tampil_pesanan_makanan($id_pesanan);
		$this->load->view('tampil_pesanan', $data);
		// redirect(base_url('daftar-makanan'));
		
	}
	
	public function keluar() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function kelola_makanan() {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		else {
			$data['semua_makanan']=$this->Mmakanan->tampilkan();
			$data['konten']="kelola_makanan";
			$this->load->view('admin_submitted', $data);
		}
	}

	public function tampil_pesanan_admin() {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		if(isset($_GET['selesai'])) {
			if ($_GET['selesai']==1) {
				$data['semua_pesanan']=$this->Mpesanan->tampil_semua_pesanan($_GET['selesai']);
			}
			elseif ($_GET['selesai']==0) {
				$data['semua_pesanan']=$this->Mpesanan->tampil_semua_pesanan($_GET['selesai']);
			}
		}
		else {
			$data['semua_pesanan']=$this->Mpesanan->tampil_pesanan_baru(0);
		}
		$data['konten'] = "tampil_pesanan_admin";
		$this->load->view('admin_submitted', $data);
	}

	public function pesanan_detail($id_pesanan) {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		$data['pesanan']=$this->Mpesanan->ambil_pesanan_by_id($id_pesanan);
		$data['pesanan_details']=$this->Mpesananmakanan->tampil_pesanan_makanan($id_pesanan);
		$data['konten'] = "pesanan_details";
		$this->load->view('admin_submitted', $data);
		if ($this->input->post('submit_ganti_meja')) {
			$this->Mpesanan->edit_meja($id_pesanan);
			redirect(base_url('tampil-pesanan-admin'));
		}
	}

	public function selesai_pesanan($id_pesanan) {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		$this->Mpesanan->edit_selesai($id_pesanan);
		redirect(base_url('tampil-pesanan-admin'));
	}

	public function admin() {
		if ($this->session->userdata('admin')!=null) {
			redirect(base_url('kelola-makanan'));
		}
		if ($this->input->post('submit_admin')) {
			if ($this->Madmin->login()) {
				$this->session->set_userdata('admin', $this->input->post('username'));
				redirect(base_url('kelola-makanan'));
			}
			else {
				redirect(base_url('admin?error=1'));
			}
		}
		else {
			$this->load->view('admin');
		}
	}

	public function makanan($kode_makanan) {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		else {
			if ($this->input->post('submit_edit_makanan')) {
				$this->Mmakanan->edit($kode_makanan);
				redirect(base_url('kelola-makanan'));
			}
			else {
				$data['makanan']=$this->Mmakanan->get_by_kode($kode_makanan);
				$data['konten']="makanan";
				$this->load->view('admin_submitted', $data);
			}
		}
	}

	public function deletemakanan($kode_makanan) {
		if ($this->session->userdata('admin')==null) {
			redirect(base_url('admin'));
		}
		$this->Mmakanan->delete($kode_makanan);
		redirect(base_url('kelola-makanan'));
	}
	

	// public function addmakanan() {
	// 	if ($this->session->userdata('admin')==null) {
	// 		redirect(base_url('admin'));
	// 	}
	// 	$data = array(
	// 		'kode' => $this->input->post('kode'),
	// 		'nama' => $this->input->post('nama'),
	// 		'deskripsi' => $this->input->post('deskripsi'),
	// 		'img' => $this->input->post('img'),
	// 		'harga' => $this->input->post('harga')
	// 	);

	// 	$this->Mmakanan->create($data);
	// 	redirect(base_url('kelola-makanan'));
	// }

	public function keluar_admin() {
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

}
?>