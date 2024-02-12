<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikullar_model extends CI_Model {
	public function getData() {
		return $this->db->get('ekstrakurikullar')->result_object();
	}

	public function showData() {
		return $this->db->get('ekstrakurikullar')->result();
	}

	public function hapus($id) {
		return $this->db->delete('ekstrakurikullar', array('id' => $id));
	}

	public function editData($id, $nama, $gambar) {
		$this->db->where('id', $id);
		return $this->db->update('ekstrakurikullar', ['nama' => $nama, 'foto' => $gambar]);
	}
}
?>
