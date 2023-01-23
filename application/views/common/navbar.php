<style>
    .navbar-nav{
        width:600px !important;
    }
</style>
<?php 
    if(empty($this->session->userdata('role_id'))){
?>
<nav>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?php echo base_url();?>student_assets/images/logo/logo.png" alt="" width="5%"> &nbsp;
                    Online Exam Portal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a href="<?php echo base_url();?>" class="nav-link active">
                                User Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('student/signup');?>" class="nav-link active">
                                Student Signup
                            </a>
                        </li>
                        
                        <!-- <li class="nav-item">
                            <a href="" class="nav-link active">
                                About
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
    <?php } ?>


    <?php 
    if($this->session->userdata('u_role_id')==1){
?>
<nav>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?php echo base_url();?>student_assets/images/logo/logo.png" alt="" width="5%"> &nbsp;
                    Online Exam Portal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a href="<?php echo base_url('common/dashboard');?>" class="nav-link active">
                                Dashboard
                            </a>
                        </li>
                    <li class="nav-item">
                            <a href="<?php echo base_url('admin/add-professor');?>" class="nav-link active">
                                Add Professor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/viewprofessors');?>" class="nav-link active">
                                View Professors
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/student-reports');?>" class="nav-link active">
                                Student Reports
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url('common/logout');?>" class="nav-link active">
                                Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
    <?php } ?>

    <?php 
    if($this->session->userdata('u_role_id')==2){
?>
<nav>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?php echo base_url();?>student_assets/images/logo/logo.png" alt="" width="5%"> &nbsp;
                    Online Exam Portal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a href="<?php echo base_url('common/dashboard');?>" class="nav-link active">
                                Dashboard
                            </a>
                        </li>
                    <li class="nav-item">
                            <a href="<?php echo base_url('professor/add-questions');?>" class="nav-link active">
                                Add Questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('professor/viewquestions');?>" class="nav-link active">
                                View Questions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('professor/student-reports');?>" class="nav-link active">
                                Student Reports
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="<?php echo base_url('common/logout');?>" class="nav-link active">
                                Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
    <?php } ?>


    <?php 
    if($this->session->userdata('u_role_id')==3){
?>
<nav>
        <nav class="navbar navbar-dark navbar-expand-sm bg-dark fixed-top">
            <div class="container">
                <a href="#" class="navbar-brand">
                    <img src="<?php echo base_url();?>student_assets/images/logo/logo.png" alt="" width="5%"> &nbsp;
                    Online Exam Portal
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <a href="<?php echo base_url('common/dashboard');?>" class="nav-link active">
                                Dashboard
                            </a>
                        </li>
                    <li class="nav-item">
                            <a href="<?php echo base_url('student/take-test');?>" class="nav-link active">
                                Take Exam
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('student/results');?>" class="nav-link active">
                                Results
                            </a>
                        </li>
                      
                        <li class="nav-item">
                            <a href="<?php echo base_url('common/logout');?>" class="nav-link active">
                                Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </nav>
    <?php } ?>


    