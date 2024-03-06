<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){	
		parent::__construct();
		$this->load->model('admin/SecurityModel');
		$isLogin = $this->SecurityModel->isLoggedIn();
		if($isLogin == false)
        {
            redirect('admin');
		}
        $this->SecurityModel->adminStatus();
	}

	public function index()
	{
		$this->load->view('admin/profile');
    }
    
	public function updateProfile()
	{
		$response = array();
        $response['status'] = "0"; 
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        
        $this->form_validation->set_message('alpha_numeric', 'The %s does not contain any special characters and spaces.');

		if($this->form_validation->run()==FALSE)
		{
            $response['status'] = "2";
            $response['nameError'] = strip_tags(form_error('name'));
			$response['usernameError'] = strip_tags(form_error('username'));
			$response['emailError'] = strip_tags(form_error('email'));
			$response['mobileError'] = strip_tags(form_error('mobile'));
		}
		else
		{
            $name = $this->input->post('name');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$adminId = $this->session->userdata('adsquareAdmin');
            $checkUsername = $this->QueryModel->selectSingelRecord('tbl_admin',array('username'=>$username,'id !='=>$adminId));
            $checkEmail = $this->QueryModel->selectSingelRecord('tbl_admin',array('email'=>$email,'id !='=>$adminId));
            $checkAdmin = $this->QueryModel->selectSingelRecord('tbl_admin',array('id'=>$adminId));
            if(!empty($checkUsername))
            {
                $response['message'] = "This username is already exists.";
            }
            elseif(!empty($checkEmail))
            {
                $response['message'] = "This email is already exists.";
            }
            else
            {
				if($checkAdmin['status'] == "1")
				{
                    $data = array();
                    if(isset($_FILES['image']))
                    {
                        if(!empty($_FILES['image']['name'])){
            
                            $_FILES['file']['name'] = $_FILES['image']['name'];
                            $_FILES['file']['type'] = $_FILES['image']['type'];
                            $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
                            $_FILES['file']['error'] = $_FILES['image']['error'];
                            $_FILES['file']['size'] = $_FILES['image']['size'];
                
                            $extension = pathinfo( $_FILES['image']['name'], PATHINFO_EXTENSION);
                            $extension = strtolower($extension);
                            $filename= md5($_REQUEST['email'].date('Y-m-dh:i:s')).'.'.$extension;
                            $uploadPath = 'images/profile/';
                            $config['upload_path'] = $uploadPath; 
                            $config['allowed_types'] = 'jpg|jpeg|png|gif';
                            $config['max_size'] = '2000'; 
                            $config['file_name'] = $filename;
                            $this->load->library('upload',$config); 
                            $this->upload->initialize($config);
                            
                            if($this->upload->do_upload('file')){
                                $this->QueryModel->removeImage('tbl_admin',array('id'=>$adminId),'image', $uploadPath);
                                $uploadData = $this->upload->data();
                                $photo = $uploadData['file_name'];
                            }
                            else
                            {
                                $error = strip_tags($this->upload->display_errors());
                            }
                        }
                        
                    }
                    if(@$error){
                        $response['status'] = "2";
                        $response['imageError'] = $error;
                    }
                    else
                    {
                        $data['name'] = $name;
                        $data['email'] = $email;
                        $data['mobile'] = $mobile;
                        $data['username'] = $username;
                        if(@$photo)
                        {
                            $data['image'] = $photo;
                        }
                        $update = $this->QueryModel->updateRecord('tbl_admin',$data,array('id'=>$adminId));
                        if($update)
                        {
                            $response['status'] = "1";
                            $response['message'] = "Your profile updated succesfully.";
                            $this->session->set_flashdata('profileUpdated', 'Your profile updated succesfully.');
                        }
                        else
                        {
                            $response['message'] = "Something went wrong.";
                        }
                    }
                    
				}
				else
				{
					$response['message'] = "Your account is suspended!";
                }
            }
			
		}
		echo json_encode($response);
    }
    
    public function changePassword()
	{
		$this->load->view('admin/changePassword');
    }
    
    public function updatePassword()
	{
		$response = array();
		$response['status'] = "0"; 
		$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

		if($this->form_validation->run()==FALSE)
		{
            $response['status'] = "2";
			$response['oldPasswordError'] = strip_tags(form_error('old_password'));
            $response['newPasswordError'] = strip_tags(form_error('new_password'));
            $response['confirmPasswordError'] = strip_tags(form_error('confirm_password'));
		}
		else
		{
			$oldPassword = $this->input->post('old_password');
            $newPassword = $this->input->post('new_password');
            $confirmPassword = $this->input->post('confirm_password');
			$adminId = $this->session->userdata('adsquareAdmin');
            $checkAdmin = $this->QueryModel->selectSingelRecord('tbl_admin',array('id'=>$adminId));
            
            if($checkAdmin['status'] == "1")
            {
                $data = array();
                if(password_verify($oldPassword, $checkAdmin['password']))
                {
                    $data['password'] =  $this->QueryModel->passwordHash($newPassword);
                    $update = $this->QueryModel->updateRecord('tbl_admin',$data,array('id'=>$adminId));
                    if($update)
                    {
                        $response['status'] = "1";
                        $response['message'] = "Your password changed succesfully.";
                    }
                    else
                    {
                        $response['message'] = "Something went wrong.";
                    }
                }
                else
                {
                    $response['status'] = "2";
                    $response['oldPasswordError'] = "Your current password does not match.";
                }
                
                
            }
            else
            {
                $response['message'] = "Your account is suspended!";
            }
		}
		echo json_encode($response);
	}
}
?>