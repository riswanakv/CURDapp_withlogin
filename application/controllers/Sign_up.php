<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sign_up extends CI_Controller {

	
		public function index()
		{
			$this->load->view('sign_up');
		}


		public function insert()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('user_name','User Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('confirm_password','Confoirm Password','required');
			$this->form_validation->set_error_delimiters('<div class "text-danger">','</div>');

			if($this->form_validation->run()){
		 		$this->load->model('sign_up_model');
		 		$data= array(
		 			'user_name'=>$this->input->post('user_name'),
		 			'email'=>$this->input->post('email'),
		 			'password'=>sha1($this->input->post('password')),
		 			'confirm_password'=>sha1($this->input->post('confirm_password'))
		 		);

		 		$this->sign_up_model->sign_up($data);
		 		redirect(base_url('index.php/sign_up/display'));
			}

			else{
				$this->display();

			}

		}

		public function display(){

			$this->index();
		}
		
		public function login(){
			$this->load->view('login_page');
		}

		
	
		public function can_login(){

			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_error_delimiters('<div class ="text-danger">,</div>');
			if ($this->form_validation->run()) {

				$email=$this->input->post('email');
				$password=sha1($this->input->post('password'));
				$this->load->model('Sign_up_model');
				$res=$this->Sign_up_model->can_login($email,$password);
				
				if ($res->num_rows()>0) {

						$data=$res->row_array();
						$email=$data['email'];
						//$utype=$data['utype'];
						$password=$data['password'];
						$id=$data['id'];

						$session_data=array(
							'id'=>$id,
							'email'=>$email,
							//'utype'=>$utype,
							'password'=>$password,
							'logged_in'=>TRUE
						);

							$this->session->set_userdata($session_data);
						
						if ($this->session->userdata('logged_in') == TRUE) {
        				redirect(base_url('index.php/sign_up/user_view'));
      					}	
						else
						{
							$this->session->set_flashdata('error','invalid user name or password');
							
							redirect(base_url('index.php/sign_up/index'));
						}
				}		
				else{
				redirect(base_url('index.php/sign_up/login'));
				}

			}
		}

	public function user_view(){
		$this->load->view('user_view');
		}	
}
?>