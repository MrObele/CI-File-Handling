<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * 
 */
 class Upload_model extends CI_Model
 {
 	public function upload_document($data)
 	{
 		$insert = $this->db->insert('files',$data);
 		return $insert;
 	
 	}


 }

?>