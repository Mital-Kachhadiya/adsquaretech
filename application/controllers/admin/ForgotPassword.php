<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->QueryModel->setTimezone();
    $this->load->config('email');
    $this->load->library('email');
  }

  

  public function index()
  {
    $this->load->view('admin/forgotPassRequest'); 
  }

  public function checkRequest()
  {
    $response = array();
    $response['status'] = "0";
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if($this->form_validation->run()==FALSE){
        $errorString = strip_tags(form_error('email'));
        $response['message'] = $errorString;
    }
    else
    {
        $email = $this->input->post('email');
        $checkEmail = $this->QueryModel->selectSingelRecord('tbl_admin',array('email' => $email));
        if(!empty($checkEmail))
        {
            $userId = $checkEmail['id'];
            $otp = rand(1000,9999);
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y") );
            $expDate = date("Y-m-d H:i:s",$expFormat);
            $passToken = md5(uniqid().date('Y-m-d h:i:s a').$email."admin");
            $data['expire_at'] = $expDate;
            $data['pass_token'] = $passToken;
            $data['admin_id'] = $userId;
            $data['user_type'] = "1";
            $data['otp'] = $otp;
            $checkReq = $this->QueryModel->selectSingelRecord('tbl_password_reset', array('admin_id'=>$userId,'user_type'=> "1"));
            if($checkReq)
            {
                $action = $this->QueryModel->updateRecord('tbl_password_reset', $data,array('admin_id'=>$userId));
            }
            else
            {
                $action = $this->QueryModel->insertRecord('tbl_password_reset',$data);
            }
            if(@$action)
            {
                $viewData = array();
                $viewData['token'] = $passToken;
                $viewData['otp'] = $otp;
                $viewData['userType'] = "1";
                $viewData['tokenUrl'] = base_url().'reset-password/'.$passToken;
                $subject = 'adsquaretech - Reset Password';
                $message = $this->load->view('email/forgotPassword',$viewData,true);
                $from = $this->config->item('smtp_user');
                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($message);
                if ($this->email->send()) 
                {
                    $response['status'] = "1";
                    $response['message'] = "Check your inbox.";
                } 
                else 
                {
                    // $response['message'] = "Something went wrong!.";
                    $error = show_error($this->email->print_debugger());
                    if(!empty($error))
                    {
                        $response['message'] = $error;
                    }

                }
            }
            else
            {
                $response['message'] = "Something went wrong!";
            }
        }
        else
        {
            $response['message'] = "Your email not found!";
        }
    }
    echo json_encode($response);
  }
}
?>