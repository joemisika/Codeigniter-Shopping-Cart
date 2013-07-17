<?php
class Home_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getall($num){
		$this->db->select('products.*');
		$this->db->from('products');
		$this->db->order_by('products.id', 'desc');
		$this->db->limit($num);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getallcategories(){
		$this->db->select('categories.*');
		$this->db->from('categories');
		$this->db->order_by('categories.id', 'desc');
		//$this->db->limit($page,$start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function getproduct_categories()
	{
	$this->db->select('categories.id, categories.category, categories.urlid, categories.parent_id, products.id, products.code, products.name, products.mainimage, products.thumbnail, products.price, products.category_id');
	$this->db->from('products');
	$this->db->join('categories', 'categories.id = products.category_id');
	$this->db->where('categories.parent_id', 0);
	$this->db->order_by('categories.id');
	$query = $this->db->get();
	return $query->result();
	}
	
	
}