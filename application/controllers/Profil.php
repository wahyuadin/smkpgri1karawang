<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('fasilitas_model', 'fasilitas');
		$this->load->model('struktur_model', 'struktur');
		$this->load->model('ekstrakurikullar_model', 'eskul');
		$this->load->model('whatsapp');
	}
	
	public function sejarah()
	{
		$data['title']		= 'Sejarah';
		$data['page']		= 'profil/sejarah';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function visimisi()
	{
		$data['title']		= 'Visi & Misi';
		$data['page']		= 'profil/visimisi';
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function struktur()
	{
		$data['title']		= 'Struktur Organisasi';
		$data['page']		= 'profil/struktur';
		$data['struktur'] 	= $this->struktur->getData();
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}

	public function fasilitas()
	{
		$data['title']		= 'Fasilitas';
		$data['page']		= 'profil/fasilitas';
		$data['fasilitas'] 	= $this->fasilitas->getAllFasility();
		$data['wa']			= $this->whatsapp->getData();

		$this->load->view('front/layouts/main', $data);
	}
	
	public function ekstrakurikullar() {
		// var_dump($this->eskul->index());
		$data['title']				= 'Ekstrakurikullar';
		$data['page']				= 'profil/ekstrakurikullar';
		$data['ekstrakurikullar'] 	= $this->eskul->showData();
		$data['wa']			= $this->whatsapp->getData();
	
		$this->load->view('front/layouts/main', $data);
	}

}
