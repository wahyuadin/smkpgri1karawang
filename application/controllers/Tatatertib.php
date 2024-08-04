<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tatatertib extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('whatsapp');
	}
	

	public function index()
	{
		$data['title']		= 'Tata Tertib';
		$data['page']		= 'tatatertib/index';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
