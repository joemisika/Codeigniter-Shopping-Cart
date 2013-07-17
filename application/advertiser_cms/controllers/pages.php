<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	var $table = 'pages';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('pages_model');
	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/pages');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();
	}
	
	public function all($start=0){
		$data['title'] = $this->config->item('sitename') . "- Admin Pages";
		$config['base_url'] = '/pages/all/';
		$config['total_rows'] =  $this->pages_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['pages'] = $this->pages_model->getall($start, $config['per_page']);
		$data["msg"] = '';
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_view', $data);
	}
	
	public function createnew(){
		$data['title'] = $this->config->item('sitename') . ' - Create New Page';
		$data["msg"]='';
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_add', $data);
	}
	
	public function savenew(){
		$title= $this->input->post('title');
		if(empty($title)){
		$data["msg"]='<div class="error">You need to provide a title for a page</div>';
		return $data;
		}
		
		$dbdata=array(
				'title' => $this->input->post('title'),
				'urlid' => generate_seo_link($this->input->post('title')),
				'body' => $this->input->post('body'),
				'createdate' => date('c')
				);
				
		$this->pages_model->savenew($this->table, $dbdata);
		$data['title'] = $this->config->item('sitename') . ' - Page added successfully!';
		$data['msg'] = '<div class="success">'.$dbdata['title'].' has been added successfully!!!</div>';
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_add', $data);
	}
	
	public function edit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Edit Page';
		$data["msg"]='';
		$data['page'] = $this->pages_model->listsingle($this->table, $id);
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_edit', $data);
	}
	
	function saveedit($id)
	{
		$data['title'] = $this->config->item('sitename') . ' - Product Edited Successfully!';
		$dbdata=array(
				'title' => $this->input->post('title'),
				'urlid' => generate_seo_link($this->input->post('title')),
				'body' => $this->input->post('body'),
				);
		$this->pages_model->saveedit($this->table, $id,$dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['title'].' has been edited successfully!!!</div>';	
		$data['page'] = $this->pages_model->listsingle($this->table, $id);
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_edit', $data);
	}
	
	public function delete($id){
		$data['title'] = $this->config->item('sitename') . ' - Delete Page';
		$this->pages_model->delete($this->table, $id);
		$start = 0;
		$data['msg'] = '<div class="success">Product has been deleted successfully</div>';
		$config['base_url'] = '/pages/all/';
		$config['total_rows'] =  $this->pagess_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['page'] = $this->pages_model->getall($start, $config['per_page']);
		$data['section_header'] = 'Pages';
		$this->load->view('pages/pages_view', $data);
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */