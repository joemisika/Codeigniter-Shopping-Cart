<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Geolocation extends CI_Controller {

	 protected $username;

	function __construct()
	{
	  parent::__construct();
	  //load the client library that we added as helper
	  $this->output->enable_profiler(false);
	  $this->username =  'joemisika';

	}
	
	
	function index()
	{
		$this->load->view('geolocation/geolocation_view');
	}

	function get_hello(){
	
		//echo "hello! world, this is the controller -- Test out";
		
		return 1;
	}
	function  getPlaceName($lat, $lng) {
		$url =  sprintf(
		"http://api.geonames.org/findNearbyPlaceNameJSON?lat=%f&lng=%f&username=%s",$lat, $lng, $this->username);
		$response = file_get_contents($url);
		if ($response === false) {
		throw new Exception("Failure to obtain data");
		}
		$places = json_decode($response);
		if (!$places) 
		{
			throw new Exception("Invalid JSON response");
		}
		
		if (is_array($places->geonames) && count($places->geonames)) 
		{
			//return $places->geonames[0]->name;
			print_r($places->geonames);
		}
		else 
		{
			//return "Unknown";
			print('unknown');
		}
   	}
   	

}


/* End of file geolocation.php */
/* Location: ./application/controllers/geolocation.php */