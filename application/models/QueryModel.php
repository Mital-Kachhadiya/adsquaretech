<?php
class QueryModel extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->setTimezone();
    }

    function setTimezone(){
	    date_default_timezone_set('Asia/Kolkata');
    }

    function dateFormat($date){
        $timezone = $this->session->userdata('timezone');
        $datenew = new DateTime($date, new DateTimeZone(date_default_timezone_get ( )));
        $datenew->setTimezone(new DateTimeZone($timezone));
        return $datenew->format('d-m-Y');
    }

    function timeFormat($time){
        $newTime = date('h:i A', strtotime($time));
        return $newTime;
    }

    function dbDateFormat($date){
        $newDate = date('Y-m-d', strtotime($date));
        return $newDate;
    }

    function dbTimeFormat($time){
        $newTime = date('H:i:s', strtotime($time));
        return $newTime;
    }

    function dateTimeFormat($dateTime){
        $timezone = $this->session->userdata('timezone');
        $datenew = new DateTime($dateTime, new DateTimeZone(date_default_timezone_get ( )));
        $datenew->setTimezone(new DateTimeZone($timezone));
        return $datenew->format('F d, Y h:i:s A');
    }

    function dateWordFormat($dateTime){
        $newDateTime = date('j M, Y', strtotime($dateTime));
        return $newDateTime;
    }
    
    function generateToken(){
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    function passwordHash($password){
        $options = array(
            'cost' => 12,
          );
        $hashedPass=password_hash($password, PASSWORD_BCRYPT, $options);

        return $hashedPass;
    }
    
    function getIp(){
        return $_SERVER['REMOTE_ADDR'];
    }

    function dbDate(){
        return date('Y-m-d h:i:s');
    }

	function insertRecord($tbl_name, $data)
    {
        $data['ip_address'] = $this->getIp();
    	$data['created_at'] = $this->dbDate();
    	$data['updated_at'] = $this->dbDate();
    	$this->db->insert($tbl_name, $data);
    	$insert_id = $this->db->insert_id();
   		return  $insert_id;
    }

    function insertMultipleRecord($tbl_name, $data)
    {
        $dbData = array();
        $dbData['ip_address'] = $this->getIp();
    	$dbData['created_at'] = $this->dbDate();
    	$dbData['updated_at'] = $this->dbDate();
        $cntRecords = count($data);
        for($i=0;$i<$cntRecords;$i++)
        {
            $newData[] = array_merge_recursive($data[$i],$dbData);
        }
        $action = $this->db->insert_batch($tbl_name, $newData); 
        if($action == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    function updateRecord($tbl_name, $data, $where)
    {
        $data['ip_address'] = $this->getIp();
        $data['updated_at'] = $this->dbDate();
        $this->db->where($where);
        $update = $this->db->update($tbl_name,$data);
        if($update == true)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }  

    function selectSingelRecord($tbl_name, $where)
	{
		$this->db->select('*');
		if($where != ""){
			$this->db->where($where);
		}
		$this->db->from($tbl_name);
    	$record = $this->db->get();
   		return $record->row_array();
    }

    function getLastRecord($tbl_name, $where)
    {
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');

        $this->db->select('*');
        if($where != ""){
            $this->db->where($where);
        }
        $this->db->where('created_at = ', $curr_date);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(1);
        $this->db->from($tbl_name);
        $record = $this->db->get();
        return $record->row_array();
    }
    
    function deleteRecord($tbl_name, $where, $img_field, $path)
	{
		$this->db->select('*');
		if($where != ""){
			$this->db->where($where);
        }
        $this->db->from($tbl_name);
    	$record = $this->db->get();
        $rows = $record->result_array();
        $ttl_record = $record->num_rows();
        if($ttl_record > 0)
        {
            foreach($rows as $row)
            {
                
                if($img_field != "")
                {
                    if(!empty($row[$img_field]))
                    {
                        $prev_file_path = $path.$row[$img_field];
                        if(file_exists($prev_file_path))
                        {
                            unlink($prev_file_path);
                        }
                    } 
                }
                
            }
            $this->db->where($where);
            $record = $this->db->delete($tbl_name);
            if($record == true)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        
	}
 
    function selectMultipleRecord($tbl_name, $where)
    {
        $this->db->select('*');
        if($where != ""){
            $this->db->where($where);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get();
        return $record->result_array();
    }

    function selectMultipleRecordFilter($tbl_name, $where='', $orderBy='', $start='', $limit='')
    {
        $this->db->select('*');
        if($where != ""){
            $this->db->where($where);
        }
        if($orderBy != "")
        {
            $this->db->order_by($orderBy);
        }
        if($limit != "")
        {
            $this->db->limit($limit,$start);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get();
        return $record->result_array();
    }

    function countRecord($tbl_name, $where)
    {
        $this->db->select('*');
        if($where != ""){
            $this->db->where($where);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get();
        return $record->num_rows();
    }

    function sumRecord($tbl_name, $field, $where, $like)
    {
        $this->db->select_sum($field,'total');
        if($where != ""){
            $this->db->where($where);
        }
        if($like != ""){
            $this->db->like($like);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get();
        //echo $this->db->last_query();exit();
        $res = $record->row_array();
        return $res['total']==''?'0':$res['total'];
    }

    function uniqueCodeGenerator($tbl_name, $field, $limit)
    {
        $randomCode = $this->db->query('SELECT LPAD(FLOOR(RAND() * 999999999999999), '.$limit.', 0) AS random_num FROM '.$tbl_name.' WHERE "random_num" NOT IN (SELECT '.$field.' FROM '.$tbl_name.' WHERE '.$field.' != 0) LIMIT 1')->row_array();
        return $randomCode['random_num'];
    }
    

    function removeImage($tbl_name, $where, $field, $path)
    {
        $this->db->select($field);
        if($where != ""){
            $this->db->where($where);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get()->result_array();
        
        foreach ($record as $row) 
        {
            $prev_file_path = $path.$row[$field];
            if(!empty($row[$field]))
            {
                if(file_exists($prev_file_path))
                {
                    unlink($prev_file_path);
                    
                }
            }  
        }
        return 1;
    }

    function removeTmpImage($path,$images)
    {
        if(is_array($images))
        {
            foreach($images as $image)
            {
                $prev_file_path = $path.$image;
                if(file_exists($prev_file_path))
                {
                    unlink($prev_file_path);
                    
                }
            }
        }
        else
        {
            $prev_file_path = $path.$images;
            if(file_exists($prev_file_path))
            {
                unlink($prev_file_path);
                
            }
        }
    }

    function sendText($mobile, $message)
    {
        $params = array(
            "Phno" => $mobile,
            "Msg" => urlencode($message),
            "Password" => MSG_PASSWORD,
            "SenderID"=> MSG_SENDER_ID,
            "UserID"=> MSG_USER_ID
        );
        $postData = '';
        foreach($params as $k => $v) 
        { 
            $postData .= $k . '='.$v.'&'; 
        }
        $postData = rtrim($postData, '&');
        $cnt = count(explode('&',$postData));
        $url='https://nimbusit.biz/api/SmsApi/SendBulkApi';

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_POST, $cnt);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    

        $output=curl_exec($ch);

        curl_close($ch);
        
        return json_decode($output,true);
    }

    function verifyEmailAddress($verificationcode){  
        $sql = "update tbl_user set is_email_verify = '1' WHERE email_verify_code=?";
        $this->db->query($sql, array($verificationcode));
        return $this->db->affected_rows(); 
    }

    function send_push_notification_android($device_token,$title,$message)
    {
        date_default_timezone_set('UTC');
        $data = array("title" => $title, 'text' => $message);

        $notification = array(
            "title" => $title, 
            "body" => $message,
              //"image"=>"",
              //"click_action" => "FCM_PLUGIN_ACTIVITY", // Function clic only Android
            "content_available" => true, // only IOS
            "sound" => "default"
        );

        $post = array(
            'data' => $data,
            "notification" => $notification,
            'to' => $device_token,// '/topics/all', // default channel
            "priority" => "high",
        );

        $apiKey = $this->config->item('api_key');

        $headers = array( 
            'Authorization:key='.$apiKey,
            'Content-Type:application/json'
        );

        $ch = curl_init(); // Initialize curl handle       
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');// Set URL to FCM push endpoint         
        curl_setopt($ch, CURLOPT_POST, true); // Set request method to POST
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);// Set custom request headers  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// Get the response back as string instead of printing it  
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));// Set JSON post data
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));      
        }
        curl_close($ch);// Close curl handle
        return json_decode($result,true);
    }
    

    function selectSingleRecordFilter($tbl_name, $where='', $orderBy='', $start='', $limit='')
    {
        $this->db->select('*');
        if($where != ""){
            $this->db->where($where);
        }
        if($orderBy != "")
        {
            $this->db->order_by($orderBy);
        }
        if($limit != "")
        {
            $this->db->limit($limit,$start);
        }
        $this->db->from($tbl_name);
        $record = $this->db->get();
        return $record->row_array();
    }

    
    
}
?>
