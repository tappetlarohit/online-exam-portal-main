<?php
    error_reporting(0);
    ob_start();
    defined('BASEPATH') or exit('No direct script access allowed!!');
    class DB_Queries extends CI_Model{
        public function __construct(){
            parent::__construct();
            date_default_timezone_set('Asia/Kolkata');
            $this->db->db_debug = false;
        }
        function DBErrorHandler(){
            $insert_id = $this->db->insert_id();
            $dbError = $this->db->error();
            if(!empty($dbError['code'])){
                return $dbError['code'];
            }else{
                return $insert_id;
            }
        }
        function insertUser($data){
            $this->db->insert('users',$data);
            return $this->DBErrorHandler();
        }
        function login($u_email,$u_password){
            return $this->db->select('u_id, u_name, u_email, u_role_id')->from('users')->where(['u_email' => $u_email, 'u_password' => $u_password])->get()->result();
        }
        function getallSubjects(){
            return $this->db->select('s_id, s_name')->from('subjects')->get()->result();
        }
        function insertProfessorSubject($data){
            $this->db->insert('professor_subjects',$data);
            return $this->DBErrorHandler();
        }
        function getProfessorsWithSubjects(){
            return $this->db->select('u_id,u_name,s_name')->from('users')->join('professor_subjects','professor_subjects.ps_user_id=users.u_id')->join('subjects','subjects.s_id=professor_subjects.ps_subject_id')->group_by('users.u_id')->get()->result();
        }
        function deleteProfessor($u_id){
            $this->db->where('u_id',$u_id)->delete('users');
            $this->db->where('ps_user_id',$u_id)->delete('professor_subjects');
        }
        function getProfessorBySubject($subject_id){
            return $this->db->select('u_id,u_name,s_name')->from('users')->join('professor_subjects','professor_subjects.ps_user_id=users.u_id')->join('subjects','subjects.s_id=professor_subjects.ps_subject_id')->where('professor_subjects.ps_subject_id',$subject_id)->group_by('users.u_id')->get()->result();
        }
        function getSubjectByProfessor($professor_id){
            return $this->db->select('s_id,s_name')->from('professor_subjects')->join('subjects','subjects.s_id=professor_subjects.ps_subject_id')->where('professor_subjects.ps_user_id',$professor_id)->get()->result();
        }
        function insertProfessorQAEntry($data){
            $this->db->insert('professor_qa_entries',$data);
        }
        function getProfessorQAEntries($professor_id){
            return $this->db->select('*')->from('professor_qa_entries')->where('pqe_professor_id',$professor_id)->get()->result();
        }
        function getQABySubject($subject_id){
            return $this->db->select('*')->from('professor_qa_entries')->where('pqe_subject_id',$subject_id)->get()->result();
        }
        function insertStudentTestSubmission($data){
            $this->db->insert('student_test_submissions',$data);
        }
        function getMarksByQuestionAnswer($question_id, $answer){
            $getAnswerByQuestion = $this->db->select('pqe_answer')->from('professor_qa_entries')->where('pqe_id',$question_id)->get()->result();
            if(!empty($getAnswerByQuestion)){
                if($getAnswerByQuestion[0]->pqe_answer==$answer){
                    return 1;
                }else{
                    return 0;
                }
            }
        }
        function getstudentResults($student_id=null){
            if(!empty($student_id)){
                return $this->db->query("SELECT *,(SELECT COUNT(sts2.sts_id) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalquestions,(SELECT SUM(sts2.sts_marks) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalmarks FROM `student_test_submissions` sts join professor_qa_entries pqe on pqe.pqe_id=sts.sts_question_id join subjects s on s.s_id=pqe.pqe_subject_id join users u on u.u_id=sts.sts_user_id where sts.sts_user_id=$student_id GROUP BY sts.sts_test_id ORDER BY sts.sts_id DESC;")->result();
            }else{
                return $this->db->query("SELECT *,(SELECT COUNT(sts2.sts_id) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalquestions,(SELECT SUM(sts2.sts_marks) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalmarks FROM `student_test_submissions` sts join professor_qa_entries pqe on pqe.pqe_id=sts.sts_question_id join subjects s on s.s_id=pqe.pqe_subject_id join users u on u.u_id=sts.sts_user_id GROUP BY sts.sts_test_id ORDER BY sts.sts_id DESC;")->result();
            }
        }
        function getstudentResultsForProfessor($subject_id=null){
            return $this->db->query("SELECT *,(SELECT COUNT(sts2.sts_id) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalquestions,(SELECT SUM(sts2.sts_marks) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalmarks FROM `student_test_submissions` sts join professor_qa_entries pqe on pqe.pqe_id=sts.sts_question_id join subjects s on s.s_id=pqe.pqe_subject_id join users u on u.u_id=sts.sts_user_id where s.s_id=$subject_id GROUP BY sts.sts_test_id ORDER BY sts.sts_id DESC;")->result();
        }
        function getstudentResultsBySubject($student_id,$subject_id){
            return $this->db->query("SELECT *,(SELECT COUNT(sts2.sts_id) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalquestions,(SELECT SUM(sts2.sts_marks) FROM student_test_submissions sts2 WHERE sts2.sts_test_id=sts.sts_test_id) as totalmarks FROM `student_test_submissions` sts join professor_qa_entries pqe on pqe.pqe_id=sts.sts_question_id join subjects s on s.s_id=pqe.pqe_subject_id where sts.sts_user_id=$student_id AND s.s_id=$subject_id GROUP BY sts.sts_test_id ORDER BY sts.sts_id DESC;")->result();
        }
        function deleteQuestion($question_id){
            $this->db->where('pqe_id',$question_id)->delete('professor_qa_entries');
        }
    }
?>