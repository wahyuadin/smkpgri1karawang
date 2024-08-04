<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
	public function getData() {
		return $this->db->get('pendaftaran')->row();
	}
	public function edit($id, $link) {
		$this->db->where('id', $id);
		return $this->db->update('pendaftaran', ['link' => $link]);
	}
}
?>
