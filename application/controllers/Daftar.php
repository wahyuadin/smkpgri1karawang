<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('Pendaftaran_model','daftar');
		$this->load->library('form_validation');
	}
	

	public function index()
	{
		$data['title']		= 'Pendaftaran';
		$data['page']		= 'pendaftaran/index';
		$data['content'] 	= $this->daftar->getData();
		$this->load->view('back/layouts/main', $data);
	}

	public function edit() {
		if (isset($_POST['submit'])) {
			$id 	= htmlspecialchars($this->input->post('id'));
			$link 	= htmlspecialchars($this->input->post('link'));
			
			$this->form_validation->set_rules('link', 'Link', 'required');
			if ($this->form_validation->run()) {
				$this->daftar->edit($id, $link);
				$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
				return $this->index();
			}
		}
	}
}
