<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminDataModel extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->QueryModel->setTimezone();
    }
    
    function adminData()
    {
        $id = $this->session->userdata('adsquareAdmin');
        $adminData = $this->QueryModel->selectSingelRecord('tbl_admin', array('id'=>$id));
        return $adminData;
    } 

    function getRoles()
    {
        $roleData = $this->QueryModel->selectMultipleRecord('tbl_role','');
        return $roleData;
    } 

}
?>