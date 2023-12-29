<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
	// List all your items
	public function user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}
	public function akun()
	{
		$id = $this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user= ', $id);
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}
	// List all your items
	public function user_supplier()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level_user=3');
		$this->db->order_by('id_user', 'desc');
		return $this->db->get()->result();
	}

	public function details($id_user = null)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->row();
	}

	// Add a new item
	public function add($data)
	{
		$this->db->insert('user', $data);
	}

	//Update one item
	public function update($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	//Delete one item
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}
}

/* End of file M_user.php */
