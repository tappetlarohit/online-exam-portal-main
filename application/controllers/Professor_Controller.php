<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class Professor_Controller extends CI_Controller{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
        }
        function add_questions(){
            $this->load->view('professor/add_questions');
        }
        function save_question(){
            $this->settings->check_request_method($_SERVER['REQUEST_METHOD'],'POST');
            $pqe_professor_id = $this->session->userdata('u_id');
            $pqe_subject_id = $this->session->userdata('subject_id');
            $pqe_question = $this->input->post('pqe_question');
            $pqe_option1 = $this->input->post('pqe_option1');
            $pqe_option2 = $this->input->post('pqe_option2');
            $pqe_option3 = $this->input->post('pqe_option3');
            $pqe_option4 = $this->input->post('pqe_option4');
            $pqe_answer = $this->input->post('pqe_answer');
            $pqe_created_at = Date('Y-m-d H:i:s');
            $data = [
                'pqe_professor_id'      =>      $pqe_professor_id,
                'pqe_subject_id'        =>      $pqe_subject_id,
                'pqe_question'          =>      $pqe_question,
                'pqe_option1'           =>      $pqe_option1,
                'pqe_option2'           =>      $pqe_option2,
                'pqe_option3'           =>      $pqe_option3,
                'pqe_option4'           =>      $pqe_option4,
                'pqe_answer'            =>      $pqe_answer,
                'pqe_created_at'        =>      $pqe_created_at
            ];
            $this->query->insertProfessorQAEntry($data);
            $this->session->set_flashdata('message',$this->settings->getMessage('Question added sucessfully',1));
            redirect('professor/add-questions');
        }
        function viewquestions(){
            $profesor_id = $this->session->userdata('u_id');
            $data['qa'] = $this->query->getProfessorQAEntries($profesor_id);
            $this->load->view('professor/viewquestions',$data);
        }
        function delete_question($question_id){
            $this->query->deleteQuestion($question_id);
            redirect('professor/viewquestions');
        }
        function student_reports(){
            $subject_id = $this->session->userdata('subject_id');
            $data['results'] = $this->query->getstudentResultsForProfessor($subject_id);
            $this->load->view('professor/student_report',$data);
        }
    }
?>