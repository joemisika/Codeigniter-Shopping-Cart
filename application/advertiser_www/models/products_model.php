<?php
class Products_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('products.*');
		$this->db->from('products');
		$this->db->order_by('products.id', 'desc');
		$this->db->limit($page,$start);
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
	
	function getproduct_by_category($start, $page, $category){
		$this->db->select('products.*, categories.*');
		$this->db->from('categories');
		$this->db->where('categories.urlid', $category);
		$this->db->join('products','categories.id = products.category_id');
		$this->db->order_by('products.id', 'desc');
		$this->db->limit($page,$start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function getcount_by_category($category){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('products');
		$this->db->where('categories.urlid', $category);
		$this->db->join('categories','categories.id = products.category_id');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function findone($id) 
	{
		$query = $this->db->get_where('products', array('id' => $id), 1);
		if($query->num_rows() !== 1)
		{
			return false;
		}else{
			return $query->row();
		}
	}
	
	function remove_from_cart($product) 
	{
		$remove = array('rowid' => $product, 'qty' => 0);
		$this->cart->update($remove);		
	}
	
	function cart_empty() 
	{
		if($this->cart->total_items() > 0)
		{
			return false;
		}else{
			return true;
		}
	}
	
	function update_qty_in_cart($product) 
	{
		$item_qty['rowid'] = '';
		$item_qty['qty'] = 0;
		foreach($product as $i => $j) 
		{
			if($i == 'rowid')
			{
				$item_qty['rowid'] = $j;
			}
			if($i == 'qty')
			{
				$item_qty['qty'] = $j;
			}
			if($item_qty['rowid'] !== '' && $item_qty['qty'] !== 0)
			{
				$this->cart->update($item_qty); 
			}
		}
	}
	
}