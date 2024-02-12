<?php
class Icon extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model', 'menu');
		$this->load->model('icon_jurusan', 'icon');
	}

	public function index()
	{
		$data['title']		= 'Icon Jurusan';
		$data['page']		= 'jurusan/icon';
		$data['content'] 	= $this->icon->getData();

		$this->load->view('back/layouts/main', $data);
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('photo', 'photo', 'trim');

		if ($this->form_validation->run() == false) {
			$data['title']			= 'Ubah Icon Jurusan';
			$data['page']			= 'jurusan/edit';
			$data['content']		= $this->icon->getData();
			$data['form_action']	= base_url('icon/edit/' . $id);
			$this->load->view('back/layouts/main', $data);
		} else {
			if (!empty($_FILES['photo']['name'])) {
				$upload 	 = $this->icon->uploadImage();

				if ($upload) {
					$background = $this->icon->ambildata();

					if (file_exists('img/jurusan/' . $background->nama_icon) && $background->nama_icon) {
						unlink('img/jurusan/' . $background->nama_icon);
					}

					$data['nama_icon'] = $upload;
				} else {
					redirect(base_url("icon/edit/$id"));
				}
			}

			$this->icon->updateData($id, $data);
			$this->session->set_flashdata('success', 'Background Jurusan Berhasil Diupdate.');

			redirect(base_url('icon'));
		}
	}
}
