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
    <student_signup>
        <div id="login_sec">
            <div class="container">
                <div class="row  login_sec_main">

                    <div class="col-md-6">
                        <div class="login_form">
                            <form action="<?php echo base_url('student/register');?>" method="post">
                                <b>Student Signup</b><br><br>
                                <?php 
                                    if(!empty($this->session->flashdata('message'))){
                                        echo $this->session->flashdata('message');
                                        unset($_SESSION['message']);
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Your Name"
                                        name="u_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Your Email"
                                        name="u_email" required>
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Password</label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Enter Your Password"
                                        name="u_password" required>
                                </div>
                                <div class="btn_sec">
                                    <button type="submit" class="btn btn-success"style="float: left;" >Signup</button> 

                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="login_left">
                            <img src="<?php echo base_url();?>student_assets/images/signup.webp" alt="" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </student_signup>





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