<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($_SERVER['HTTP_HOST'] == "idea2codeinfotech.com")
{
    $config = array(
        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'ssl://smtpout.secureserver.net',
        'smtp_port' => 465,
        'smtp_user' => 'hr@idea2codeinfotech.com',
        'smtp_pass' => 'hr@Idea2code',//can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '7', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
}
else
{
    $config = array(
        'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'mitalkachhadiya951@gmail.com',
        'smtp_pass' => 'czxv bqed lzrj spsb',//can be 'ssl' or 'tls' for example
        'mailtype' => 'html', //plaintext 'text' mails or 'html'
        'smtp_timeout' => '7', //in seconds
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
}