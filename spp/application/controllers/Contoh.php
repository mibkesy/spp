<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contoh extends CI_Controller {
	public function index() {
		$data = array (
			'title'					=>	'Contoh',
			'pembayaran'			=>	$this->data_list(),
		);
		$this->load->view('contoh/index', $data);
	}

	public function data_list() {
		$this->db->where('pb_siswa', 23038);
		return $this->db->get('tb_pay_bulan')->result_array();
	}
}