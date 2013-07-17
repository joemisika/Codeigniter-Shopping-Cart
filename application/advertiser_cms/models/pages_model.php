<?php
class Pages_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('pages.*');
		$this->db->from('pages');
		//$this->db->where('');
		$this->db->order_by('pages.id', 'desc');
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('pages');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function getparent_pages(){
		$this->db->select('id, category');
		$this->db->from('pages');
		$this->db->where('parent_id', 0);
		$query = $this->db->get();
		return $query->result();
	}
}