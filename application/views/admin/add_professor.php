<?php if($this->session->userdata('u_role_id')!=1){ redirect('/'); }?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/css/style.css">
    <title>Exam Admin Portal</title>
</head>

<body>
<?php $this->load->view('common/navbar');?>
    <div id="cmm_bm"></div>

<professors>
<div id="professors_sec">
    <div class="container">
       
        <div class="row">
            <div class="col-md-6">
                <div class="login_left">
                    <img src="<?php echo base_url();?>admin_assets/images/login.webp" alt="" width="100%">
                </div>
            </div>
            <div class="col-md-6">
                <div class="login_form">
                    <form action="<?php echo base_url('admin/register-professor');?>" method="POST">
                       
                        <h2>Add Professor Form</h2>
                        <?php 
                                    if(!empty($this->session->flashdata('message'))){
                                        echo $this->session->flashdata('message');
                                        unset($_SESSION['message']);
                                    }
                                ?>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter professor Name"
                                name="u_name" required>
                        </div>
                        <div class="form-group">
                            <label for="uname">Email</label>
                            <input type="email" class="form-control" id="uname" placeholder="Enter User Name"
                                name="u_email" required>
                        </div>
                    
                        <label for="uname">Subject</label>
                        <select name="ps_subject_id" required class="form-control" aria-label="Default select example">
                            <option value="">Select Subject</option>
                            <?php 
                                if(!empty($subjects)){
                                    foreach($subjects as $row){
                            ?>
                            <option value="<?php echo $row->s_id;?>"><?php echo $row->s_name;?></option>
                            <?php } } ?>
                          </select>
                          <br>
                          <div class="form-group">
                            <label for="uname">Password</label>
                            <input type="password" class="form-control" id="uname" placeholder="Enter User Name"
                                name="u_password">
                        </div>
                        <div class="btn_sec">
                            <button type="submit" class="btn btn-success" style="float: left;"> Add Professor </button>  <br>  <br>
                            <!-- <button class="btn btn-info" style="float: right;">
                                <a href="signup.html">Signup Here</a>
                            </button> -->
                        </div>
                      
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

</professors>


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
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>