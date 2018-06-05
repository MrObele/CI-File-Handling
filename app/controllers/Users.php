<?php

/**
* 
*/


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Users extends CI_Controller
{

 public function __Construct() {
        parent::__Construct();
    }

public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
		if($this->form_validation->run() == FALSE){

			$data['main_content'] = 'Users/login';
			$this->load->view('layouts/main',$data);
		} else{
			//Get from post
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			//Validate user
			if($this->User_model->login_user($username,$password)){
				//cretate array of user data
				$user_data = array(
					'username'   => $username,
					'logged_in'  => true
					);
				//Set session userdata
				$this->session->set_userdata($user_data);
				//set success message
				$this->session->set_flashdata('login_success','You are now logged in');
               redirect(base_url());
				
			} else{
				//Set error
				$this->session->set_flashdata('login_failed','Sorry, Your Login Information is invalid');
				redirect(base_url('	Login'));
			}
             	
		}

	}

	public function createUser(){
		$this->form_validation->set_rules('username','Username','trim|required|max_length[20]|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password','Password','trim|required|max_length[20]|min_length[4]|xss_clean');
		$this->form_validation->set_rules('password2','Confirm Password','trim|required|max_length[50]|min_length[4]|xss_clean|matches[password]');

		//file upload configuration
		        $config['upload_path']          = './assets/documents/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1500;
                $config['max_width']            = 1500;
                $config['max_height']           = 1500;
                $this->load->library('upload', $config);

		if($this->form_validation->run() == FALSE || !$this->upload->do_upload('document')){

			//set file upload error message
			$this->session->set_flashdata('image_error',$this->upload->display_errors());

			//re-load signup page to display error

			$data['main_content'] = 'Users/sign_up';
		    $this->load->view('layouts/main',$data);

		} else {
			 
			 //document details
			$filedata =  $this->upload->data();
            $filename = $filedata['file_name'];
            $picture_value = array(
			'fileName'    => $filename,
			'imageExist'  => true
					);
            $this->session->set_userdata($picture_value);

             //other form field data
             $postData = $this->input->post();
             $validate = $this->Authentication_model->validate_user($postData);
             $username = $this->input->post('username');
			 $enc_password = md5($this->input->post('password'));
			
             $data = array(
 			'username'               =>$username,
 			'document'               =>$filename,
 			'password'              =>$enc_password
 			);

             if ($validate) {
             	$this->session->set_flashdata('user_exist','A user with those credentials already exists kindly review and try again');
				redirect(base_url('Signup'));
             }else{
             	if ($this->User_model->create_user($data)) {

				$this->session->set_flashdata('user_signup','Sign Up Successful Kindly login');
				redirect(base_url('Login'));
			}
			else{
				$this->session->set_flashdata('user_signup_error','unable to save your details try again');
				redirect(base_url('Signup'));

			}
           }
			

		}
	}

	//logout function
	public function logout(){
		//Unset session data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();

		//set logout message
			$this->session->set_flashdata('logged_out','You have been logged out');
		   redirect(base_url());
		

	}


}

?>