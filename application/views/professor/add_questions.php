<?php if($this->session->userdata('u_role_id')!=2){ redirect('/'); }?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>professor_assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>professor_assets/css/style.css">
    <title>Exam Admin Portal</title>
</head>

<body>
 <?php $this->load->view('common/navbar');?>
    <div id="cmm_bm"></div>

    <Add_questions>
        <div id="questions">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="qustions_title">
                            <h5>Add Questions Here</h5>
                        </div>
                    </div>
                </div>
                <?php 
                                    if(!empty($this->session->flashdata('message'))){
                                        echo $this->session->flashdata('message');
                                        unset($_SESSION['message']);
                                    }
                                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="Update_questions">
                                <form action="<?php echo base_url('professor/save-question');?>" method="POST">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Question">Type Question</label>
                                                <input type="text" name="pqe_question" class="form-control" id="email" required>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Question">Option 1 </label>
                                                <input type="text" name="pqe_option1" class="form-control" id="email" required>
                                              </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Question">Option 2 </label>
                                                <input type="text" name="pqe_option2" class="form-control" id="email" required>
                                              </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Question">Option 3 </label>
                                                <input type="text" name="pqe_option3" class="form-control" id="email" required>
                                              </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="Question">Option 4 </label>
                                                <input type="text" name="pqe_option4" class="form-control" id="email" required>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="pqe_answer" required class="form-control" aria-label="Default select example">
                                                <option selected>Select Correct Option</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                                <option value="4">Option 4</option>
                                            </select>
                                        </div> 
                                        
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success">Add Question</button>
                                        </div>
                                    </div>
                                    <br>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Add_questions>

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
<script src="<?php echo base_url();?>professor_assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>professor_assets/js/bootstrap.js"></script>