<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function index() {
		// URL API WhatsApp
		$url = 'https://api.wa.link/v1/newlink';

		// Data JSON yang akan dikirim
		$data = array(
			'phone' => '435435433',
			'countryCode' => '62',
			'message' => 'dfdsfdsffdss'
		);

		// Mengonversi data JSON menjadi string
		$post_data = json_encode($data);

		// Inisialisasi cURL
		$ch = curl_init($url);

		// Set opsi untuk melakukan permintaan POST
		curl_setopt($ch, CURLOPT_POST, 1);

		// Set data yang akan dikirimkan dalam permintaan POST
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		// Set header permintaan
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'X-Api-Key: 3SPdHlx5Kn8Wv3PYFwg5L6YAxBmFi3D06a8PDZvG'
		));

		// Set opsi untuk mengembalikan respons sebagai string
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Eksekusi permintaan cURL dan simpan respons
		$response = curl_exec($ch);

		// Cek apakah terjadi kesalahan saat melakukan permintaan
		if(curl_error($ch)) {
			echo 'Error: ' . curl_error($ch);
		} else {
			// Tampilkan respons dari API WhatsApp
			var_dump(json_decode($response)->data->shortUrl);
		}

		// Tutup sambungan cURL
		curl_close($ch);
	}
}
