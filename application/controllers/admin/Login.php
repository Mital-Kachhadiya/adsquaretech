<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 header('Access-Control-Allow-Origin: *');

class Login extends CI_Controller {

	public function __construct(){	
        parent::__construct();
        $this->load->model('admin/SecurityModel');
        $isLogin = $this->SecurityModel->isLoggedIn();
        if($isLogin == true)
        {
            redirect('admin/dashboard');
		}
		$this->QueryModel->setTimezone();
	}

	public function index()
	{
		$this->load->view('admin/login');
	}
	

	public function checkLogin()
	{
		$response = array();
		$response['status'] = "0"; 
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()==FALSE)
		{
			$response['usernameError'] = strip_tags(form_error('username'));
			$response['passwordError'] = strip_tags(form_error('password'));
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$remember = $this->input->post("remember");
			
			$where = array('username'=>$username);
			$checkAdmin = $this->QueryModel->selectSingelRecord('tbl_admin',$where);
			

			if(!empty($checkAdmin))
			{
				if($checkAdmin['status'] == "1")
				{
					if(password_verify($password, $checkAdmin['password'])) 
					{
						$data = array();
						$data['last_login'] = $this->QueryModel->dbDate();
						$update = $this->QueryModel->updateRecord('tbl_admin',$data,array('id'=>$checkAdmin['id']));
						if($update)
						{
							$response['status'] = "1";
							$this->session->set_userdata('adsquareRole','admin');
							$this->session->set_userdata('adsquareAdmin',$checkAdmin['id']);
							if($checkAdmin['tz'] != ''){
								$this->session->set_userdata('timezone',$checkAdmin['tz']);
							}else{
								$this->session->set_userdata('timezone',date_default_timezone_get ());
							}
							

							if ($remember == "1")
							{
								$this->input->set_cookie('adsquare_username', $username, 86500); 
								$this->input->set_cookie('adsquare_password', $password, 86500); 
							}
							else
							{
								delete_cookie('adsquare_username');
								delete_cookie('adsquare_password');
							}
							$response['redirectPath'] = base_url().'admin/dashboard';
						}
						else
						{
							$response['message'] = "Something went wrong!";
						}
					}
					else
					{
						$response['message'] = "Invalid credentials!"; 
					}
				}
				else
				{
					$response['message'] = "Your account is suspended!";
				}
			}
			else
			{
				$response['message'] = "Invalid credentials!"; 
			}
		}
		echo json_encode($response);
	}
}