<?php

class Sign_up_model extends CI_Model
{
	
	public	function sign_up($data){
			
		return $this->db->insert('sign_up',$data);
	}
	
	public function can_login($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query=$this->db->get('sign_up');
		return $query;
	}
}