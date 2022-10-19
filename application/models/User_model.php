<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function get_data($table, $username, $password)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username = LOWER("'.$username.'")');
		$this->db->where('password = PASSWORD("'.$password.'")');
		$this->db->where('deleted_at IS NULL');

		return $this->db->get();
	}
	
	public function is_available($table, $username, $password)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('username = LOWER("'.$username.'")');
		$this->db->where('password = PASSWORD("'.$password.'")');
		$this->db->where('deleted_at IS NULL');

		return $this->db->get()->num_rows();
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($data, $table)
	{
		$this->db->where('id', $data['id']);
		$this->db->update($table, $data);
	}

	public function delete_data($data, $table)
	{
		$this->db->where('id', $data['id']);
		$this->db->delete($table);
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */