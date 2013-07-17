<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller {

	var $table = 'customers';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('customers_model');
	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/customers');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();	
	}
	
	public function all($start=0){
		$data['title'] = $this->config->item('sitename') . "- Admin Customers";
		
		$config['base_url'] = '/customers/all/';
		$config['total_rows'] =  $this->customers_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['customers'] = $this->customers_model->getall($start, $config['per_page']);
		$data["msg"] = '';
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_view', $data);
	}
	
	public function createnew(){
		$data['title'] = $this->config->item('sitename') . ' - Create New Customer';
		$data["msg"]='';
		$data['titles'] = $this->config->item('salute_title');
		$data['provinces'] = $this->config->item('provinces');
		$data['countries'] = $this->config->item('countries');
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_add', $data);
	}
	
	public function savenew(){
		$dbdata=array(
				'title' => $this->input->post('title'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'cellphone' => $this->input->post('cellphone'),
				'telephone' => $this->input->post('telephone'),
				'billingaddress' => $this->input->post('billingaddress'),
				'billingcode' => $this->input->post('billingcode'),
				'deliveryaddress' => $this->input->post('deliveryaddress'),
				'deliverycode' => $this->input->post('deliverycode'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'),
				'createdate' => date('c')
				);
				
		$this->customers_model->savenew($this->table, $dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['firstname'].' has been added successfully!!!</div>';
		$data['titles'] = $this->config->item('salute_title');
		$data['provinces'] = $this->config->item('provinces');
		$data['countries'] = $this->config->item('countries');
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_add', $data);
	}
	
	public function edit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Edit Post';
		$data["msg"]='';
		$data['titles'] = $this->config->item('salute_title');
		$data['provinces'] = $this->config->item('provinces');
		$data['countries'] = $this->config->item('countries');
		$data['customer'] = $this->customers_model->listsingle($this->table, $id);
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_edit', $data);
	}
	
	public function saveedit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Save Edit Post';
		$dbdata=array(
				'title' => $this->input->post('title'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'cellphone' => $this->input->post('cellphone'),
				'telephone' => $this->input->post('telephone'),
				'billingaddress' => $this->input->post('billingaddress'),
				'billingcode' => $this->input->post('billingcode'),
				'deliveryaddress' => $this->input->post('deliveryaddress'),
				'deliverycode' => $this->input->post('deliverycode'),
				'city' => $this->input->post('city'),
				'province' => $this->input->post('province'),
				'country' => $this->input->post('country'));		
		$this->customers_model->saveedit($this->table, $id,$dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['firstname'].' has been edited successfully!!!</div>';	
		$data['customer'] = $this->customers_model->listsingle($this->table,$id);
		$data['titles'] = $this->config->item('salute_title');
		$data['provinces'] = $this->config->item('provinces');
		$data['countries'] = $this->config->item('countries');
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_edit', $data);
	}
	
	public function delete($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Delete Customer';
		$this->customers_model->delete($this->table, $id);
		$start = 0;
		$data['msg'] = '<div class="success">Customer has been deleted successfully</div>';
		$config['base_url'] = '/customers/all/';
		$config['total_rows'] =  $this->customers_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['customers'] = $this->customers_model->getall($start, $config['per_page']);
		$data['section_header'] = 'Customers';
		$this->load->view('customers/customers_view', $data);
	}
	
	public function search(){
	
	}
}

/* End of file customers.php */
/* Location: ./application/controllers/customers.php */