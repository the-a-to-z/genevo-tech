<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_controller {

        function __construct() 
	 {
	  parent::__construct();
	  	$this->load->model('mod_globals');
	  	$this->load->library("pagination");
	  	$this->load->helper('url'); 
	  	$this->load->model('mod_pages'); 
	 } 

	public function index()
	{ 
              $data['title'] = 'index';
              $this->load->view(F_MASTER, $data);  
	}  
        function about() {
             $data['title'] = 'About';
             $this->load->view(F_MASTER, $data);
        }   
        function product() {
                $data['title'] = 'Product';
                $this->load->view(F_MASTER, $data);
        }

}
