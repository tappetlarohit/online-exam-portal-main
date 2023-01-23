<?php if($this->session->userdata('u_role_id')!=3){ redirect('/'); }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>student_assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>student_assets/css/style.css">
    <title>Online Exam Portal</title>
</head>

<body>

  <?php $this->load->view('common/navbar');?>
    <div id="cmm_bm"></div>


    <exam_sec>
        <div id="exam_sec">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="exam_select">
                            <form action="<?php echo base_url('student/get-test-by-subject');?>" method="POST">
                                <label for="">Select Your Exam</label> <br>
                                <select name="pqe_subject_id" required class="form-control" aria-label="Default select example">
                                <option value="">Select Subject</option>
                                <?php 
                                    if(!empty($subjects)){
                                        foreach($subjects as $row){
                                ?>
                                <option <?php if(!empty($subject_id)){ if($subject_id==$row->s_id){ echo "selected"; } }?> value="<?php echo $row->s_id;?>"><?php echo $row->s_name;?></option>
                                <?php } } ?>
                                  </select><br>
                                  <button type="submit" class="btn btn-success">Continue</button><br><br>
                            </form>
                            <br>
                            
                        </div>
                    </div>
                    <div class="col-md-9"></div>
                </div>
                <?php 
                  if(!empty($qa)){
                    $sno=0;
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="questions_sec"> 
                            <h6> Answer All The Questions</h6>
                            <form action="<?php echo base_url('student/submit-test');?>" method="POST">
                                <input type="hidden" name="no_of_questions" value="<?php echo count($qa);?>">
                                <div class="all_question_sec">
                                    <?php 
                                      foreach($qa as $row){
                                        $a = ++$sno;
                                    ?>
                                    <div class="indiv_questions">
                                        <h6> <span>Q.No <span> <?php echo $a;?> </span> <?php echo $row->pqe_question;?></h6>
                                           <div class="form-check">
                                            <input required type="radio" class="form-check-input" name="sts_question_id<?php echo $a;?>" value="<?php echo $row->pqe_id;?>,1">
                                            <label class="form-check-label" for="radio1"><?php echo $row->pqe_option1;?></label>
                                          </div>
                                          <div class="form-check">
                                            <input required type="radio" class="form-check-input" name="sts_question_id<?php echo $a;?>"  value="<?php echo $row->pqe_id;?>,2">
                                            <label class="form-check-label" for="radio2"><?php echo $row->pqe_option2;?></label>
                                          </div>
                                          <div class="form-check">
                                            <input required type="radio" class="form-check-input"  name="sts_question_id<?php echo $a;?>"  value="<?php echo $row->pqe_id;?>,3">
                                            <label class="form-check-label" for="radio2"><?php echo $row->pqe_option3;?></label>
                                          </div>
                                          <div class="form-check">
                                            <input required type="radio" class="form-check-input" name="sts_question_id<?php echo $a;?>"  value="<?php echo $row->pqe_id;?>,4">
                                            <label class="form-check-label" for="radio2"><?php echo $row->pqe_option4;?></label>
                                          </div>
                                    </div>
                                   <?php } ?>
                                </div>
                                <input required type="checkBox"> <label for="">Checked All Questions Answers</label> <br>
                                <div class="btn_sec">
                                    <button type="submit" class="btn btn-success"> Submit Test </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </exam_sec>





<footer>
    <div id="footer_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_sec_title">
                        <p>Copy Rights Reserved By Online Exam Portal &#169; 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>






</body>

</html>
<script src="<?php echo base_url();?>student_assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>student_assets/js/bootstrap.js"></script>