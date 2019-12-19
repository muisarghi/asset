<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Test extends CI_Controller
{

//

 function __construct()
	{
		
	parent::__construct();
		$this->load->database();
		$this->load->model('test_model');
	
		$this->load->helper('url');
		$this->load->helper('form','url');
		$this->load->helper('html');
		$this->load->library('form_validation');

	}

 function index ()
	{
	
	
	$this->load->view('test');
	
	
	
	}



	
}


?>