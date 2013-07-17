<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	 
	  $this->load->model(array('products_model', 'menu_model', 'orders_model', 'accounts_model'));
	  $this->load->library('html2pdf');
	  $this->output->enable_profiler(false);
	}
	
	function index(){
		redirect('/', 'refresh');
	}
	
	function placeOrder(){

		$thecustomer_id = $this->session->userdata('theid');
		$customer = $this->getcustomer($thecustomer_id);
		foreach($customer as $customer){
		$data['customer_company'] = $customer->company;
		$data['customer_vat'] = $customer->vatno;
		$data['customer_name'] = $customer->firstname .' '. $customer->lastname;
		$data['customer_cell'] = $customer->cellphone;
		$data['customer_tel'] = $customer->telephone;
		$data['customer_email'] = $customer->email;
		$data['customer_address'] = $customer->deliveryaddress;
		$data['customer_code'] = $customer->deliverycode;
		$data['customer_city'] = $customer->city;
		$data['customer_province'] = $customer->province;
		$data['customer_country'] = $customer->country;
		}
		
		$the_total = $this->cart->format_number($this->cart->total());
		$the_vat = $this->cart->format_number((0.14 * $this->cart->total()));
		$grand_total = ($the_total + $the_vat);
		$order_status = 'Order placed successfully';
		
// 		$padded_id = str_pad($order_id, 6, '0', STR_PAD_LEFT);
// 		$the_star = $this->session->userdata('user_id').'-'.$padded_id;
// 		$data['order_no'] = $padded_id;
		
		//save to the order table
		//$thevat, $thetotal
		$order_id = $this->orders_model->save_order($thecustomer_id, $order_status, $the_total, $the_vat, $grand_total);
		$this->session->set_userdata('orderno', $order_id);
		//save to the order_details table
		$order_items = $this->orders_model->save_order_details($order_id);
		
		$padded_id = str_pad($order_id, 6, '0', STR_PAD_LEFT);
		$the_star = $this->session->userdata('user_id').'-'.$padded_id;
		$data['order_no'] = $padded_id;
		
		$this->orders_model->update_order($the_star, $order_id);
		
		$filename = $the_star.'.pdf';
		$path = realpath('.') . '/statements/orders/';
		
		$this->load->library('html2pdf');
		$this->html2pdf->folder($path);
	    	$this->html2pdf->filename($filename);
	    	$this->html2pdf->paper('a4', 'portrait');
	    	$this->html2pdf->html($this->load->view('receipts/order', $data, true));
	    	$this->html2pdf->create('save');
	    	
		if($path = $this->html2pdf->create('save')) 
		{
			$this->load->library('email');
		    	$this->email->from('ezinhle@ezinhle.com', 'Ezinhle Events');
		    	$this->email->to($data['customer_email']);
		    	$this->email->subject('Your Order Ref: '. $the_star . ' confirmation from'.$this->config->item("sitename"));
			$message = "Dear ". $data['customer_name'] ."\r\n\r\n";
			$message.="Please find attached your order in PDF format from ".$this->config->item("sitename")."\r\n\r\n"; 
			$message.="Should you require anymore assistance, please contact us at email@email.com.\r\n\r\nRegards,\r\n";
			$message.="The Website Team\r\n\r\nhttp://sitename.com";
		    	$this->email->message($message);   
		    	$this->email->attach($path);
		    	$this->email->send();
		}
		redirect("orders/thankyou");
	}
	
	function thankyou()
	{
		$data['title'] = "Your order is complete -".$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$this->cart->destroy();
		$this->load->view('orders/thankyou_view', $data);
	}
	
	function getcustomer($customer_id)
	{
		$data['thecustomer'] = $this->orders_model->getcustomer($customer_id);
		return $data;
	}
	
	function cancelOrder()
	{
		$this->cart->destroy();
		$data['title'] = $this->config->item("sitename"). ' - Cancel Order';
		$data['menu'] = $this->menu_model->generate_menu();
		$this->load->view('orders/order_cancelled', $data);
	}
	
	function checkout()
	{
		if(!$this->accounts_model->account_in_use())
		{
			$this->session->set_userdata("redirect_to", '/orders/checkout/');
			redirect("/accounts/login/");
		}else{
			if($this->products_model->cart_empty())
			{
				redirect("/products/cart");
			}
			else
			{
				$data['msg'] = '';
				$data['title'] = 'Checkout your order - '.$this->config->item("sitename");
				$data['menu'] = $this->menu_model->generate_menu();
				$thecustomer_id = $this->session->userdata('theid');
				$customer = $this->getcustomer($thecustomer_id);
				foreach ($customer as $customer)
				{
					$data['customer_company'] = $customer->company;
					$data['customer_vat'] = $customer->vatno;
					$data['customer_name'] = $customer->firstname .' '. $customer->lastname;
					$data['customer_cell'] = $customer->cellphone;
					$data['customer_tel'] = $customer->telephone;
					$data['customer_email'] = $customer->email;
					$data['customer_address'] = $customer->deliveryaddress;
					$data['customer_code'] = $customer->deliverycode;
				}
				$this->load->view('orders/checkout', $data);
			}
		}
	}
}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */