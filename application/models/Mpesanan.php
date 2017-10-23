<?php
class Mpesanan extends CI_Model {

	public function tambah($id_pelanggan) {
		$data=array('id_pelanggan' => $id_pelanggan);
		$this->db->insert('pesanan', $data);
	}

	public function ambil_id_by_id_pelanggan($id_pelanggan) {
		$where=array('id_pelanggan' => $id_pelanggan);
		$query=$this->db->get_where('pesanan', $where);
		$row=$query->row();
		return $row->id;
	}

	public function ambil_pesanan_by_id($id_pesanan) {
		$where=array('id' => $id_pesanan);
		$query=$this->db->get_where('pesanan', $where);
		$row=$query->row();
		return $row;
	}

	public function tampil_pesanan_baru() {
		$where=array('meja' => 0);
		$this->db->from('pesanan')->where($where);
		$this->db->order_by('id', 'desc');
		$q=$this->db->get();
		$res=$q->result();
		return $res;
	}

	public function tampil_semua_pesanan($selesai) {
		$where=array('selesai' => $selesai, 'meja !=' => 0);
		$this->db->from('pesanan')->where($where);
		$this->db->order_by('id', 'desc');
		$q=$this->db->get();
		$res=$q->result();
		return $res;
	}

	public function edit_meja($id_pesanan) {
		$data['meja']=$this->input->post('no_meja');
		$where=array('id' => $id_pesanan);
		$this->db->update('pesanan', $data, $where);
	}

	public function edit_selesai($id_pesanan) {
		$data['selesai']=1;
		$where=array('id' => $id_pesanan);
		$this->db->update('pesanan', $data, $where);
	}
}

?>