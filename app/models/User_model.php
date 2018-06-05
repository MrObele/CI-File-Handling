<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 /**
 * 
 */
 class User_model extends CI_Model
 {
 	// student login function
 	public function login_user($username,$password){
 		$enc_password = md5($password);
 		//where clause
 		$this->db->where('username',$username);
 		$this->db->where('password',$enc_password);
 		$result = $this->db->get('users');
 		
 		
 		if($result->num_rows() == 1){
 			return true;
 		} else {
 			return false;
 		}
 	}

 	public function create_user($data)
 	{
 		$insert = $this->db->insert('users',$data);
 		return $insert;
 	
 	}


 }

?>