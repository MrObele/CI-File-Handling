<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Upload extends CI_Controller{
    public function __Construct() {
        parent::__Construct();
       } 

	public function index(){
	    $data['main_content'] = 'Users/file_upload';
		$this->load->view('layouts/main',$data);
		
    }
    
    public function uploadFile(){
		
		//file upload configuration
		        $config['upload_path']          = './assets/documents/';// directory path to save the file
                $config['allowed_types']        = 'pdf|gif|jpg|png';// allowed file types
                $config['max_size']             = 80;// maximum file size allowed in kilobytes
                $config['max_width']            = 200;// maximum width in pixels
                $config['max_height']           = 100;// maximum height in pixels
                $this->load->library('upload', $config);

		if(!$this->upload->do_upload('document')){

			//set file upload error message
			$this->session->set_flashdata('image_error',$this->upload->display_errors());

			//re-load signup page to display error

			$data['main_content'] = 'Users/file_upload';
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
             $data = array(
 			'file'    =>$filename
 			);

            if ($this->Upload_model->upload_document($data)) {

				$this->session->set_flashdata('upload_success','Document uploaded successfully');
				redirect(base_url('Home'));
			}
			else{
				$this->session->set_flashdata('upload_failed','unable to save your details try again');
				redirect(base_url('Signup'));

			}	

		}
	}

}
?>