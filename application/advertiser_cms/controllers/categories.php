<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	var $table = 'categories';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('categories_model');
	  $this->output->enable_profiler(false);

		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/categories');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();
	}
	
	public function all($start=0){
		$data['title'] = $this->config->item('sitename') . "- Admin categories";
		$config['base_url'] = '/categories/all/';
		$config['total_rows'] =  $this->categories_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['categories'] = $this->categories_model->getall($start, $config['per_page']);
		$data["msg"] = '';
		$data['section_header'] = 'Categories';
		$this->load->view('categories/categories_view', $data);
	}
	
	public function createnew(){
		$data['title'] = $this->config->item('sitename') . ' - Create New Customer';
		$data["msg"]='';
		$data['parents'] = $this->categories_model->getparent_categories();
		$data['section_header'] = 'Categories';
		$this->load->view('categories/categories_add', $data);
	}
	
	public function savenew(){
		$dbdata=array(
				'category' => $this->input->post('category'),
				'urlid' => generate_seo_link($this->input->post('category')),
				'parent_id' => $this->input->post('parent_id'),
				'createdate' => date('c')
				);
		$data['parents'] = $this->categories_model->getparent_categories();		
		$this->categories_model->savenew($this->table, $dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['category'].' has been added successfully!!!</div>';
		$data['section_header'] = 'Categories';
		$data['title'] = $this->config->item('sitename') . ' - Customer Created Successfully';
		$this->load->view('categories/categories_add', $data);
	}
	
	public function edit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Edit Post';
		$data["msg"]='';
		$data['parents'] = $this->categories_model->getparent_categories();
		$data['category'] = $this->categories_model->listsingle($this->table, $id);
		$data['section_header'] = 'Categories';
		$this->load->view('categories/categories_edit', $data);
	}
	
	public function saveedit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Save Edit Post';
		$dbdata=array(
				'category' => $this->input->post('category'),
				'urlid' => generate_seo_link($this->input->post('category')),
				'parent_id' => $this->input->post('parent_id'));		
		$this->categories_model->saveedit($this->table, $id,$dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['category'].' has been edited successfully!!!</div>';	
		$data['category'] = $this->categories_model->listsingle($this->table, $id);
		$data['parents'] = $this->categories_model->getparent_categories();
		$data['section_header'] = 'Categories';
		$this->load->view('categories/categories_edit', $data);
	}
	
	public function delete($id){
		$data['title'] = $this->config->item('sitename') . ' - The categories Delete';
		$this->categories_model->delete($this->table, $id);
		$start = 0;
		$data['msg'] = '<div class="success">category has been deleted successfully</div>';
		$config['base_url'] = '/categories/all/';
		$config['total_rows'] =  $this->categories_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['categories'] = $this->categories_model->getall($start, $config['per_page']);
		$data['section_header'] = 'Categories';
		$this->load->view('categories/categories_view', $data);
	}
	
	public function search(){
	
	}
}

/* End of file categories.php */
/* Location: ./application/controllers/categories.php */