<?php
class Mpelanggan extends CI_Model {

	public function tambah() {
		$data = array(
					'no_ktp' => $this->input->post('no_ktp'),
					'nama' => $this->input->post('nama'),
					'no_telp' => $this->input->post('no_telp'),
					'alamat' => $this->input->post('alamat'),
					'meja' => $this->input->post('meja')
					);
		$this->db->insert('pelanggan', $data);
	}

	public function ambil_id_by_no_ktp($no_ktp) {
		$sql="select * from `pelanggan` where `no_ktp` = $no_ktp order by `id` desc limit 1";
		$query=$this->db->query($sql);
		$row=$query->row();
		return $row->id;
	}

	public function tampil_satu_by_id($id) {
		$where=array('id' => $id);
		$query=$this->db->get_where('pelanggan', $where);
		$row=$query->row();
		return $row;
	}

	public function tampil_satu($no_ktp) {
		$where=array('no_ktp' => $no_ktp);
		$query=$this->db->get_where('pelanggan', $where);
		$row=$query->row();
		return $row;
	}

}
?>