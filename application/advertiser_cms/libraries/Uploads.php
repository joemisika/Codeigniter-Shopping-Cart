<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Uploads
{

  //var $CI;
  
  // Load constructor
  function __construct()
  {
    $this->ci = & get_instance();
    $this->ci->load->helper('urlstring');
  }
  
  function uploadfile($dir, $fieldname="file") {
		$file = explode(".",$_FILES[$fieldname]['name']);
		$name = $file[0];
		$ext =  $file[1];

		$uploaddir = $this->ci->config->item('base_path') . "uploads/";
		//print $uploaddir;
		if (!file_exists($uploaddir)) {
// 			print "Making dir";
			if (!mkdir($uploaddir,0777,true)) {
				print "Error making directory ".$uploaddir;
				$data["error"]=1;
				return $data;
			}
		}
		$filename = $name . "." . $ext;
// 		if(file_exists($uploaddir . $filename)) {
// 			$filename = $name. "-" . rand(1,999) . "." . $ext;
// 		}
		$uploadfile = $uploaddir . $filename;
// 		print $uploadfile;
		if (move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadfile)) {
			$data['error'] = 0;
// 			if (substr($filename,-3)=="zip") {
// 				$filename=$this->unzip($uploadfile);
// 				if (empty($filename)) {
// 					$data['error'] = 1;
// 					return $data;
// 				}
// 			}
			$data['filename'] = $filename;
			return $data;
		} else {
			$data['error'] = 1;
			return $data;
		}
	}
	
	function thumbuploadfile($dir, $fieldname="file") {
		$file = explode(".",$_FILES[$fieldname]['name']);
		$name = $file[0];
		$ext =  $file[1];

		$uploaddir = $this->ci->config->item('base_path') . "uploads/thumbs/";
		//print $uploaddir;
		if (!file_exists($uploaddir)) {
// 			print "Making dir";
			if (!mkdir($uploaddir,0777,true)) {
				print "Error making directory ".$uploaddir;
				$data["error"]=1;
				return $data;
			}
		}
		$filename = $name . "." . $ext;
		if(file_exists($uploaddir . $filename)) {
			$filename = $name. "-" . rand(1,999) . "." . $ext;
		}
		$uploadfile = $uploaddir . $filename;
// 		print $uploadfile;
		if (move_uploaded_file($_FILES[$fieldname]['tmp_name'], $uploadfile)) {
			$data['error'] = 0;
// 			if (substr($filename,-3)=="zip") {
// 				$filename=$this->unzip($uploadfile);
// 				if (empty($filename)) {
// 					$data['error'] = 1;
// 					return $data;
// 				}
// 			}
			$data['filename'] = $filename;
			return $data;
		} else {
			$data['error'] = 1;
			return $data;
		}
	}
  
  
}