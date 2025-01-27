<?php
    session_start();
    include('assets/inc/config.php');
    //date_default_timezone_set('Africa /Nairobi');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['a_id'];
    if(isset($_POST['Approve']))
    {

            //$c_fname=$_POST['c_fname'];
            //$c_mname=$_POST['c_mname'];
            //$c_lname = $_POST['c_lname'];
            //$c_phoneno=$_POST['c_phoneno'];
            //$c_addr=$_POST['c_addr'];
            //$c_email=$_POST['c_email'];
            $id = $_GET['c_id'];
            $c_appoint_stats=$_POST['c_appoint_stats'];
            //$c_speciality = $_POST['c_speciality']; 
            //$c_app_speciality=$_POST['c_app_speciality'];
            //$pass_ocupation=$_POST['pass_occupation'];
            //$pass_bio=($_POST['pass_bio']);
            //$passwordconf=md5($_POST['passwordconf']);
            //$date = date('d-m-Y h:i:s', time());
            $query="update ams_client set c_appoint_stats=? where c_id=?";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('si', $c_appoint_stats, $id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Appointment Approved";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            #echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
            }
?>
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include('assets/inc/head.php');?>
<!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    <!--Navigation Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Update Appointments </h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="doc-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Appointments</a></li>
              <li class="breadcrumb-item active">Manage Appointments</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($succ)) {?>
                                <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ;?>!","success");
                            },
                                100);
                </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Failed!","<?php echo $err;?>!","Failed");
                            },
                                100);
                </script>

        <?php } ?>
        <div class="main-content container-fluid">
        <?php
            $aid=$_GET['c_id'];
            $ret="select * from ams_client where c_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">Update Your Appointment Details<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_fname" value="<?php echo $row->c_fname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Middle Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_mname" value="<?php echo $row->c_mname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_lname" value="<?php echo $row->c_lname;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_phoneno" value="<?php echo $row->c_phoneno;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_addr" value="<?php echo $row->c_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">My Email</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_email" value="<?php echo $row->c_email;?>" id="inputText3" type="text">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Preferred Appointment Date</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="c_preff_date" value="<?php echo $row->c_preff_date;?>"  id="inputText3" type="date">
                      </div>
                    </div>

                    <div class="form-group row pt-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Approve Appointment</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <select name ="c_appoint_stats" class="form-control">
                          <option value="Approved" selected>Approved</option>
                          <option value="Pending">Pending</option>
                        </select>
                      </div>
                    </div>           
                    
              
                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-primary" value ="Submit" name = "Approve" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <?php }?>
        
        </div>
        <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
      </div>

    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>