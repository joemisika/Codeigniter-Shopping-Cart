<?php
class Customers_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('customers.*');
		$this->db->from('customers');
		$this->db->order_by('customers.id', 'desc');
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('customers');
		$query = $this->db->get();
		return $query->row()->count;
	}
}