<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	var $table = 'users';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model('users_model');
	  $this->output->enable_profiler(false);
	  
		if (!$this->session->userdata('admin_id')) {
			$this->session->set_userdata("redirect_to", '/users');
			redirect('/login');
		}
	}
	
	public function index()
	{
		$this->all();
	}
	
	public function all($start=0){
		$data['title'] = $this->config->item('sitename') . "- Admin Users";
		
		$config['base_url'] = '/users/all/';
		$config['total_rows'] =  $this->users_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['users'] = $this->users_model->getall($start, $config['per_page']);
		$data["msg"] = '';
		$data['section_header'] = 'Administrators';
		$this->load->view('users/users_view', $data);
	}
	
	public function createnew(){
		$data['title'] = $this->config->item('sitename') . ' - Create New User';
		$data["msg"]='';
		$data['section_header'] = 'Administrators';
		$this->load->view('users/users_add', $data);
	}
	
	public function savenew(){
		$firstname= $this->input->post('firstname');
		$password= $this->input->post('password');
		$password2= $this->input->post('password2');
		if(empty($firstname)){
		$data["msg"]='<div class="error">You need to provide the firstname for a user</div>';
		return $data;
		}
		if($password != $password2)
		{
			$data["msg"]='<div class="error">You password and confirm password do not match</div>';
			return $data;
		}
		
		$dbdata=array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);	
		$this->users_model->savenew($this->table, $dbdata);
		$data['title'] = $this->config->item('sitename') . ' - Page added successfully!';
		$data['msg'] = '<div class="success">'.$dbdata['firstname'].' has been added successfully!!!</div>';
		$data['section_header'] = 'Users';
		$this->load->view('users/users_add', $data);
	}
	
	public function edit($id=''){
		$data['title'] = $this->config->item('sitename') . ' - Edit User';
		$data["msg"]='';
		$data['theuser'] = $this->users_model->listsingle($this->table, $id);
		$data['section_header'] = 'Users';
		$this->load->view('users/users_edit', $data);
	}
	
	public function saveedit($id){
		if(empty($id)){
		$data["msg"]='<div class="error">Ooops! The user you are looking for is not here</div>';
		return $data;
		}
		$password= $this->input->post('password');
		$password2= $this->input->post('password2');
		if($password != $password2)
		{
			$data["msg"]='<div class="error">You password and confirm password do not match</div>';
			return $data;
		}
		
		$dbdata=array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
				);
		$this->users_model->saveedit($this->table, $id,$dbdata);	
		$data['theuser'] = $this->users_model->listsingle($this->table, $id);
		$data['title'] = $this->config->item('sitename') . ' - Page added successfully!';
		$data['msg'] = '<div class="success">'.$dbdata['firstname'].' has been added successfully!!!</div>';
		$data['section_header'] = 'Users';
		$this->load->view('users/users_edit', $data);
	}
	
	public function delete($id){
		$data['title'] = $this->config->item('sitename') . ' - Delete User';
		$this->users_model->delete($this->table, $id);
		$start = 0;
		$data['msg'] = '<div class="success">User has been deleted successfully</div>';
		$config['base_url'] = '/users/all/';
		$config['total_rows'] =  $this->users_model->countall();
		$config['per_page'] = '10';
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);
		$data['pager'] = $this->pagination->create_links();	
		$data['users'] = $this->users_model->getall($start, $config['per_page']);
		$data['section_header'] = 'Users';
		$this->load->view('users/users_view', $data);
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */