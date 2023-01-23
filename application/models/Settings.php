<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class Settings extends CI_Model{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
        }
        function check_request_method($incoming_request, $accepted_request){
            if($incoming_request!=$accepted_request){
                redirect('/');
            }
        }
        function getMessage($message, $type){
            if($type==1){
                return '<b style="color:green;">'.$message.'</b>';
            }else{
                return '<b style="color:red;">'.$message.'</b>';
            }
        }
    }
?>