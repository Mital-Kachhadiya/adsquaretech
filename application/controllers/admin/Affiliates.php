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

            if($member->status == "1")
            {
                $status = '
                <a onClick="changeStatus('.$member->id.',0)" class="btn btn-sm btn-warning mr-2"><i class="fa fa-ban list-icon"></i></a><i class="mr-2"></i>';
            }
            else
            {
                $status = '<a onClick="changeStatus('.$member->id.',1)" class="btn btn-sm btn-success mr-2"><i class="fa fa-check-square-o list-icon"></i></a><i class="mr-2"></i>';
            }

            
            $dateTimeObject = new DateTime($member->created_at);
            $newDateFormat = $dateTimeObject->format('d-m-Y');
            
            $sub_array[] = $member->id; 
            $sub_array[] = $member->fname; 
            $sub_array[] = $member->lname; 
            $sub_array[] = $member->email; 
            $sub_array[] = $member->status == 0 ? '<div class=" py-10 w-100"><span class="badge badge-warning">Inactive</span></div>': ' <div class=" py-10 w-100"><span class="badge badge-success">active</span></div>';
            $sub_array[] = $newDateFormat;
            $sub_array[] = $status.'<a href="'.base_url('admin/affiliates/addAffiliates/').encrypt_url($member->id).'" class="btn btn-sm btn-primary mr-2"><i class="fa fa-edit list-icon"></i></a><a id="deleteBtn'.$member->id.'" style="color:white;" onClick="deleteAffiliates('.$member->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash list-icon"></i></a>';
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
		$data['states'] = $this->QueryModel->selectMultipleRecord('tbl_states',array('country_id'=>1));
		$data['business_model'] = $this->QueryModel->selectMultipleRecord('tbl_business_model','');
		$data['timezones'] = $this->QueryModel->selectMultipleRecord('tbl_timezones','');
        
        $AffId = decrypt_url($this->uri->segment(4));
        if($AffId != "")
        {
            $checkAff = $this->QueryModel->selectSingelRecord('tbl_affiliates',array('id'=>$AffId));
            $propertyInfo = $this->QueryModel->selectMultipleRecord('tbl_property',array('affiliates_id'=>$AffId));
            if(!empty($checkAff))
            {
                $data['pageTitle'] = "Edit Affiliates";
                $data['affiliates'] = $checkAff;
                $data['propertyInfo'] = $propertyInfo;
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
    

    public function actionAddAffiliates(){

        
        $this->SecurityModel->adminRole('affiliates');
		$response = array();
        $response['status'] = "0"; 
        $affiliates_id = $this->input->post('affiliates_id');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'UserName', 'trim|required');

        if($affiliates_id != "")
        {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'); // add validation for the email and check the emailColumn in userTable for unique value
            $checkEmail = $this->QueryModel->selectSingelRecord('tbl_affiliates',array('email'=>$this->input->post('email'),'id!='=>$affiliates_id));   
        }
        else{
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[tbl_affiliates.email]');
        }

        $this->form_validation->set_rules('cemail', 'Confirm Email', 'trim|required|matches[email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('display_name', 'Account Display Name', 'trim|required');
        $this->form_validation->set_rules('c_city', 'City', 'trim|required');
        $this->form_validation->set_rules('c_zipcode', 'Zipcode', 'trim|required');
        $this->form_validation->set_rules('c_street_1', 'Street Address 1', 'trim|required');
        $this->form_validation->set_rules('c_phone', 'Phone', 'trim|required');
        if($this->input->post('selectedRadioValue') == 1){
            $this->form_validation->set_rules('tax_number', 'VAT Number', 'trim|required');
        }else if($this->input->post('selectedRadioValue') == 2){
            $this->form_validation->set_rules('dc_tax_number', 'VAT Number', 'trim|required');
        }


		if($this->form_validation->run()==FALSE)
		{
            $response['status'] = "2";
            $response['fnameError'] = strip_tags(form_error('fname'));
            $response['lnameError'] = strip_tags(form_error('lname'));
            $response['usernameError'] = strip_tags(form_error('username'));
            $response['emailError'] = strip_tags(form_error('email'));
            $response['cemailError'] = strip_tags(form_error('cemail'));
            $response['passwordError'] = strip_tags(form_error('password'));
            $response['cpasswordError'] = strip_tags(form_error('cpassword'));
            $response['display_nameError'] = strip_tags(form_error('display_name'));
            $response['c_cityError'] = strip_tags(form_error('c_city'));
            $response['c_zipcodeError'] = strip_tags(form_error('c_zipcode'));
            $response['c_street_1Error'] = strip_tags(form_error('c_street_1'));
            $response['c_phoneError'] = strip_tags(form_error('c_phone'));
            if($this->input->post('selectedRadioValue') == 1){
                $response['tax_numberError'] = strip_tags(form_error('tax_number'));
            }else if($this->input->post('selectedRadioValue') == 2){
                $response['dc_tax_numberError'] = strip_tags(form_error('dc_tax_number'));
            }
            $response['propertyTypeError'] = strip_tags(form_error('propertyType'));
		} 
        elseif($affiliates_id != "" && $checkEmail){
        $response['status'] = "2";
        $response['emailError'] = 'Email Id aleready exist';
        }
		else
		{
           
            
            $adminId = $this->session->userdata('adsquareAdmin');
           
            $data['fname'] = $this->input->post('fname');
            $data['lname'] = $this->input->post('lname');
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['display_name'] = $this->input->post('display_name');
            $data['url_protocol'] = $this->input->post('url_protocol');
            $data['c_website'] = $this->input->post('c_website');
            $data['c_country_id'] = $this->input->post('c_country_id');
            $data['c_city'] = $this->input->post('c_city');
            $data['c_state_id'] = $this->input->post('c_state_id');
            $data['c_zipcode'] = $this->input->post('c_zipcode');
            $data['c_street_1'] = $this->input->post('c_street_1');
            $data['c_street_2'] = $this->input->post('c_street_2');
            $data['c_phonecode'] = $this->input->post('c_phonecode');
            $data['c_phone'] = $this->input->post('c_phone');
            $data['c_currency'] = $this->input->post('c_currency');
            $data['c_timezone'] = $this->input->post('c_timezone');
            $data['tax_number'] = $this->input->post('tax_number');
            $data['indirect_country'] = $this->input->post('indirect_country');
            $data['dc_tax_number'] = $this->input->post('dc_tax_number');
            $data['c_tax'] = $this->input->post('selectedRadioValue');
            $data['business_model'] = $this->input->post('business_model');
            $data['web_property'] = $this->input->post('web_property');
            $data['mobile_property'] = $this->input->post('mobile_property');
            $data['social_property'] = $this->input->post('social_property');
           
            if($affiliates_id == "")
            {
                $insert = $this->QueryModel->insertRecord('tbl_affiliates',$data);

                $web_property =  $this->input->post('web_property');
                if($web_property == 1){

                    $web_titles = $this->input->post('web_title');
                    $web_descs = $this->input->post('web_desc');
                    for ($i = 0; $i < count($web_titles); $i++) {
                        $webPData['affiliates_id'] = $insert;
                        $webPData['property_id'] = '1';
                        $webPData['title'] = $web_titles[$i];
                        $webPData['description'] = $web_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$webPData);
                    }
                }


                $mobile_property =  $this->input->post('mobile_property');
                if($mobile_property == 1){

                    $mo_titles = $this->input->post('mo_title');
                    $mo_descs = $this->input->post('mo_desc');
                    for ($i = 0; $i < count($mo_titles); $i++) {
                        $moPData['affiliates_id'] = $insert;
                        $moPData['property_id'] = '2';
                        $moPData['title'] = $mo_titles[$i];
                        $moPData['description'] = $mo_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$moPData);
                    }
                }



                $social_property =  $this->input->post('social_property');
                if($social_property == 1){

                    $so_titles = $this->input->post('so_title');
                    $so_descs = $this->input->post('so_desc');
                    for ($i = 0; $i < count($so_titles); $i++) {
                        $soPData['affiliates_id'] = $insert;
                        $soPData['property_id'] = '3';
                        $soPData['title'] = $so_titles[$i];
                        $soPData['description'] = $so_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$soPData);
                    }
                }

                $message = "Affiliates added sucessfully.";
            }
            else
            {
                $insert = $this->QueryModel->updateRecord('tbl_affiliates',$data,array('id'=>$affiliates_id));

                $delete = $this->QueryModel->deleteRecord('tbl_property',array('affiliates_id'=>$affiliates_id),'','');

                $web_property =  $this->input->post('web_property');
                if($web_property == 1){

                    $web_titles = $this->input->post('web_title');
                    $web_descs = $this->input->post('web_desc');
                    for ($i = 0; $i < count($web_titles); $i++) {
                        $webPData['affiliates_id'] = $affiliates_id;
                        $webPData['property_id'] = '1';
                        $webPData['title'] = $web_titles[$i];
                        $webPData['description'] = $web_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$webPData);
                    }
                }


                $mobile_property =  $this->input->post('mobile_property');
                if($mobile_property == 1){

                    $mo_titles = $this->input->post('mo_title');
                    $mo_descs = $this->input->post('mo_desc');
                    for ($i = 0; $i < count($mo_titles); $i++) {
                        $moPData['affiliates_id'] = $affiliates_id;
                        $moPData['property_id'] = '2';
                        $moPData['title'] = $mo_titles[$i];
                        $moPData['description'] = $mo_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$moPData);
                    }
                }



                $social_property =  $this->input->post('social_property');
                if($social_property == 1){

                    $so_titles = $this->input->post('so_title');
                    $so_descs = $this->input->post('so_desc');
                    for ($i = 0; $i < count($so_titles); $i++) {
                        $soPData['affiliates_id'] = $affiliates_id;
                        $soPData['property_id'] = '3';
                        $soPData['title'] = $so_titles[$i];
                        $soPData['description'] = $so_descs[$i];
                        $this->QueryModel->insertRecord('tbl_property',$soPData);
                    }
                }



                $message = "Affiliates updated sucessfully.";
            }
            
            if($insert)
            {
                $response['status'] = "1";
                $response['redirect'] = base_url('admin/affiliates');
                $this->session->set_flashdata('successMsg', $message);
            }   
            else
            {
                $response['message'] = "Something went wrong!";
            }  


        }
        echo json_encode($response);
    }

    public function actionActiveDeactive()
    {
        $this->SecurityModel->adminRole('affiliates');
        $response = array();
        $response['status'] = "0"; 
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        if($id != "" || $value != "")
        {
            $data = array(
                'status' => $value
            ); 
            $update = $this->QueryModel->updateRecord('tbl_affiliates',$data,array('id'=>$id));
            if($update)
            {
                $response['status'] = "1";
                if($value == 1)
                {
                    $response['message'] = "Affiliates activated successfully.";
                    $this->session->set_flashdata('successMsg', "Affiliates activated successfully.");
                }
                else
                {
                    $response['message'] = "Affiliates deactivated successfully.";
                    $this->session->set_flashdata('successMsg', "Affiliates deactivated successfully.");
                }
            }   
            else
            {
                $response['message'] = "Something went wrong!";
            }   
        }
        else
        {
            $response['message'] = "Something went wrong!";
        }
        echo json_encode($response);
    }


    public function actionDeleteSingle()
	{
        $this->SecurityModel->adminRole('affiliates');
		$response = array();
        $response['status'] = "0"; 
        $affiliates_id = $this->input->post('affiliates_id');
        $checkAff = $this->QueryModel->selectSingelRecord('tbl_affiliates',array('id'=>$affiliates_id));
        if(!empty($checkAff))
        {
            $delete = $this->QueryModel->deleteRecord('tbl_affiliates',array('id'=>$affiliates_id),'','');
            $delete1 = $this->QueryModel->deleteRecord('tbl_property',array('affiliates_id'=>$affiliates_id),'','');
            if($delete)
            {
                $response['status'] = "1";
                $response['message'] = "Affiliates deleted successfully.";
            }   
            else
            {
                $response['message'] = "Something went wrong!";
            } 
        }
        else
        {
            $response['message'] = "Something went wrong!";
        }
        
		echo json_encode($response);
    }

}