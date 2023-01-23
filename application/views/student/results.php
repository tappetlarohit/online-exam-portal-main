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


<results_sec>
    <div id="yourresults">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="exam_select">
                        <form method="POST" action="<?php echo base_url('student/filter-results');?>">
                            <label for="">Select Your Exam</label> <br>
                            <select name="pqe_subject_id" required class="form-control" aria-label="Default select example">
                                <option value="All">All</option>
                                <?php 
                                    if(!empty($subjects)){
                                        foreach($subjects as $row){
                                ?>
                                <option <?php if(!empty($subject_id)){ if($subject_id==$row->s_id){ echo "selected"; } }?> value="<?php echo $row->s_id;?>"><?php echo $row->s_name;?></option>
                                <?php } } ?>
                                  </select><br>
                                  <button type="submit" class="btn btn-success">Continue</button>
                        </form>
                        <br>
                        
                    </div>
                </div>
                <div class="col-md-9"></div>
            </div>
            <br>
            <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Test Id</th>
                    <th>Name Of The Exam</th>
                    <th>Total Questions</th>
                    <th>Your Score</th>
                    <th>Grade</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if(!empty($results)){
                      $sno = 0;
                      $finalgrade = 0;
                      $subjectgrade = 0;
                      $sumofsubjectgrades = 0;
                      foreach($results as $row){
                          $subjectgrade = ($row->totalmarks/$row->totalquestions)*100/10;
                          $sumofsubjectgrades = $sumofsubjectgrades+ $subjectgrade;
                  ?>
                  <tr>
                    <td><?php echo ++$sno;?></td>
                    <td><?php echo $row->sts_test_id;?></td>
                    <td><?php echo $row->s_name;?></td>
                    <td><?php echo $row->totalquestions;?></td>
                    <td><?php echo $row->totalmarks;?></td>
                    <td><?php echo $subjectgrade;?></td>
                  </tr>
                  <?php } 
                    $finalgrade = $sumofsubjectgrades/$sno;
                } ?>
                </tbody>
              </table>
          </div>
   
                <div class="col-md-12">
                    <div class="your_grade">
                        <h3>Your Total Grade <span><?php echo round($finalgrade,1) ;?> </span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</results_sec>





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
