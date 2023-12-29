<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function login_user($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username' => $username, 'password' => $password));
		return $this->db->get()->row();
	}

	public function search($keyword)
	{
		if (!$keyword) {
			return null;
		}
		$this->db->select('*');
		$this->db->from('user');

		$this->db->like('username', $keyword);
		$this->db->or_like('nama_user', $keyword);
		// $query = $this->db->get($this->user);
		// return $query->result();
		return $this->db->get()->result();
	}

	public function detail($id_user = null)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		return $this->db->get()->row();
	}

	public function reset($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	public function register($data)
	{
		$this->db->insert('user', $data);
	}
}
