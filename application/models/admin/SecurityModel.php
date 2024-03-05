<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SecurityModel extends CI_Model
{
    public function isLoggedIn()
    {
        if($this->session->userdata('adsquareAdmin') != "")
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function adminRole($pagePermission)
    {
        $role = $this->session->userdata('adsquareRole');
        $adminData =  $this->adm->adminData();
        
        $roleData = $this->QueryModel->selectSingelRecord('tbl_role',array('id' => $adminData['role']));
        
        $permissions = explode(',',$roleData['permission']);
        
        if(!in_array($pagePermission, $permissions))
        {
            redirect('admin');
        }
    }

    public function adminStatus()
    {
        $role = $this->session->userdata('adsquareRole');
        $adminData =  $this->adm->adminData();

        if($adminData['status'] != "1")
        {
           redirect('admin/logout');
        }
    }

}
?>