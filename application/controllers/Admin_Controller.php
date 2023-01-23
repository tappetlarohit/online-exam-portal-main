<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class Admin_Controller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
        }
        function add_professor(){
            $data['subjects'] = $this->query->getallSubjects();
            $this->load->view('admin/add_professor',$data);
        }
        function register_professor(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $u_name = $this->input->post('u_name');
            $u_email = $this->input->post('u_email');
            $u_password = sha1($this->input->post('u_password'));
            $u_role_id = 2;
            $u_created_at = Date('Y-m-d H:i:s');
            $ps_subject_id = $this->input->post('ps_subject_id');
            $data = [
                'u_name'        =>      $u_name,
                'u_email'       =>      $u_email,
                'u_password'    =>      $u_password,
                'u_role_id'     =>      $u_role_id,
                'u_created_at'  =>      $u_created_at
            ];
            $dbresponse = $this->query->insertUser($data);
            if($dbresponse==1062){
                $this->session->set_flashdata('message',$this->settings->getMessage('Email is already registered in the system',0));
            }else{
                $professorSubjectData = [
                    'ps_user_id'        =>      $dbresponse,
                    'ps_subject_id'     =>      $ps_subject_id,
                    'ps_created_at'     =>      $u_created_at
                ];
                $professor_subject_db_response = $this->query->insertProfessorSubject($professorSubjectData);
                if($professor_subject_db_response==1062){
                    $this->query->deleteProfessor($dbresponse);
                    $this->session->set_flashdata('message',$this->settings->getMessage('This subject is already allocated to professor, try with other subject',0));
                }else{
                    $this->session->set_flashdata('message',$this->settings->getMessage('Professor added sucessfully',1));
                }
            }
            redirect('admin/add-professor');
        }
        function view_professors(){
            $data['subjects'] = $this->query->getallSubjects(); 
            $data['professors'] = $this->query->getProfessorsWithSubjects();
            $data['selected_subject'] = 'All';
            $this->load->view('admin/viewprofessors',$data);
        }
        function delete_profesor($u_id){
            $this->query->deleteProfessor($u_id);
            redirect('admin/viewprofessors');
        }
        function filter_professor_by_subject(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $ps_subject_id = $this->input->post('ps_subject_id');
            if($ps_subject_id=="All"){
                redirect('admin/viewprofessors');
            }
            $data['subjects'] = $this->query->getallSubjects(); 
            $data['professors'] = $this->query->getProfessorBySubject($ps_subject_id);
            $data['selected_subject'] = $ps_subject_id;
            $this->load->view('admin/viewprofessors',$data);
        }
        function student_reports(){
            $data['results'] = $this->query->getstudentResults();
            $data['subjects'] = $this->query->getallSubjects();
            $data['subject_id'] = 'All';
            $this->load->view('admin/student_report',$data);
        }
        function student_complete_profile($student_id){
            $data['results'] = $this->query->getstudentResults($student_id);
            $data['subjects'] = $this->query->getallSubjects();
            $data['subject_id'] = 'All';
            $this->load->view('admin/reportcard',$data);
        }
        // function healthcheck(){
        //     $response = new Response('', 200, ['Content-Type' => 'text/plain']);
        //     return $this->render('Health check successful', [], $response);
        // }
    }
?>