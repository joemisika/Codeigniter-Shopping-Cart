<?php
class Menu_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	function generate_menu()
	{
		$menu = 'menu';
		$user_id = $this->session->userdata("user_id");
		if(empty($user_id)) 
		{
			$menu .= '_customer';
		}
		else
		{
			$menu .= '_cart';
		}
		return $menu;
	}
	
	
}