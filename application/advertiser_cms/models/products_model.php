<?php
class Products_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('products.*');
		$this->db->from('products');
		//$this->db->where('');
		$this->db->order_by('products.id', 'desc');
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function getcategories(){
		$this->db->select('id, category');
		$query = $this->db->get('categories');
		return $query->result();
	}
}