<?php
class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function login($username, $password)
	{
       		$this->db->select('users.id, users.firstname, users.lastname');
       		$this->db->from('users');
       		$this->db->where('username',$username);
       		$this->db->where('password',$password);
       		$query = $this->db->get();
       		return $query->row();	
	}
}