<?php

class User extends CI_Controller {

	public	function index(){
		$this->load->model('User_model');
		$users=$this->User_model->view();
		$data=array();
		$data['users']=$users;
		$this->load->view('data_view',$data);

		}
		

		public function insert(){
			$this->load->helper('url', 'form');
			$this->load->library('upload');
			$this->load->model('user_model');
			if($this->input->post()){
				$config=array(
					'file_name'=>time(),
					'allowed_types'=> 'gif|jpg|png',
					'max_size'=> 51822844,
					'max_width'=> 10024,
					'max_height'=> 8000,
					'upload_path'=>'./uploads/');
				
			$this->upload->initialize($config);

			if ($this->upload->do_upload('profile_image')) {
				$image_data=$this->upload->data();
				$filename=$image_data['file_name'];
			}
			
			else{
				echo $this->upload->display_errors();
			}

			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_error_delimiters('<div class "text-danger">','</div>');

			if($this->form_validation->run()){
		 		$this->load->model('User_model');
		 		$data= array(
		 			'name'=>$this->input->post('name'),
		 			'email'=>$this->input->post('email'),
		 			'image'=>$filename
		 		);

		 		$this->user_model->insert($data);
		 		redirect(base_url('index.php/user/view'));
			}

			else{
				$this->index();
              echo "error";
			}
		}
		
	}

	public function view()
	{
		$this->load->model('User_model');
			$users=$this->User_model->view();
			$data=array();
			$data['users']=$users;
			$this->load->view('data_view',$data);
	}
	public function user_view()
	{
		$this->load->view('user_view');
	}

	public function edit($edit_id){

		 $this->load->model('User_model');
		 $user=$this->User_model->edit($edit_id);

		$data=array();
		$data['user']=$user;

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');

		if ($this->form_validation->run()==false) {

			$this->load->view('edit',$data);
		}
		else
		{
			$formarray=array();
			$formarray['name']=$this->input->post('name');
			$formarray['email']=$this->input->post('email');
			$res =$this->User_model->update($edit_id,$formarray);

			$this->session->set_flashdata('success','Record updated successfully');
			redirect(base_url().'index.php/user/index');
		}
		
	}

	public function delete($userId){

		$this->load->model('User_model');
		$user=$this->User_model->edit($userId);
		
		if (empty($user)) {

			$this->session->set_flashdata('Failure','Record not found');
			redirect(base_url().'index.php/user/index');
		}
			$this->User_model->delete($userId);
			$this->session->set_flashdata('success','Record successfully deleted');
			redirect(base_url().'index.php/user/index');
	}



	 }
        