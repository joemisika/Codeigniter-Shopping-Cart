<?php
class Orders_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function getall($start, $page){
		$this->db->select('orders.id as theOrder, orders.order_ref, orders.created_at, orders.total, orders.vat_total, orders.grand_total, customers.*, order_details.*, products.*');
		$this->db->from('orders');
		$this->db->join('customers', 'customers.id = orders.customer_id');
		$this->db->join('order_details', 'order_details.order_id = orders.id');
		$this->db->join('products', 'products.id = order_details.product_id');
		//$this->db->where('');
		$this->db->order_by('orders.id', 'desc');
		
		$this->db->limit($page, $start);
		$query = $this->db->get();
		return $query->result();	
	}
	
	function countall(){
		$this->db->select('COUNT(*) AS count');
		$this->db->from('orders');
		$query = $this->db->get();
		return $query->row()->count;
	}
	
	function getOrder($order_id)
	{
		$this->db->select('customers.*, orders.*');
		$this->db->from('orders');
		$this->db->join('customers', 'customers.id = orders.customer_id');
		$this->db->where('orders.id', $order_id);
		//$this->db->order_by('order_details.id', 'asc');
		$query = $this->db->get();
		return $query->row();
		
	}
	
	function getOrder_products($order_id){
		$this->db->select('products.*, order_details.*');
		$this->db->from('products');
		$this->db->join('order_details', 'products.id = order_details.product_id');
		$this->db->where('order_details.order_id', $order_id);
		$this->db->order_by('order_details.id', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
	
}