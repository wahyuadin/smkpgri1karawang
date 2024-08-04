<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pendaftaran_model','pendaftaran');
		$this->load->model('whatsapp');
	}
	
	public function index()
	{
		$data['title']		= 'Pendaftaran';
		$data['page']		= 'pendaftaran/index';
		$data['content'] 	= $this->pendaftaran->getData();
		$data['wa']			= $this->whatsapp->getData();
		$this->load->view('front/layouts/main', $data);
	}
}

?>
