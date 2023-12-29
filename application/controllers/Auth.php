<?php



defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	// List all your items
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'username' => '%s Mohon Untuk Diisi',
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'password' => '%s Mohon Untuk Diisi',
		));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->login_user->login($username, $password);
		}
		$data = array(
			'title' => 'Login Sistem'
		);
		$this->load->view('v_login', $data, FALSE);
	}

	public function search_username()
	{
		$data['title'] = 'GRIYA FROZEN FOOD';
		$data['keyword'] = $this->input->get('keyword');
		$this->load->model('m_auth');
		$data['search_result'] = $this->m_auth->search($data['keyword']);
		$this->load->view('v_lupa_password', $data);
	}

	public function reset($id_user = NULL)
	{
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]||regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]', array(
			'required' => '%s Mohon untuk diisi!!!',
			'min_length' => '%s Password Minimal 8',
			'regex_match' => '%s Password Harus Gabungan Huruf Besar, Angka Dan Hurup Kecil'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'matches' => '%s Password Tidak Sama !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Reset Password',
				'user' => $this->m_auth->detail($id_user),
			);
			$this->load->view('v_reset', $data, FALSE);
		} else {
			$data = array(
				'id_user' => $id_user,
				'password' => $this->input->post('password'),
			);
			$this->m_auth->reset($data);
			$this->session->set_flashdata('pesan', 'Password Berhasil Direset!!!');
			redirect('auth/login');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required', array('required' => '%s Mohon Untuk Diisi!!!'));
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]', array(
			'required' => '%s Mohon Untuk Diisi!!!',
			'is_unique' => '%s Username sudah ada!!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]', array(
			'required' => '%s Mohon Untuk Diisi!!!',
			'min_length' => '%s Password Minimal 8 karakter!!!',
			'regex_match' => '%s Password Harus Gabungan Huruf Besar, Hurup Kecil, Angka dan Karakter Khusus'
		));
		$this->form_validation->set_rules('ulangi_password', 'Ulangi Password Pelanggan', 'required|matches[password]', array(
			'required' => '%s Mohon Untuk Diisi !!!',
			'matches' => '%s Password Tidak Sama !!!'
		));


		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Registrasi supplier',
			);
			$this->load->view('v_register', $data, FALSE);
		} else {
			$data = array(
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_user' => '3',
				'status_user' => '1',
			);
			$this->m_auth->register($data);
			$this->session->set_flashdata('pesan', 'Registrasi berhasil');
			redirect('auth/login');
		}
	}

	public function logout()
	{
		$this->login_user->logout();
	}
}

/* End of file Auth.php */
