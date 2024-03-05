<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        
		// $role = $this->session->userdata('c147Role');
		// if($role == 'admin'){
		// 	$adminData =  $this->adm->adminData();
		// 	$data['totalClub'] = $this->QueryModel->countRecord('tbl_club','');
		// 	$data['totalTable'] = $this->QueryModel->countRecord('tbl_table','');
		// 	$data['totalUser'] = $this->QueryModel->countRecord('tbl_user','');
		// 	$data['totalCity'] = $this->QueryModel->countRecord('tbl_city','');
		// }else{
		// 	$adminData =  $this->adm->clubData();
		// 	$data['totalTable'] = $this->QueryModel->countRecord('tbl_table',array('club_id'=>$this->session->userdata('c147Admin')));
		// }		
		
		$this->load->view('admin/dashboard');
	}

	
}
?>