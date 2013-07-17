<?php
class Accounts_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function account_in_use(){
		$account_in_use = $this->session->userdata("account_logged_in");
		if(!empty($account_in_use)) 
		{
			if($account_in_use == 1)
			{
				return true;
			}
		}else{
			return false;
		}
	
	}
	
	function login($email, $password) 
	{
		$this->db->select("customers.*");
		$this->db->from("customers");
		$this->db->where("email", $email);
		$this->db->where("password", $password);
		$this->db->where("approved", 1);

		$query = $this->db->get();

		if($query->num_rows() !== 1)
		{
			return false;
		}else{
			return $query->result();
			
		}
	}
	
}