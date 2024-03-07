<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliates extends CI_Controller {

	public function __construct(){	
		parent::__construct();
		$this->load->model('admin/SecurityModel');
		$isLogin = $this->SecurityModel->isLoggedIn();
		if($isLogin == false)
        {
            redirect('admin');
        }
        $this->SecurityModel->adminStatus();
        $this->load->model('admin/AffiliatesTableModel');
    }
    
    public function index()
	{
        $this->SecurityModel->adminRole('affiliates');
        $data = array();
        $data['pageTitle'] = "Affiliates";
		$this->load->view('admin/listAffiliates', $data);
    }

    public function getLists(){
        $this->SecurityModel->adminRole('affiliates');
        $data = $row = array();
        $where = "";
        $memData = $this->AffiliatesTableModel->getRows($_POST,$where);

       
        $i = $_POST['start'];

        foreach($memData as $member){
            $i++;
          
            $sub_array = array();  
            
            $sub_array[] = $member->id; 
            $sub_array[] = $member->fname; 
            $sub_array[] = $member->lname; 
            $sub_array[] = $member->email; 
            $sub_array[] = $member->status;
            $sub_array[] = $member->created_at;
            $sub_array[] = '<a href="'.base_url('c147-admin/club/addClub/').encrypt_url($member->id).'" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a><i class="mr-2"></i><a id="deleteBtn'.$member->id.'" style="color:white;" onClick="deleteClub('.$member->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
            $data[] = $sub_array; 
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->AffiliatesTableModel->countAll($where),
            "recordsFiltered" => $this->AffiliatesTableModel->countFiltered($_POST,$where),
            "data" => $data,
            "class" => "red"
        );

        echo json_encode($output);
    }


    public function addAffiliates()
	{      
        $this->SecurityModel->adminRole('affiliates');
        $data = array();
		$data['countries'] = $this->QueryModel->selectMultipleRecord('tbl_countries','');
		$data['states'] = $this->QueryModel->selectMultipleRecord('tbl_states','');
		$data['business_model'] = $this->QueryModel->selectMultipleRecord('tbl_business_model','');
		$data['timezones'] = $this->QueryModel->selectMultipleRecord('tbl_timezones','');
        
        $AffId = decrypt_url($this->uri->segment(4));
        if($AffId != "")
        {
            $checkAff = $this->QueryModel->selectSingelRecord('tbl_affiliates',array('id'=>$AffId));
            if(!empty($checkAff))
            {
                $data['pageTitle'] = "Edit Affiliates";
                $data['affiliates'] = $checkAff;
            }
            else
            {
                $data['pageTitle'] = "Add Affiliates";
            }
        }
        else
        {
            $data['pageTitle'] = "Add Affiliates";
        }
		$this->load->view('admin/addAffiliates', $data);
    }

    public function getCountrywiseState(){
        $country_id = $this->input->post('country_id');
        $states = $this->QueryModel->selectMultipleRecord('tbl_states',array('country_id' => $country_id));
        echo json_encode($states);
    }
    
}