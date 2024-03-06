<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->QueryModel->setTimezone();
  }

  

  public function index()
  {
    $this->load->view('admin/resetPassword'); 
  }

  public function passwordUpdate()
  {
    $data = array();
    $token = @$_POST['token'];
    if($token != "")
    {
        if($_POST['password'] != "")
        {
            if(strlen($_POST['password']) > 5)
            {
                if($_POST['password'] == $_POST['confirmPassword'])
                {
                    $tokenWhere = array('pass_token'=>$token);
                    $checkToken = $this->QueryModel->selectSingelRecord('tbl_password_reset', $tokenWhere);
                    if(!empty($checkToken))
                    {
                        $date = strtotime(date('Y-m-d H:i:s'));
                        $expDate = strtotime($checkToken['expire_at']);
                        if($date < $expDate)
                        {
                            if($_POST['otp'] == $checkToken['otp'])
                            {
                                if($checkToken['user_type'] == "1")
                                {
                                    $updateWhere = array('id' => $checkToken['admin_id']);
                                    $updateData = array(
                                        'password' => $this->QueryModel->passwordHash($_POST['password'])
                                    );
                                    $updatePassword = $this->QueryModel->updateRecord('tbl_admin', $updateData,$updateWhere);
                                    if($updatePassword == 1)
                                    {
                                        $this->db->delete('tbl_password_reset',array('admin_id'=>$checkToken['admin_id']));
                                        $data['status'] = 1;
                                        $data['message'] = "Password reset sucessfully.";
                                    }
                                    else
                                    {
                                        $data['status'] = 0;
                                        $data['message'] = "Something went wrong!";
                                    }
                                }
                                else
                                {
                                    $updateWhere = array('id' => $checkToken['user_id']);
                                    $updateData = array(
                                        'password' => $this->QueryModel->passwordHash($_POST['password'])
                                    );
                                    $updatePassword = $this->QueryModel->updateRecord('tbl_user', $updateData,$updateWhere);
                                    if($updatePassword == 1)
                                    {
                                        $this->db->delete('tbl_password_reset',array('user_id'=>$checkToken['user_id']));
                                        $data['status'] = 1;
                                        $data['message'] = "Password reset sucessfully.";
                                    }
                                    else
                                    {
                                        $data['status'] = 0;
                                        $data['message'] = "Something went wrong!";
                                    }
                                }
                            }
                            else
                            {
                                $data['message'] = "Invalid OTP!";
                            } 
                            
                        }
                        else
                        {
                            $data['status'] = 0;
                            $data['message'] = "Your reset password link is expired.";
                        }
                    }
                    else
                    {
                        $data['status'] = 0;
                        $data['message'] = "Your reset password link is invalid.";
                    }
                }
                else
                {
                    $data['status'] = 0;
                    $data['message'] = "Password and confirm password does not match.";
                }
            }
            else
            {
                $data['status'] = 0;
                $data['message'] = "Your password must be 6 character long.";
            }
        }
        else
        {
            $data['status'] = 0;
            $data['message'] = "Please fill password and confirm password field.";
        }
    }
    else
    {
        $data['status'] = 0;
        $data['message'] = "Something went wrong!";
    }

    echo json_encode($data);
  }



  function verifyEmail($verificationText=NULL){  
    $noRecords = $this->QueryModel->verifyEmailAddress($verificationText);  
    if ($noRecords > 0){  
      $error = array( 'success' => "Email Verified Successfully!"); 
    }else{
      $error = array( 'error' => "Sorry Unable to Verify Your Email!"); 
    }
    $data['errormsg'] = $error; 
    $this->load->view('verifyEmail', $data);   
  }



}
?>