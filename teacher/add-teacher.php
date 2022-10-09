
<?php 
session_start();
require_once("./includes/head-ui.php");?>
<body>
  <div class="container-scroller">
    
    <!-- partial:partials/_navbar.html -->
    <?php require_once("./includes/navbar-ui.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once("./includes/side-bar-ui.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">

                <div>
                    <?php

                            require_once("./auxiliaries.php");
                          $headmastername = $_SESSION['headmastername']; 
                          $headmastercode = $_SESSION['headmastercode'];
                          $headmasterschool = $_SESSION['headmasterschool'];

                        if(isset($_POST['addteacher'])){
                            $teacherfirstname = sterilize($_POST['teacherfirstname']);
                            $teacherlastname = sterilize($_POST['teacherlastname']);
                            $teacherclass = sterilize($_POST['teacherclass']);
                            $teachergender = sterilize($_POST['teachergender']);
                            $teacheremail = sterilize($_POST['teacheremail']);
                            $teacherncontact = sterilize($_POST['teacherncontact']);
                            $teacheraddress = sterilize($_POST['teacheraddress']);

                            if(!empty($teacherfirstname) && !empty($teacherlastname)&& !empty($teacherclass) 
                            && !empty($teachergender) && !empty($teacheremail)&& !empty($teacherncontact)
                             && !empty($teacheraddress)){
                                //check if teacher already exist
                                $sqlCheckTeacherExist = "SELECT * FROM teachers WHERE teacherfirstname = :teacherfirstname
                                 AND teacherlastname = :teacherlastname AND teacherncontact = :teacherncontact";
                                $statement = $conn->prepare($sqlCheckTeacherExist);
                                $results = $statement->execute([
                                    ':teacherfirstname' => $teacherfirstname,
                                    ':teacherlastname' => $teacherlastname,
                                    ':teacherncontact' => $teacherncontact
                                ]);
                                $rows = $statement->rowCount();
                                $columns = $statement->fetchAll();

                                if($rows > 0){
                                    $_SESSION['message'] = "Teacher Already Attended!";
                                    $_SESSION['alert'] = "alert alert-warning";
                                } else{
                                   $sqlInsertTeacher = "INSERT INTO teachers(teacherfirstname, teacherlastname, teacherclass, teachergender,
                                   teacheremail, teacherncontact, teacheraddress, teacherschool) 
                                   VALUES(:teacherfirstname, :teacherlastname, :teacherclass, :teachergender, :teacheremail, :teacherncontact,
                                   :teacheraddress, :headmasterschool)";
                                   $statement = $conn->prepare($sqlInsertTeacher);
                                   $results = $statement->execute([
                                    ':teacherfirstname' => $teacherfirstname, 
                                    ':teacherlastname' => $teacherlastname, 
                                    ':teacherclass' => $teacherclass, 
                                    ':teachergender' => $teachergender, 
                                   ':teacheremail' => $teacheremail, 
                                    ':teacherncontact' => $teacherncontact,
                                    ':teacheraddress' => $teacheraddress,
                                    ':headmasterschool' => $headmasterschool
                                   ]);
                                   $columns = $statement->fetchAll();
                                   $rows = $statement->rowCount();

                                   if($results){
                                    $_SESSION['message'] = "Teacher Added Successfully!!";
                                    $_SESSION['alert'] = "alert alert-primary";
                                   } else{
                                    $_SESSION['message'] = "Something went wrong!!";
                                    $_SESSION['alert'] = "alert alert-danger";
                                   }
                                }
                            } else{
                                $_SESSION['message'] = "All Fields are required!";
                                $_SESSION['alert'] = "alert alert-danger";
                            }
                        }
                    
                    
                    ;?>

<?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
              
                <div class="tab-content rounded-bottom">
                                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                                                <form action="" method="POST" class="row g-3">
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationServer01">First name</label>
                                                    <input name="teacherfirstname" class="form-control" id="validationServer01" type="text"  required="">
                                                
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationServer02">Last name</label>
                                                    <input name="teacherlastname" class="form-control" id="validationServer02" type="text"  required="">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationServer02">Class</label>
                                                    <input name="teacherclass" class="form-control" id="validationServer02" type="text"  required="">
                                                </div>
            
                                                
                                                <div class="col-md-3">
                                                    <label class="form-label" for="validationServer04">Gender</label>
                                                    <select name="teachergender" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option>...</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                        
                                                    <div class="col-md-4">
                                                    <label class="form-label" for="validationServer01">Email</label>
                                                    <input name="teacheremail" class="form-control" id="validationServer01" type="text" required="">
                                                
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationServer02">Contact</label>
                                                    <input name="teacherncontact" class="form-control" id="validationServer02" type="text" required="">
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label" for="validationServer02">Address</label>
                                                    <input name="teacheraddress" class="form-control" id="validationServer02" type="text"  required="">
                                                </div>
                                    
                                                <div class="col-12">
                                                    <button name="addteacher" class="btn btn-primary" type="submit">Submit form</button>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                         
                </div>
              </div>
            </div>
          </div>
          <?php //require_once("./includes/dashboard-ui.php");?>
          <?php //require_once("./add-school.php");?>
             <?php //require_once("./add-headteacher.php");?> 
            <?php //require_once("./includes/top-product-ui.php");?>
         <?php //require_once("./includes/detail-report-ui.php");?>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- CoreUI and necessary plugins-->
<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="vendors/simplebar/js/simplebar.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="vendors/chart.js/js/chart.min.js"></script>
<script src="vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="vendors/@coreui/utils/js/coreui-utils.js"></script>
<script src="js/main.js"></script>
<script src="js/vendor.min.js"></script>
<script src="js/theme.min.js"></script>
<script>
</script>
        <?php require_once("./includes/footer-ui.php");?>