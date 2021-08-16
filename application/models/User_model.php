<?php

class User_model extends CI_model
{
	
	function insert($formarray){

		$this->db->insert('users',$formarray);
	}

	function view(){

		return $users=$this->db->get('users')->result_array();
	}


	function edit($edit_id){

		$this->db->where('id',$edit_id);
		return $user=$this->db->get('users')->row_array();
	}

	function update($user_id,$formarray){
		
		$this->db->where('id',$user_id);
		$this->db->update('users',$formarray);
	}

	function delete($userId){

		$this->db->where('id',$userId);
		$this->db->delete('users');
	}
}


?>