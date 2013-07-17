<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
	  parent::__construct();

	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			redirect('/login');
		}
	}
	
	public function index()
	{
		$data['title'] = $this->config->item('sitename') . "- Admin Home";
		$this->load->view('admin_view', $data);
	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */