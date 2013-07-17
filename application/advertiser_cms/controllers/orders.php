<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orders extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $this->load->model('orders_model');
	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/orders');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();
	}
	
	public function all($start=0){
		$data['title'] = $this->config->item('sitename') . "- Admin Orders";
		$config['base_url'] = '/orders/all/';
		$config['total_rows'] =  $this->orders_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['orders'] = $this->orders_model->getall($start, $config['per_page']);
		//print_r($data['orders']);
		$data["msg"] = '';
		$data['section_header'] = 'Orders';
		$this->load->view('orders/orders_view', $data);
	}
	
	function view_order($order_id)
	{
		$data['order'] = $this->orders_model->getOrder($order_id);
		$data['order_products'] = $this->orders_model->getOrder_products($order_id);
		$this->load->view('orders/view_order', $data);
	}
}

/* End of file orders.php */
/* Location: ./application/controllers/orders.php */