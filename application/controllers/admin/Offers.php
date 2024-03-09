<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

	public function __construct(){	
		parent::__construct();
		$this->load->model('admin/SecurityModel');
		$isLogin = $this->SecurityModel->isLoggedIn();
		if($isLogin == false)
        {
            redirect('admin');
        }
        $this->SecurityModel->adminStatus();
        $this->load->model('admin/OfferTableModel');
    }
    
    public function index()
	{
        $this->SecurityModel->adminRole('offers');
        $data = array();
        $data['pageTitle'] = "Offers";
		$this->load->view('admin/listOffers', $data);
    }

    public function getLists(){
        $this->SecurityModel->adminRole('offers');
        $data = $row = array();
        $where = "";
        $memData = $this->OfferTableModel->getRows($_POST,$where);

       
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
            $sub_array[] = $member->name; 
            $sub_array[] = $member->category; 
            $sub_array[] = $member->subcategory; 
            $sub_array[] = $member->url;
            $sub_array[] = '<a href="'.base_url('admin/offers/addOffer/').encrypt_url($member->id).'" class="btn btn-sm btn-primary mr-2"><i class="fa fa-edit list-icon"></i></a><a id="deleteBtn'.$member->id.'" style="color:white;" onClick="deleteOffer('.$member->id.')" class="btn btn-sm btn-danger"><i class="fa fa-trash list-icon"></i></a>';
            $data[] = $sub_array; 
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->OfferTableModel->countAll($where),
            "recordsFiltered" => $this->OfferTableModel->countFiltered($_POST,$where),
            "data" => $data,
            "class" => "red"
        );

        echo json_encode($output);
    }


    public function addOffer()
	{      
        $this->SecurityModel->adminRole('offers');
        $data = array();
		$data['countries'] = $this->QueryModel->selectMultipleRecord('tbl_countries','');
		$data['states'] = $this->QueryModel->selectMultipleRecord('tbl_states',array('country_id'=>1));
		$data['business_model'] = $this->QueryModel->selectMultipleRecord('tbl_business_model','');
		$data['timezones'] = $this->QueryModel->selectMultipleRecord('tbl_timezones','');
        
        $offerId = decrypt_url($this->uri->segment(4));
        if($offerId != "")
        {
            $checkOff = $this->QueryModel->selectSingelRecord('tbl_offer',array('id'=>$offerId));
            if(!empty($checkOff))
            {
                $data['pageTitle'] = "Edit Offer";
                $data['offer'] = $checkOff;
            }
            else
            {
                $data['pageTitle'] = "Add Offer";
            }
        }
        else
        {
            $data['pageTitle'] = "Add Offer";
        }
		$this->load->view('admin/addOffer', $data);
    }


    public function actionAddOffer(){

        
        $this->SecurityModel->adminRole('offers');
		$response = array();
        $response['status'] = "0"; 
        $offer_id = $this->input->post('offer_id');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('category', 'Category', 'trim|required');
        $this->form_validation->set_rules('subcategory', 'Subcategory', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
        $this->form_validation->set_rules('url', 'URL', 'trim|required');
       


		if($this->form_validation->run()==FALSE)
		{
            $response['status'] = "2";
            $response['nameError'] = strip_tags(form_error('name'));
            $response['categoryError'] = strip_tags(form_error('category'));
            $response['subcategoryError'] = strip_tags(form_error('subcategory'));
            $response['start_dateError'] = strip_tags(form_error('start_date'));
            $response['end_dateError'] = strip_tags(form_error('end_date'));
            $response['urlError'] = strip_tags(form_error('url'));
          
		} 
		else
		{
            $adminId = $this->session->userdata('adsquareAdmin');
           
            $data['name'] = $this->input->post('name');
            $data['category'] = $this->input->post('category');
            $data['subcategory'] = $this->input->post('subcategory');
            $data['start_date'] = $this->input->post('start_date');
            $data['end_date'] = $this->input->post('end_date');
            $data['url'] = $this->input->post('url');

            $data['advertise_platform'] = $this->input->post('advertise_platform');
            $data['advertiser'] = $this->input->post('advertiser');
            $data['devices'] = $this->input->post('devices');
            $data['op_systems'] = $this->input->post('op_systems');
            $data['region'] = $this->input->post('region');
            $data['country_id'] = $this->input->post('country_id');
            $data['carriers'] = $this->input->post('carriers');
            $data['currency'] = $this->input->post('currency');
            $data['revenue'] = $this->input->post('revenue');
            $data['payout_affiliate'] = $this->input->post('payout_affiliate');
            $data['payout_frequency'] = $this->input->post('payout_frequency');
            $data['share_offer'] = $this->input->post('share_offer');

           
            if($offer_id == "")
            {
                $insert = $this->QueryModel->insertRecord('tbl_offer',$data);
                $message = "Offer added sucessfully.";
            }
            else
            {
                $insert = $this->QueryModel->updateRecord('tbl_offer',$data,array('id'=>$offer_id));
                $message = "Offer updated sucessfully.";
            }
            
            if($insert)
            {
                $response['status'] = "1";
                $response['redirect'] = base_url('admin/offers');
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
        $this->SecurityModel->adminRole('offers');
        $response = array();
        $response['status'] = "0"; 
        $id = $this->input->post('id');
        $value = $this->input->post('value');
        if($id != "" || $value != "")
        {
            $data = array(
                'status' => $value
            ); 
            $update = $this->QueryModel->updateRecord('tbl_offer',$data,array('id'=>$id));
            if($update)
            {
                $response['status'] = "1";
                if($value == 1)
                {
                    $response['message'] = "Offer activated successfully.";
                    $this->session->set_flashdata('successMsg', "Offer activated successfully.");
                }
                else
                {
                    $response['message'] = "Offer deactivated successfully.";
                    $this->session->set_flashdata('successMsg', "Offer deactivated successfully.");
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
        $this->SecurityModel->adminRole('offers');
		$response = array();
        $response['status'] = "0"; 
        $offer_id = $this->input->post('offer_id');
        $checkOff = $this->QueryModel->selectSingelRecord('tbl_offer',array('id'=>$offer_id));
        if(!empty($checkOff))
        {
            $delete = $this->QueryModel->deleteRecord('tbl_offer',array('id'=>$offer_id),'','');
            if($delete)
            {
                $response['status'] = "1";
                $response['message'] = "Offer deleted successfully.";
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