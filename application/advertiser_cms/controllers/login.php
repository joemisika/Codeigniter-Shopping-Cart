<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $this->load->model('login_model');
	  $this->output->enable_profiler(false);
	}
	
	
	public function index()
	{
		$data['title'] = $this->config->item('sitename');
		$this->load->view('login_view', $data);
	}
	
	function process_login(){
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		if (empty($username) || empty($password)) {
			redirect("/login");
		}
		$login = $this->login_model->login($username,$password);
	
		if (empty($login->id)) {
			redirect('/login');
		}
		$newdata = array(
			'admin_id' => $login->id,
			'firstname' => $login->firstname,
			'lastname' => $login->lastname
		);
		$this->session->set_userdata($newdata);	
		
		if($this->session->userdata('redirect_to')) {
			$redirect_to = $this->session->userdata('redirect_to');
			redirect($redirect_to);
		} else {
			redirect('/admin');
		}
	}
	 
	function logout(){
    	$this->session->unset_userdata(array("id"=>"","firstname"=>"","lastname"=>""));
	$this->session->sess_destroy();
	redirect("/login");
  	}
}