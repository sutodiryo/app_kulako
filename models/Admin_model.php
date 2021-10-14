<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function add($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function add_produk($data)
	{
		return $this->db->insert('produk', $data);
	}

	public function update($table, $where, $data)
	{
		$this->db->update($table, $data, $where);
	}

	public function del($where, $table)
	{
		return $this->db->delete($table, $where);
	}
}
