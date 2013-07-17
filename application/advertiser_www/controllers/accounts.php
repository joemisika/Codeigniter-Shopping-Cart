<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends CI_Controller {

	var $table = 'customers';
	
	function __construct()
	{
	  parent::__construct();
	  $this->load->model(array('accounts_model', 'menu_model'));
	  $this->load->library('email');
	  $this->load->helper('email');
	  $this->output->enable_profiler(false);
	}
	
	function login(){
		$data['msg'] = '';
		$data['title'] = $this->config->item("sitename"). ' - Customer Login';
		
		$data['menu'] = $this->menu_model->generate_menu();

		$form_submitted = count($_POST);
		switch($form_submitted)
		{
			case 0:
				$this->load->view('accounts/login', $data);
			break;
			
			default:
				unset($_POST['login_btn']);
				$logged_in = $this->accounts_model->login($this->input->post('email'), $this->input->post('password'));
				switch($logged_in)
				{
					case false:
						$data['msg'] = 'Error: The email address and/or password entered were not found!';
						$this->load->view('accounts/login', $data);
					break;
					
					default:
						foreach($logged_in as $customer)
						{
							$newdata = array(
								'account_logged_in'=> 1,
								'theid' =>$customer->id,
								'thestar'=> strtoupper(substr($customer->firstname, 0, 3) . substr($customer->lastname, 0, 3) . $customer->id) . '_' . substr(md5(uniqid(rand())), 0, 6),
						                 'user_id'  => strtoupper(substr($customer->firstname, 0, 3) . substr($customer->lastname, 0, 3) . $customer->id),
								'customer_first_name' => $customer->firstname,
								'customer_last_name' => $customer->lastname,
								'customer_email' => $customer->email,
								'customer_telephone'=> $customer->telephone,
								'customer_cellphone'=> $customer->cellphone, 
								'customer_contact'=> $customer->telephone . ' / ' . $customer->cellphone,
								'customer_company'=>$customer->company,
								'customer_vat'=>$customer->vat,
								'customer_address' =>$customer->deliveryaddress . 
								'<br />' . $customer->town . 
								'<br />' . $customer->province .
								'<br />' . $customer->country . 
								'<br />' 
						               );

						$this->session->set_userdata($newdata);
						
							if($this->session->userdata('redirect_to'))
								{
								$redirect_to = $this->session->userdata('redirect_to');
								redirect($redirect_to);
								}else{
								redirect('/home/');
							 }
							
						}
					break;
				}
			break;
		}
	
	}
	
	/*Account Setup/registration for customer*/
	function register()
	{
		$data['title'] = "Registration for new Customer - ".$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$data['titles'] = $this->config->item('salute_title');
		$data['msg'] = $this->session->flashdata('message');
		$this->load->view('accounts/register', $data);	
	}
	
	/*Save customer information*/
	function save_registration()
	{
	
// 		if ($this->input->post('authenticity_token') == $this->session->userdata('session_id')) {
// 		// process form submission
// 		echo "this is true and happening";
// 		} else {
// 		
// 
// 
// 		$token = uniqid(rand(), true);
// 		//$_SESSION['token'] = $token;
// 		$this->session->set_userdata('session_id', $token);
// 		}
	
			$title = $this->input->post('title');
			$firstname = $this->input->post('firstname');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$password2 = $this->input->post('password2');
			$cellphone = $this->input->post('cellphone');
			$telephone = $this->input->post('telephone');
			$billingaddress = $this->input->post('billingaddress');
			$billingcode = $this->input->post('billingcode');
 			$deliveryaddress = $this->input->post('deliveryaddress');
			$deliverycode = $this->input->post('deliverycode');
			$city = $this->input->post('city');
			$province = $this->input->post('province');
			$country = $this->input->post('country');

		if(empty($email))
		{
	
			$data['msg'] = 'You must supply an email address to create an account';
			$this->session->set_flashdata('message', $data['msg']);
			redirect('accounts/register');
			return true;
		}
		else if(!valid_email($email))
		{
			$data['msg'] = 'You must supply a valid email address to create an account';
			$this->session->set_flashdata('message', $data['msg']);
			redirect('accounts/register');
			return true;
		}
		if(empty($password))
		{
			$data['msg'] = 'You must supply a Password to create an account';
			$this->session->set_flashdata('message', $data['msg']);
			redirect('accounts/register');
			return true;	
		}
		if($password != $password2)
		{
			$data['msg'] = 'The password you submitted does not match the password confirmation';
			$this->session->set_flashdata('message', $data['msg']);
			redirect('accounts/register');
			return true;	
		}
		
		$dbdata = array(
			"title"=>$title,
			"firstname"=>$firstname,
			"lastname"=>$lastname,
			"email"=>$email,
			"username"=>$username,
			"password"=>$password,
			"cellphone"=>$cellphone,
			"telephone"=>$telephone,
			"billingaddress"=>$billingaddress,
			"billingcode"=>$billingcode,
			"deliveryaddress"=>$deliveryaddress,
			"deliverycode"=>$deliverycode,
			"city"=>$city,
			"province"=>$province,
			"country"=>$country,
			"createdate"=>date('c')
		);
		$saved = $this->accounts_model->savenew($this->table, $dbdata);
		
		$this->email->from('noreply@sitename.com', $this->config->item("sitename"));
		$this->email->to($email);
		$this->email->subject('Your Email Has Been Registered');
		$message = "Dear $firstname $lastname\r\n\r\n";
		$message .= "Thank you for registering on ".$this->config->item("sitename")."web site. In order for you to place an order, the website administrator will have to approve your account and they will send you an email. In the mean time you can familiarise yourself with our terms and conditions on the link below \r\n\r\n";
		$message .= "http://www.sitename.com/terms\r\n\r\n";
		$message .= "Kind Regards\r\n\r\nThe ".$this->config->item("sitename")." team\r\n\r\nhttp://sitename.com/";
		$this->email->message($message);
		$this->email->send();
		
		redirect('/accounts/success', 'refresh');
	}
	
	/*Account edit for customer*/
	function edit_customer($id)
	{
		$data['menu'] = $this->menu_model->generate_menu();
		$data['titles'] = $this->config->item('salute_title');
		$data['customer'] = $this->accounts_model->listsingle($this->table, $id);
		$data['title'] = "Registration for new Customer : Ezinhle Promotions";		
		$this->load->view('accounts/register_edit', $data);	
	}
	
	/*Save the edit for customer*/
	function saveedit_customer($id='')
	{
		$dbdata =array();
		$this->accounts_model->saveedit($this->table, $dbdata);
		$data['customer'] = $this->accounts_model->listsingle($this->table, $id);
		$data['msg'] = '<div class="success">'.$dbdata['category'].' has been edited successfully!!!</div>';
		$this->load->view('accounts/register_edit', $data);
	}
	
	function success()
	{
		$data['title'] = "Sign Up complete -".$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$this->load->view('accounts/signupcomplete', $data);
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect("/home");
	}
	
	function forgot_password()
	{
		$data['title'] = "Forgot Password -".$this->config->item("sitename");
		$data['menu'] = $this->menu_model->generate_menu();
		$this->load->view('accounts/forgotpassword', $data);
	}
}

/* End of file account.php */
/* Location: ./application/controllers/account.php */