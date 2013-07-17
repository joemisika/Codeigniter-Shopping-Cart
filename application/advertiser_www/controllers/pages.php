<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $this->load->model(array('pages_model', 'menu_model'));
	  $this->output->enable_profiler(false);
	}
	
	function _remap($urlid)
	{
		$data['pages'] = $this->pages_model->getpages($urlid);
		$data['menu'] = $this->menu_model->generate_menu();
 		$data['section_name'] = $data['pages']->title;
 		$data['title'] = $data['pages']->title.' - '.$this->config->item("sitename");
 		$this->load->view('pages/pages_view', $data);
	}
	
}