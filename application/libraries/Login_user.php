<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_User
{
	protected $ci;


	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->login_user($username, $password);
		if ($cek) {
			$id_user = $cek->id_user;
			$nama_user = $cek->nama_user;
			$username = $cek->username;
			$password = $cek->password;
			$status_user = $cek->status_user;
			$level_user = $cek->level_user;
			$profil = $cek->profil;

			$this->ci->session->set_userdata('id_user', $id_user);
			$this->ci->session->set_userdata('nama_user', $nama_user);
			$this->ci->session->set_userdata('username', $username);
			$this->ci->session->set_userdata('password', $password);
			$this->ci->session->set_userdata('status_user', $status_user);
			$this->ci->session->set_userdata('level_user', $level_user);
			$this->ci->session->set_userdata('profil', $profil);

			// if ($level_user === '1') {
			// 	redirect('admin');
			// } else
			if ($level_user === '2') {
				redirect('gudang');
			} elseif ($level_user === '3') {
				redirect('supplier');
			} elseif ($level_user === '4') {
				redirect('pimpinan');
			}
		} else {
			$this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
			redirect('auth/login');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Anda Belum Login');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_user');
		$this->ci->session->unset_userdata('nama_user');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->set_userdata('password');
		$this->ci->session->set_userdata('status_user');
		$this->ci->session->unset_userdata('level_user');
		$this->ci->session->unset_userdata('profil');
		$this->ci->session->set_flashdata('pesan', 'Berhasil LogOut!!!!');
		redirect('auth/login');
	}
}
