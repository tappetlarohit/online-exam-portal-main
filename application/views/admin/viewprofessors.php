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

<viewprofessors>
    <div id="viewprofessoirs">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="exam_select">
                        <form method="POST" action="<?php echo base_url('admin/filter-professors-by-subject');?>">
                            <label for="">Select Subject</label> <br>
                            <select name="ps_subject_id" required class="form-control" aria-label="Default select example">
                            <option value="All">All</option>
                            <?php 
                                if(!empty($subjects)){
                                    foreach($subjects as $row){
                            ?>
                            <option <?php if(!empty($selected_subject)){ if($selected_subject==$row->s_id){ echo "selected"; } }?> value="<?php echo $row->s_id;?>"><?php echo $row->s_name;?></option>
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
                    <th>Name Of The Professor</th>
                    <th>Subject</th>
                    <th>Delete Professor</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        if(!empty($professors)){
                            $sno = 0;
                            foreach($professors as $row){
                    ?>
                  <tr>
                    <td><?php echo ++$sno;?></td>
                    <td><?php echo $row->u_name;?></td>
                    <td><?php echo $row->s_name;?></td>
                    <td><a onclick="return confirm('Are you sure?');" href="<?php echo base_url('admin/delete-professor/'.$row->u_id);?>"><img src="<?php echo base_url();?>admin_assets/images/trash.png" alt=""></a></td>
                  </tr>
                  <?php } } ?>
                </tbody>
              </table>
          </div>
            </div>
        </div>
    </div>
</viewprofessors>


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