<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wa extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('Whatsapp', 'wa');
	}
	
	public function index() {
		$data['title']		= 'Whatsapp';
		$data['page']		= 'whatsapp/index';
		$data['content'] 	= $this->wa->showData();
		$this->load->view('back/layouts/main', $data);
	}

	public function edit() {
		if (isset($_POST['submit'])) {
			$id 	= htmlspecialchars($this->input->post('id'));
			$no 	= htmlspecialchars($this->input->post('no'));
			$text 	= htmlspecialchars($this->input->post('text'));
			
			$this->form_validation->set_rules('no', 'Nomor WA', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');
			if ($this->form_validation->run()) {
				$this->wa->edit($id, $no, $text);
				$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
				return $this->index();
			}
		}
	}
}
