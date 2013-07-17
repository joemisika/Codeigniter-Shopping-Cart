<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  //load the client library that we added as helper
	  $this->load->model(array('products_model', 'menu_model', 'accounts_model'));
	  $this->output->enable_profiler(false);
	}
	
	function index(){
		$this->all();
	}
	function all($start=0)
	{
		$data['title'] = 'Products - '.$this->config->item('sitename');
		$data['menu'] = $this->menu_model->generate_menu();
		$data['section_name'] = 'Products';
		$config['base_url'] = '/products/all/';
		$config['total_rows'] =  $this->products_model->countall();
		$config['per_page'] = '12';
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();
		$data['products'] = $this->products_model->getall($start, $config['per_page']);
		
		$data['categories'] = $this->products_model->getallcategories();
		$this->load->view('products/products_view', $data);
	}
	
	function product($urlid, $id, $code)
	{
		$data['menu'] = $this->menu_model->generate_menu();
		$data['product'] = $this->products_model->findone($id);
		$name = $data['product']->name;
		$data['title'] = $name .' - '.$this->config->item('sitename');
		$data['section_name'] = 'Products';
		$data['categories'] = $this->products_model->getallcategories();
		$this->load->view('products/product_view', $data);
	}
	
	function category($category, $start=0)
	{
		$data['menu'] = $this->menu_model->generate_menu();
// 		$data['products'] = $this->products_model->getbycategory($category);
		
		$data['section_name'] = 'Products';
		$config['base_url'] = '/products/category/'.$category.'/';
		$config['total_rows'] =  $this->products_model->getcount_by_category($category);
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();
		
		$data['products'] = $this->products_model->getproduct_by_category($start, $config['per_page'], $category);

		//print_r($data['products']);

		$name = $data['products']['0']->category;
		$data['title'] = $name .' - '.$this->config->item('sitename');
		$data['section_name'] = $data['products']['0']->category;
		$data['categories'] = $this->products_model->getallcategories();
		$this->load->view('products/products_view', $data);
	
	}
	
	function addtocart($id='')
	{
 		$data['title'] = 'My Cart/Basket - '.$this->config->item("sitename");
		$data['msg'] = '';
		$data['menu'] = $this->menu_model->generate_menu();
		$product = $this->products_model->findone(intval($id));
		if(!$product)
		{
			$data['section_name'] = 'Cart Error';
			$data['msg'] = 'Oops, no matching product exists in our store! It may have been deleted or moved. Please <a href="/products/">browse the products</a> and choose a different product.';
			$this->load->view('products/error_view', $data);
		}else{
			$add_to_cart = array('id' => $product->id,'code'=>$product->code,'qty'=> 1, 'price'=> $product->price, 'name'=> $product->name);
			$this->cart->insert($add_to_cart);
			$this->load->view('products/cart_view', $data);
		}
	}
	
	function cart()
	{
		$data['title'] = 'My Cart - '.$this->config->item("sitename");
		$data['msg'] = '';
		//$data['menu'] = $this->menu_model->generate_menu();
		//$this->load->view('products/cart_view', $data);
		if(!$this->session->userdata('user_id')) 
		{
			
			$data['menu'] = $this->menu_model->generate_menu();
			
			switch($this->products_model->cart_empty())
			{
				case true:
					$this->load->view('products/cart_empty', $data);
				break;
				
				default:
					$this->load->view('products/cart_view', $data);
				break;
			}
		}
		else
		{
			$data['menu'] = $this->menu_model->generate_menu();
			
			switch($this->products_model->cart_empty())
			{
				case true:
					$this->load->view('products/cart_empty', $data);
				break;
				
				default:
					$this->load->view('products/cart_view', $data);
				break;
		}	
	}
		
		
		
	}
	
	function empty_cart()
	{
		$data['msg'] = '';
		$this->cart->destroy();
		$data['title'] = 'Empty Cart - '.$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$this->load->view('products/cart_empty', $data);
	}
	
	function remove_from_cart($id)
	{
		$data['msg'] = '';
		$data['title'] = 'My Cart - '.$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();

		if($id)
		{
			$this->products_model->remove_from_cart($id);
		}
		switch($this->products_model->cart_empty())
		{
			case true:
				$this->load->view('products/cart_empty', $data);
			break;
			
			default:
				$this->load->view('products/cart_view', $data);
			break;
		}
	}
	
	function update_cart()
	{
		$data['msg'] = '';
		$data['title'] = 'My Cart - '.$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$form_submitted = count($_POST);
		switch($form_submitted)
		{
			case 0:
				$this->load->view('products/cart_view', $data);
			break;
			
			default:
				unset($_POST['btn_update']);
				foreach($_POST as $key => $value) 
				{
					if(is_array($value))
					{
						$this->products_model->update_qty_in_cart($value);
					}
				}
				$this->load->view('products/cart_view', $data);
			break;
		}
	}
	
}

/* End of file products.php */
/* Location: ./application/controllers/products.php */