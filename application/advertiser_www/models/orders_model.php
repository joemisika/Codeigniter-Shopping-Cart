<?php
class Orders_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getcustomer($id)
	{
		$query = $this->db->get_where('customers', array('id' => $id), 1);
		return $query->row();
	}
	
	function save_order($thecustomer_id, $order_status, $the_total, $the_vat, $grand_total)
	{
		$this->db->insert("orders",array("customer_id"=>$thecustomer_id, "order_status"=>$order_status, "vat_total"=>$the_vat, "total"=>$the_total, "grand_total"=>$grand_total, "updated_at"=>date("c")));
		return $this->db->insert_id();
	}
	
	function update_order($the_star, $order_id)
	{
		$this->db->update('orders', array("order_ref"=>$the_star), array('id' => $order_id));
		return true;
	}
		
	function save_order_details($order)
	{
		if(!$order)
		{
			return false;
		}else{
			foreach($this->cart->contents() as $items)
			{
				$query = $this->db->get_where('products', array('name' => $items['name']), 1);
				if($query->num_rows() !== 1)
				{
					return false;
				}else{
					foreach($query->result() as $product)
					{
						$line_item = array('order_id' => $order, 'product_id' => $product->id, 'quantity' => $items['qty'], 'code' => $items['code'], 'price' => $items['price'], 'subtotal' => $items['subtotal'], "date_updated"=>date("c"));
						$this->db->insert('order_details', $line_item);
					}
				}
			}
			return true;
		}
	}
	
}