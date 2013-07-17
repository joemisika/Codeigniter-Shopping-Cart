<?php
class Pages_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function getpages($urlid)
	{
		$query = $this->db->get_where('pages', array('urlid' => $urlid), 1);
		return $query->row();
	}
	
	function listsingle($id, $sex)
	{
		$query = $this->db->get_where('fb_march_studiow', array('id' => $id, 'sex' => $sex), 1);
		return $query->row();
	}
}