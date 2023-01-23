<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class Common_Controller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
        }
        function index(){
            if($this->session->userdata('u_id')){
                redirect('common/dashboard');
            }
            $this->load->view('common/login');
        }
        function print_session(){
            if($this->session->userdata('u_id')){
                echo "<pre>";
                print_r($_SESSION);
                die;
            }else{
                redirect('/');
            }
        }
        function authentication(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $u_email = $this->input->post('u_email');
            $u_password = sha1($this->input->post('u_password'));
            $loginCheck = $this->query->login($u_email,$u_password);
            if(!empty($loginCheck)){
                $session = [
                    'u_id'      =>      $loginCheck[0]->u_id,
                    'u_role_id' =>      $loginCheck[0]->u_role_id,
                    'u_name'    =>      $loginCheck[0]->u_name,
                    'u_email'   =>      $loginCheck[0]->u_email
                ];
                $this->session->set_userdata($session);
                $this->session->sess_expiration = '600';
                redirect('common/dashboard');
            }else{
                $this->session->set_flashdata('message',$this->settings->getMessage('Invalid credentials!!',0));
                redirect('/');
            }
        }
        function logout(){
            $this->session->unset_userdata('u_id');
            $this->session->unset_userdata('u_role_id');
            $this->session->unset_userdata('u_name');
            $this->session->unset_userdata('u_email');
            $this->session->unset_userdata('subject_name');
            $this->session->unset_userdata('subject_id');
            redirect('/');
        }
        function landing(){
            $role_id = $this->session->userdata('u_role_id');
            $user_id = $this->session->userdata('u_id');
            if($role_id==2){
                $getProfessorSubject = $this->query->getSubjectByProfessor($user_id);
                if(!empty($getProfessorSubject[0]->s_name)){
                    $this->session->set_userdata(['subject_name' => $getProfessorSubject[0]->s_name]);
                    $this->session->set_userdata(['subject_id' => $getProfessorSubject[0]->s_id]);
                }
            }
            $this->load->view('common/dashboard');
        }
    }
?>