<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kelola Akun',
			'akuns' => $this->m_user->user(),
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/akun/v_akun'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('level_user', 'Level User', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/profil';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "profil";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah data Akun',
					'akun' => $this->m_user->akun(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'pimpinan/akun/v_add'
				);
				$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/profil' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_user' => $this->input->post('nama_user'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'level_user' => $this->input->post('level_user'),
					'status_user' =>  1,
					'profil' => $upload_data['uploads']['file_name'],
				);
				$this->m_user->add($data);
				$this->session->set_flashdata('pesan', 'Data akun berhasil ditambahkan');
				redirect('akun');
			}
		}
		$data = array(
			'title' => 'Tambah data akun',
			'akun' => $this->m_user->akun(),
			'isi' => 'pimpinan/akun/v_add'
		);
		$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
	}
	public function update($id_user = NULL)
	{
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('username', 'Username', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('level_user', 'Level User', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/profil';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "profil";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update data akun',
					'akun' => $this->m_user->akun(),
					'details' => $this->m_user->details($id_user),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'pimpinan/akun/v_edit'
				);
				$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$produk = $this->m_user->details($id_user);
				if ($produk->gambar !== "") {
					unlink('./assets/profil/' . $produk->profil);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/profil' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_user' => $id_user,
					'nama_user' => $this->input->post('nama_user'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'level_user' => $this->input->post('level_user'),
					'status_user' => 1,
					'profil' => $upload_data['uploads']['file_name'],
				);
				$this->m_user->update($data);
				$this->session->set_flashdata('pesan', 'Data akun berhasil diupdate');
				redirect('akun');
			}
			$data = array(
				'id_user' => $id_user,
				'nama_user' => $this->input->post('nama_user'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'level_user' => $this->input->post('level_user'),
				'status_user' => 1,
			);
			$this->m_user->update($data);
			$this->session->set_flashdata('pesan', 'Data akun berhasil diupdate');
			redirect('akun');
		} else {
			$data = array(
				'title' => 'Update data akun',
				'akun' => $this->m_user->akun(),
				'details' => $this->m_user->details($id_user),
				'isi' => 'pimpinan/akun/v_edit'
			);
			$this->load->view('pimpinan/layout/v_wrapper', $data, FALSE);
		}
	}

	public function delete($id_user = null)
	{
		$akun = $this->m_user->details($id_user);
		if ($akun->profil !== "") {
			unlink('./assets/profil/' . $akun->profil);
		}

		$data = array(
			'id_user' => $id_user,
		);
		$this->m_user->delete($data);
		$this->session->set_flashdata('pesan', 'Barang berhasil dihapus!!!');
		redirect('akun');
	}
}

/* End of file kontrol_barang.php */
