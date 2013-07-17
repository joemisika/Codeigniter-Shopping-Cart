<?php
class users_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('users.*');
		$this->db->from('users');
		//$this->db->where('');
		$this->db->order_by('users.id', 'desc');
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('users');
		$query = $this->db->get();
		return $query->row()->count;
	}
}