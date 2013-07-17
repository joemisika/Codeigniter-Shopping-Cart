<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  
	  $this->load->model(array('home_model', 'menu_model'));
	  $this->output->enable_profiler(false);
	}
	
	
	function index()
	{
		$data['title'] = $this->config->item('sitename');
		$data['menu'] = $this->menu_model->generate_menu();
		$data['products'] = $this->home_model->getall(8);
		$data['categories'] = $this->home_model->getallcategories();
		$this->load->view('home/home_view', $data);
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */