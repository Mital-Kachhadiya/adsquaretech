<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    
	public function index()
	{
		$admin_id = $this->session->userdata('adsquareAdmin');
		$where = array('id', $admin_id);
		$data = array('last_login' => $this->QueryModel->dbDate());
		$update = $this->QueryModel->updateRecord('tbl_admin', $data, $where);
		$this->session->unset_userdata('adsquareAdmin');
		$this->session->unset_userdata('timezone');

		redirect('admin');

		
	}
}
?>