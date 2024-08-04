<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('whatsapp');
	}

	public function ap()
	{
		$data['title']		= 'Administrasi Perkantoran';
		$data['page']		= 'jurusan/ap';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function ak()
	{
		$data['title']		= 'Akutansi';
		$data['page']		= 'jurusan/ak';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function pm()
	{
		$data['title']		= 'Pemasaran';
		$data['page']		= 'jurusan/pm';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

}

/* End of file Controllername.php */
