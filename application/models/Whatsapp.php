<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Model {
	public function getData() {
		$url = 'https://api.wa.link/v1/newlink';
		$db = $this->db->get('whatsapp')->row();
		$data = array(
			'phone' 		=> $db->no,
			'countryCode' 	=> '62',
			'message' 		=> $db->text
		);
		$post_data = json_encode($data);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'X-Api-Key: 3SPdHlx5Kn8Wv3PYFwg5L6YAxBmFi3D06a8PDZvG'
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);

		if(curl_error($ch)) {
			echo 'Error: ' . curl_error($ch);
		} else {
			return json_decode($response)->data->shortUrl;
		}

		curl_close($ch);
	}

	public function showData() {
		return $this->db->get('whatsapp')->row();
	}

	public function edit($id, $no, $text) {
		$this->db->where('id', $id);
		return $this->db->update('whatsapp', ['no' => $no, 'text' => $text]);
	}
}
