<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Signup extends CI_Controller{
    public function __Construct() {
        parent::__Construct();
        if($this->session->userdata('logged_in')) {
          redirect(base_url());
        }
       } 

	public function index(){
	    $data['main_content'] = 'Users/sign_up';
		$this->load->view('layouts/main',$data);
		
	}

}
?>