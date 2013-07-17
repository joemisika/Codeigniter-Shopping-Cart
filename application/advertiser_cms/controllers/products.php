<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	var $table = 'products';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('products_model');
	  $this->load->helper('urlstring');
	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/products');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();
	}
	
	public function all($start=0)
	{
		$data['title'] = $this->config->item('sitename') . "- Admin Products";
		$config['base_url'] = '/products/all/';
		$config['total_rows'] =  $this->products_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['products'] = $this->products_model->getall($start, $config['per_page']);
		$data["msg"] = '';
		$data['section_header'] = 'Products';
		$this->load->view('products/products_view', $data);
	}
	
	public function createnew(){
		$data['title'] = $this->config->item('sitename') . ' - Create New Product';
		$data["msg"]='';
		$data['categories'] = $this->products_model->getcategories();
		$data['section_header'] = 'Products';
		$this->load->view('products/products_add', $data);
	}
	
	public function savenew(){
		$name = $this->input->post('name');
		if(empty($name)){
		$data["msg"]='<div class="error">You need to provide a name for a product</div>';
		return $data;
		}
		
		$big=$this->uploads->uploadfile("uploads","file");
		if ($big["error"]) {
			$data["error"]=1;
			$data["msg"]='<div class="error">Problem uploading the main image</div>';
			return $data;
		}
		
		$small=$this->uploads->thumbuploadfile("uploads/thumbs","thumbnail");
		if ($small["error"]) {
			$data["error"]=1;
			$data["msg"]='<div class="error">Problem uploading the thumbnail image</div>';
			return $data;
		}
	
		$dbdata=array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'urlid' => generate_seo_link($this->input->post('name')),
				'description' => $this->input->post('description'),
				'mainimage' => $big['filename'],
				'thumbnail' => $small['filename'],
				'price' => $this->input->post('price'),
				'category_id' => $this->input->post('category_id'),
				'createdate' => date('c')
				);
				
		$this->products_model->savenew($this->table, $dbdata);
		$data['title'] = $this->config->item('sitename') . ' - Product added successfully!';
		$data['msg'] = '<div class="success">'.$dbdata['name'].' has been added successfully!!!</div>';
		$data['categories'] = $this->products_model->getcategories();
		$data['section_header'] = 'Products';
		$this->load->view('products/products_add', $data);
	}
	
	public function edit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Edit Product';
		$data["msg"]='';
		$data['categories'] = $this->products_model->getcategories();;
		$data['product'] = $this->products_model->listsingle($this->table, $id);
		$data['section_header'] = 'Products';
		$this->load->view('products/products_edit', $data);
	}
	
	public function saveedit($id){
		$data['title'] = $this->config->item('sitename') . ' - Product Edited Successfully!';
		
		$file = '';
 		$thumbnail='';
 		if($_FILES['file']['name'] != '') {
		$big=$this->uploads->uploadfile("uploads","file");
		if ($big["error"]) {
			$data["error"]=1;
			$data["msg"]="Problem uploading main image: ".$big["msg"];
			return $data;
		}
		$big_file = $big['filename'];
		}

		if($_FILES['thumbnail']['name'] != '') {
		$small=$this->uploads->thumbuploadfile("uploads/thumbs","thumbnail");
		if ($small["error"]) {
			$data["error"]=1;
			$data["msg"]="Problem uploading main image: ".$small["msg"];
			return $data;
		}
		$small_file = $small['filename'];
		}
		
		if((!empty($big_file)) && (!empty($small_file)))
 		{
		$dbdata=array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'urlid' => generate_seo_link($this->input->post('name')),
				'description' => $this->input->post('description'),
				'mainimage' => $big_file,
				'thumbnail' => $small_file,
				'price' => $this->input->post('price'),
				'category_id' => $this->input->post('category_id'),
				);
		}
		elseif((!empty($big_file)))
 		{
		$dbdata=array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'urlid' => generate_seo_link($this->input->post('name')),
				'description' => $this->input->post('description'),
				'mainimage' => $big_file,
				'price' => $this->input->post('price'),
				'category_id' => $this->input->post('category_id'),
				);				
						
		}
		elseif((!empty($small_file)))
 		{
 		$dbdata=array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'urlid' => generate_seo_link($this->input->post('name')),
				'description' => $this->input->post('description'),
				'thumbnail' => $small_file,
				'price' => $this->input->post('price'),
				'category_id' => $this->input->post('category_id'),
				);
						
		}
		$this->products_model->saveedit($this->table, $id,$dbdata);
		$data['msg'] = '<div class="success">'.$dbdata['name'].' has been edited successfully!!!</div>';	
		$data['categories'] = $this->products_model->getcategories();
		$data['product'] = $this->products_model->listsingle($this->table, $id);
		$data['section_header'] = 'Products';
		$this->load->view('products/products_edit', $data);
	}

	public function delete($id){
		$data['title'] = $this->config->item('sitename') . ' - Delete Product';
		$this->products_model->delete($this->table, $id);
		$start = 0;
		$data['msg'] = '<div class="success">Product has been deleted successfully</div>';
		$config['base_url'] = '/products/all/';
		$config['total_rows'] =  $this->products_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['products'] = $this->products_model->getall($start, $config['per_page']);
		$data['section_header'] = 'Products';
		$this->load->view('products/products_view', $data);
	}
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */