<?php if(!$this->session->userdata('u_role_id')){ redirect('/'); }?>
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


<student_detials>
    <div id="studentdetails">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <div class="details_sec">
                            <div class="img">
                                <img src="<?php echo base_url();?>student_assets/images/Student/user.png" alt="" width="25%">
                            </div>
                            <div class="details_info">
                                <p> <b>Name:</b> <?php echo $this->session->userdata('u_name');?> </p>
                                <p> <b>Email:</b> <?php echo $this->session->userdata('u_email');?> </p>
                                <?php 
                                    if($this->session->userdata('u_role_id')==2){
                                ?>
                                <p> <b>Subject Assigned:</b> <?php echo $this->session->userdata('subject_name');?> </p>
                                <?php } ?>

                            </div>
                           

                        </div>
                    </div>
            </div>
        </div>
    </div>
</student_detials>





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