<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ekstrakurikullar extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('menu_model', 'menu');
		$this->load->model('Ekstrakurikullar_model', 'eskul');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	

	public function index()
	{
		$data['title']		= 'Ekstrakurikullar';
		$data['page']		= 'ekstrakurikullar/index';
		$data['content'] 	= $this->eskul->getData();
		$this->load->view('back/layouts/main', $data);
	}

	public function tambah() {
    if (isset($_POST['submit'])) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
		if (empty($_FILES['foto']['name']))
		{
			$this->form_validation->set_rules('foto', 'Foto', 'required');
		}

        if ($this->form_validation->run()) {
            $config['upload_path'] = './img/eskul/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 5120;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $namaFoto = $uploadData['file_name'];

                $query = $this->db->insert('ekstrakurikullar', [
                    'nama' => htmlspecialchars($this->input->post('nama')),
                    'foto' => htmlspecialchars($namaFoto)
                ]);

                if ($query) {
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah.');
                    $this->index();
                } else {
                    $this->session->set_flashdata('error', 'Gagal menambahkan data.');
                    $this->index();
                }
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                $this->index();
            }
        } else {
            $this->index();
        }
    } else {
        $this->session->set_flashdata('success', 'Halaman Tidak diizinkan.');
        return $this->index();
    }
}

	public function edit() {
		if (isset($_POST['kirim'])) {
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			if (empty($_FILES['foto']['name']))
			{
				$this->form_validation->set_rules('foto', 'Foto', 'required');
			}
	
			if ($this->form_validation->run()) {
				$config['upload_path'] = './img/eskul/';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 5120;
				$config['encrypt_name'] = TRUE;
	
				$this->load->library('upload', $config);
	
				if ($this->upload->do_upload('foto')) {
					$uploadData = $this->upload->data();
					$namaFoto 	= $uploadData['file_name'];
					$id			= htmlspecialchars($this->input->post('id'));
					$nama		= htmlspecialchars($this->input->post('nama'));
					if ($this->eskul->editData($id,$nama,$namaFoto)) {
						$this->session->set_flashdata('success', 'Data Berhasil Diedit.');
						return $this->index();
					}
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					$this->index();
				}
			} else {
				$this->index();
			}
		} else {
			$this->session->set_flashdata('success', 'Halaman Tidak diizinkan.');
			return $this->index();
		}
	}
	public function hapus($id) {
		$this->eskul->hapus($id);
		$this->session->set_flashdata('success', 'Data Berhasil Dihapus.');
		$this->index();
	}
}
?>
