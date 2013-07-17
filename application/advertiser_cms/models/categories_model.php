<?php
class Categories_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('categories.*');
		$this->db->from('categories');
		//$this->db->where('');
		$this->db->order_by('categories.id', 'desc');
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('categories');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function getparent_categories(){
		$this->db->select('id, category');
		$this->db->from('categories');
		$this->db->where('parent_id', 0);
		$query = $this->db->get();
		return $query->result();
	}
}