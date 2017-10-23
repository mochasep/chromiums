<?php
class Mmakanan extends CI_Model {

	public function tampilkan() {
		$q=$this->db->get('makanan');
		$res=$q->result();
		return $res;
	}

	public function get_by_kode($kode_makanan) {
		$where=array('kode' => $kode_makanan);
		$query=$this->db->get_where('makanan', $where);
		$row=$query->row();
		return $row;
	}

	public function edit($kode_makanan) {
		$data['nama']=$this->input->post('nama');
		$data['harga']=$this->input->post('harga');
		$data['deskripsi']=$this->input->post('deskripsi');
		$data['img']=$this->input->post('img');
		$where=array('kode' => $kode_makanan);
		$this->db->update('makanan', $data, $where);
	}

	// public function add() {
	// 	$data['nama']=$this->input->post('nama');
	// 	$data['harga']=$this->input->post('harga');
	// 	$data['deskripsi']=$this->input->post('deskripsi');
	// 	$data['img']=$this->input->post('img');
	// 	$this->db->create('makanan', $data);
	// }

	public function delete($kode_makanan) {
		$where=array('kode' => $kode_makanan);
		$this->db->delete('makanan', $where);
	}

}
?>