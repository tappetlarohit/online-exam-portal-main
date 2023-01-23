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

<view_qu>
    <div id="questions">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="questions_tit">
                        <h5>View Your Updated Questions</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="indiv_questions">
                        <?php 
                            if(!empty($qa)){
                                $sno = 0;
                                foreach($qa as $row){
                        ?>
                        <div class="div">
                            <p><b>Questions : <?php echo ++$sno;?>&nbsp;&nbsp;<a onclick="return confirm('Are you sure?');" href="<?php echo base_url('professor/delete-question/'.$row->pqe_id);?>"><i style="color:red;" class="fa fa-trash"></i></a></b> </p> 
                            <P><?php echo $row->pqe_question;?></P>
                            <p><?php echo $row->pqe_option1;?><?php if($row->pqe_answer==1){ ?>&nbsp;<i style="color:green;" class="fa fa-check"></i></p> <?php } ?>
                            <p><?php echo $row->pqe_option2;?><?php if($row->pqe_answer==2){ ?>&nbsp;<i style="color:green;" class="fa fa-check"></i></p> <?php } ?>
                            <p><?php echo $row->pqe_option3;?><?php if($row->pqe_answer==3){ ?>&nbsp;<i style="color:green;" class="fa fa-check"></i></p> <?php } ?>
                            <p><?php echo $row->pqe_option4;?><?php if($row->pqe_answer==4){ ?>&nbsp;<i style="color:green;" class="fa fa-check"></i></p> <?php } ?>
                        </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</view_qu>

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