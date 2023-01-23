<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class Student_Controller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
        }
        function signup(){
            $this->load->view('student/signup');
        }
        function register(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $u_name = $this->input->post('u_name');
            $u_email = $this->input->post('u_email');
            $u_password = sha1($this->input->post('u_password'));
            $u_role_id = 3;
            $u_created_at = Date('Y-m-d H:i:s');
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
                $this->session->set_flashdata('message',$this->settings->getMessage('Your registration is successful',1));
            }
            redirect('student/signup');
        }
        function take_test(){
            $data['subjects'] = $this->query->getallSubjects();
            $this->load->view('student/test',$data);
        }
        function get_test_by_subject(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $pqe_subject_id = $this->input->post('pqe_subject_id');
            $data['subjects'] = $this->query->getallSubjects();
            $data['qa'] = $this->query->getQABySubject($pqe_subject_id);
            $data['subject_id'] = $pqe_subject_id;
            $this->load->view('student/test',$data);
        }
        function submit_test(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $no_of_questions = $this->input->post('no_of_questions');
            $sts_test_id = mt_rand(1111111111,9999999999);
            for($i=1;$i<=$no_of_questions;$i++){
                $sts_user_id = $this->session->userdata('u_id');
                $explode = explode(',',$this->input->post('sts_question_id'.$i));
                $sts_question_id = $explode[0];
                $sts_student_answer = $explode[1];
                $sts_created_at = Date('Y-m-d H:i:s');
                $sts_marks = $this->query->getMarksByQuestionAnswer($sts_question_id,$sts_student_answer);
                $data = [
                    'sts_test_id'           =>          $sts_test_id,
                    'sts_user_id'           =>          $sts_user_id,
                    'sts_question_id'       =>          $sts_question_id,
                    'sts_student_answer'    =>          $sts_student_answer,
                    'sts_marks'             =>          $sts_marks,
                    'sts_created_at'        =>          $sts_created_at
                ];
                $this->query->insertStudentTestSubmission($data);
            }
            $this->session->set_flashdata('message',$this->settings->getMessage('Your test is submitted',1));
            redirect('student/results');
        }
        function results(){
            $student_id = $this->session->userdata('u_id');
            $data['results'] = $this->query->getstudentResults($student_id);
            $data['subjects'] = $this->query->getallSubjects();
            $data['subject_id'] = 'All';
            $this->load->view('student/results',$data);
        }
        function filter_results(){
            $student_id = $this->session->userdata('u_id');
            $data['subject_id'] = $this->input->post('pqe_subject_id');
            if($data['subject_id']=='All'){
                redirect('student/results');
            }
            $data['results'] = $this->query->getstudentResultsBySubject($student_id, $data['subject_id']);
            $data['subjects'] = $this->query->getallSubjects();
            $this->load->view('student/results',$data);
        }
    }
?>