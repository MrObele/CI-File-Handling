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
                $config['allowed_types']        = 'doc|docx|pdfpdf|gif|jpg|png';// allowed file types
                $config['max_size']             = 80;// maximum file size allowed in kilobytes
                $config['max_width']            = 200;// maximum width in pixels
                $config['max_height']           = 100;// maximum height in pixels
                $this->load->library('upload', $config); // Load the upload library

		if(!$this->upload->do_upload('document')){ // check if the file upload is not successful

			//set file upload error message
			$this->session->set_flashdata('image_error',$this->upload->display_errors()); //set the error message

			//re-load signup page to display error

			$data['main_content'] = 'Users/file_upload';
		    $this->load->view('layouts/main',$data);

		} else {
			 
			 //document details
			$filedata =  $this->upload->data();//get the uploaded file data
			$filename = $filedata['file_name'];//get the file name into a variable as $filedata variable contains other values such as size type and other 
			//save the file to the database	
             $data = array(
 			'file'    =>$filename //set the file name to the corresponding table column name in our case file is the column name
 			);

            if ($this->Upload_model->upload_document($data)) {

				$this->session->set_flashdata('upload_success','Document uploaded successfully');
				redirect(base_url('Home'));
			}
			else{
				$this->session->set_flashdata('upload_failed','unable to save your details try again');
				redirect(base_url('Upload'));

			}	

		}
	}

}
?>