<?php

class Mpesananmakanan extends CI_Model {
	
	public function tampil_pesanan_makanan($id_pesanan) {
		$where=array('id_pesanan' => $id_pesanan);
		$query=$this->db->get_where('pesanan_makanan', $where);
		$result=$query->result();
		return $result;
	}
	
	public function tambah_pesanan_makanan($id_pesanan) {
		for ($i=1; $i <= $this->input->post('pesanan_all'); $i++) { 
			if (isset($_POST['check'.$i])) {
				if ($this->input->post('qty'.$i)!="") {
					$data['id_makanan']=$this->input->post('check'.$i);
					$data['id_pesanan']=$id_pesanan;
					$data['qty']=$this->input->post('qty'.$i);
					$this->db->insert('pesanan_makanan', $data);
				}
			}
		}
	}

	public function delete($id_pesanan) {
		$where=array('id_pesanan' => $id_pesanan);
		$this->db->delete('pesanan_makanan', $where);
	}
}

?>