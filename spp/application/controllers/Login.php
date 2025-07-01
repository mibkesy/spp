<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		$data = array (
			'title'			=>	'Login',
		);
		$this->form_validation->set_rules('username', 'username', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = $this->db->get_where('tb_admin',['admin_username' => $username])->row_array();
			if($cek) {
				if(password_verify($password,$cek['admin_password'])) {
					$sesi = array (
						'id'			=>	$cek['admin_id'],
						'status'		=>	'sudah_log',
					);
					$this->session->set_userdata($sesi);
					redirect('admin/dashboard');
				}else {
					$this->session->set_flashdata('error', 'Password Anda salah');
					redirect('login');
				}
			}else {
				$this->session->set_flashdata('error', 'Username Anda tidak terdaftar');
				redirect('login');
			}
		}
	}

	public function keluar() {
		$this->session->sess_destroy();
		redirect('login');
	}

	public function sep() {
		$data = array (
			'admin_id'		=>   md5(rand()),
			'admin_nama'		=>   'Admin',
			'admin_username'		=>   'admin',
			'admin_password'		=>   password_hash('admin', PASSWORD_DEFAULT),
			'admin_foto'		=>   'admin-avatar.png',
		);
	
		$this->db->insert('tb_admin', $data);
		redirect('login');
	}
}