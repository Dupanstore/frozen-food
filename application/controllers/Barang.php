<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_user');
		$this->load->model('m_kategori');
	}

	// List all your items
	public function index()
	{
		$data = array(
			'title' => 'Kelola Barang Masuk',
			'barang' => $this->m_barang->barang(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/barang/v_barang'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_user', 'Supplier Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Tambah data barang',
					'user' => $this->m_user->user_supplier(),
					'akun' => $this->m_user->akun(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'gudang/barang/v_add'
				);
				$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_user' => $this->input->post('id_user'),
					'stock' => $this->input->post('stock'),
					'harga' =>  $this->input->post('harga'),
					'satuan' =>  $this->input->post('satuan'),
					// 'status_barang' => 'belum acc',
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->add($data);
				$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
				redirect('barang');
			}
		}
		$data = array(
			'title' => 'Tambah data barang',
			'akun' => $this->m_user->akun(),
			'user' => $this->m_user->user_supplier(),
			'isi' => 'gudang/barang/v_add'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}
	public function update($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('id_user', 'Supplier Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stock', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '5000';
			$this->upload->initialize($config);
			$field_name = "gambar";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'title' => 'Update data barang',
					'user' => $this->m_user->user_supplier(),
					'akun' => $this->m_user->akun(),
					'details' => $this->m_barang->details($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'gudang/barang/v_edit'
				);
				$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
			} else {
				//hapus gambar di folder
				$produk = $this->m_barang->details($id_barang);
				if ($produk->gambar !== "") {
					unlink('./assets/barang/' . $produk->gambar);
				}
				//end
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_user' => $this->input->post('id_user'),
					'stock' => $this->input->post('stock'),
					'harga' => $this->input->post('harga'),
					'satuan' => $this->input->post('satuan'),
					// 'status_barang' => 'belum acc',
					'deskripsi' => $this->input->post('deskripsi'),
					'gambar' => $upload_data['uploads']['file_name'],
				);
				$this->m_barang->update($data);
				$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
				redirect('barang');
			}
			$data = array(
				'id_barang' => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_user' => $this->input->post('id_user'),
				'stock' => $this->input->post('stock'),
				'harga' => $this->input->post('harga'),
				'satuan' => $this->input->post('satuan'),
				// 'status_barang' => 'belum acc',
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->update($data);
			$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
			redirect('barang');
		} else {
			$data = array(
				'title' => 'Tambah data barang',
				'akun' => $this->m_user->akun(),
				'user' => $this->m_user->user_supplier(),
				'details' => $this->m_barang->details($id_barang),
				'isi' => 'gudang/barang/v_edit'
			);
			$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
		}
	}

	public function delete($id_barang = null)
	{
		$barang = $this->m_barang->details($id_barang);
		if ($barang->gambar !== "") {
			unlink('./assets/gambar/' . $barang->gambar);
		}

		$data = array(
			'id_barang' => $id_barang,
		);
		$this->m_barang->delete($data);
		$this->session->set_flashdata('pesan', 'Barang berhasil dihapus!!!');
		redirect('barang');
	}

	// MINIMAL BARANG 
	public function minimal()
	{
		$data = array(
			'title' => 'Kelola Safty Stock',
			'barang' => $this->m_barang->barang_minimal(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/barang_minimal/v_barang'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function add_minimal()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stok', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Tambah Sefty Stock barang',
				'akun' => $this->m_user->akun(),
				'isi' => 'gudang/barang_minimal/v_add'
			);
			$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->add_mimal($data);
			$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
			redirect('barang/minimal');
		}
		$data = array(
			'title' => 'Tambah Sefty Stock barang',
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/barang_minimal/v_add'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}
	public function update_minimal($id_barang_minimal = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('stok', 'Stock Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('satuan', 'Satuan Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));
		$this->form_validation->set_rules('harga', 'Harga Barang', 'required', array('required' => '%s Mohon untuk diisi!!!'));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'title' => 'Update Sefty Stock barang',
				'akun' => $this->m_user->akun(),
				'details' => $this->m_barang->details_minimal($id_barang_minimal),
				'isi' => 'gudang/barang_minimal/v_edit'
			);
			$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
		} else {
			$data = array(
				'id_barang_minimal' => $id_barang_minimal,
				'nama_barang' => $this->input->post('nama_barang'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'satuan' => $this->input->post('satuan'),
				'deskripsi' => $this->input->post('deskripsi'),
			);
			$this->m_barang->update_minimal($data);
			$this->session->set_flashdata('pesan', 'Data barang berhasil ditambahkan');
			redirect('barang/minimal');
		}
		$data = array(
			'title' => 'Update Sefty Stock barang',
			'akun' => $this->m_user->akun(),
			'details' => $this->m_barang->details_minimal($id_barang_minimal),
			'isi' => 'gudang/barang_minimal/v_edit'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function delete_minimal($id_barang_minimal = null)
	{
		$data = array(
			'id_barang_minimal' => $id_barang_minimal,
		);
		$this->m_barang->delete_minimal($data);
		$this->session->set_flashdata('pesan', 'Barang berhasil dihapus!!!');
		redirect('barang/minimal');
	}

	// RETURN BARANG 
	public function return()
	{
		$data = array(
			'title' => 'Return Barang',
			'barang' => $this->m_barang->barang_return(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/return/v_return'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}

	public function add_return()
	{
		$data = array(
			'id_barang' => $this->input->post('id_barang'),
			'nama_user' => $this->input->post('nama_user'),
			'jml' => $this->input->post('jml'),
			'satuan_return' => $this->input->post('satuan_return'),
			'alasan_return' => $this->input->post('alasan_return'),
			'status_return' => 0,
			'no_return' => $this->input->post('no_return'),
			'tgl_return' => date('Y-m-d'),
		);
		$this->m_barang->add_return($data);
		$this->session->set_flashdata('pesan', 'Barang berhasil ajukan return');
		redirect('barang/return');
	}
	public function update_return($id_return = NULL)
	{
		$data = array(
			'id_return' => $id_return,
			'id_barang' => $this->input->post('id_barang'),
			'nama_user' => $this->input->post('nama_user'),
			'jml' => $this->input->post('jml'),
			'alasan_return' => $this->input->post('alasan_return'),
			'status_return' => 0,
			'no_return' => $this->input->post('no_return'),
			'tgl_return' => date('Y-m-d'),
		);
		$this->m_barang->update_return($data);
		$this->session->set_flashdata('pesan', 'Data return berhasil diupdate');
		redirect('barang/return');
	}

	public function delete_return($id_return = null)
	{
		$data = array(
			'id_return' => $id_return,
		);
		$this->m_barang->delete_return($data);
		$this->session->set_flashdata('pesan', 'Return berhasil dihapus!!!');
		redirect('barang/return');
	}

	// MENU KASIR
	public function kasir()
	{
		$data = array(
			'title' => 'Kasir',
			'barang' => $this->m_barang->barang_transaksi(),
			'transaksi' => $this->m_barang->transaksi(),
			'akun' => $this->m_user->akun(),
			'isi' => 'gudang/kasir/v_kasir'
		);
		$this->load->view('gudang/layout/v_wrapper', $data, FALSE);
	}
}

/* End of file kontrol_barang.php */
