<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller{

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
          redirect(base_url('Login'));
        }
    }
	public function index(){
		$data['main_content'] = 'home';
		$this->load->view('layouts/main',$data);
			
	}

}
?>