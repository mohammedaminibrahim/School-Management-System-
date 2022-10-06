<?php
    session_start();
    if(!isset($_SESSION['headmastercode']) OR $_SESSION['headmastercode'] == 0){
        header("location: login.php");
    }

            
      require_once("./auxiliaries.php");
      require_once("./config.php");

      //headmaster info
      $headmastername = $_SESSION['headmastername']; 
      $headmastercode = $_SESSION['headmastercode'];
      $headmasterschool = $_SESSION['headmasterschool'];

      if(isset($_POST['addstudent'])){
      $studentfirstname = sterilize($_POST['studentfirstname']);
      $studentlastname = sterilize($_POST['studentlastname']);
      $studentclass = sterilize($_POST['studentclass']);
      $studentgender = sterilize($_POST['studentgender']);
      $guardianname = sterilize($_POST['guardianname']);
      $guardianrelationship = sterilize($_POST['guardianrelationship']);
      $guardiancontact = sterilize($_POST['guardianrelationship']);
      $guardianaddress = sterilize($_POST['guardianaddress']);

      if(!empty($studentfirstname) && !empty($studentlastname) && !empty($studentclass) && !empty($studentgender) 
      && !empty($guardianname) && !empty($guardianrelationship) && !empty($guardiancontact) && !empty($guardianaddress)){
        //check if student already exist
        $sqlStudentAlreadyExist = "SELECT * FROM students WHERE studentfirstname = :studentfirstname AND studentlastname = :studentlastname AND studentclass = :studentclass";
        $statement = $conn->prepare($sqlStudentAlreadyExist);
        $results = $statement->execute([
          ':studentfirstname' => $studentfirstname,
          ':studentlastname' => $studentlastname,
          ':studentclass' => $studentclass
        ]);
        $rows = $statement->rowCount();

        if($rows > 0){
          $_SESSION['message'] = "Sorr!! Student Alreday Exist!!";
          $_SESSION['alert'] = "alert alert-danger";
        }else{
          $insertStudentData = "INSERT INTO students(studentfirstname, studentlastname, studentclass, studentgender, guardianname, guardianrelationship, guardiancontact, guardianaddress, studentschool, headteacher, headteachercode) 
          VALUES(:studentfirstname, :studentlastname, :studentclass, :studentgender, :guardianname, :guardianrelationship, :guardiancontact, :guardianaddress, :headmasterschool, :headmastername, :headmastercode)";
          $statement = $conn->prepare($insertStudentData);
          $results = $statement->execute([
            ':studentfirstname' =>  $studentfirstname,
            ':studentlastname' =>  $studentlastname,
            ':studentclass' =>  $studentclass,
            ':studentgender' =>  $studentgender,
            ':guardianname' =>  $guardianname,
            ':guardianrelationship' =>  $guardianrelationship,
            ':guardiancontact' =>  $guardiancontact,
            ':guardianaddress' =>  $guardianaddress,
            ':headmasterschool' => $headmasterschool,
            ':headmastername' =>  $headmastername,
            ':headmastercode' =>  $headmastercode
          ]);

          if($results){
            $_SESSION['message'] = "Students Data Inserted Successfully!!";
            $_SESSION['alert'] = "alert alert-danger";
            header("location: index.php");
          
          } else{
            $_SESSION['message'] = "Oooops!! Something went wrong!!";
            $_SESSION['alert'] = "alert alert-danger";
          }
          
        }
      } else{
        $_SESSION['message'] = "All Fields Are Required!!";
        $_SESSION['alert'] = "alert alert-danger";
      }
      }

    

;?>

<?php require_once("./includes/head-ui.php");?>
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
              
                  <h4 class="font-weight-bold mb-0"><?=$_SESSION['headmastername'];?> - <?= $_SESSION['headmastercode'];?> | <?=  $_SESSION['headmasterschool'];?></h4>
                </div>
                <div>
                    


                    <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-547">
                      <button id="exampleModalXlLabel" type="button" class="btn btn-primary btn-icon-text btn-rounded modal-title h4" data-coreui-toggle="modal" data-coreui-target="#exampleModalXl">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Students
                    </button>
                    <button id="exampleModalXlLabelTeacher" type="button" class="btn btn-primary btn-icon-text btn-rounded modal-title h4" data-coreui-toggle="modal" data-coreui-target="#exampleModalXlLabelTeacher">
                      <i class="ti-clipboard btn-icon-prepend"></i>Add Teachers
                    </button>
                        <div class="modal fade" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalXlLabel">Students</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class="tab-content rounded-bottom">
                                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1054">
                                    <form action="" method="POST" class="row g-3">
                                      <div class="col-md-4">
                                        <label class="form-label" for="validationServer01">First name</label>
                                        <input name="studentfirstname" class="form-control" id="validationServer01" type="text"  required="">
                                       
                                      </div>
                                      <div class="col-md-4">
                                        <label class="form-label" for="validationServer02">Last name</label>
                                        <input name="studentlastname" class="form-control" id="validationServer02" type="text"  required="">
                                      </div>

                                      <div class="col-md-4">
                                        <label class="form-label" for="validationServer02">Class</label>
                                        <input name="studentclass" class="form-control" id="validationServer02" type="text"  required="">
                                      </div>
   
                                     
                                      <div class="col-md-3">
                                        <label class="form-label" for="validationServer04">Gender</label>
                                        <select name="studentgender" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                                          <option selected="" disabled="" value="">Choose...</option>
                                          <option>...</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                        </select>
                                      </div>

                                      <!-- <div class="col-md-3">
                                        <label class="form-label" for="validationServer04">State</label>
                                        <select class="form-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                                          <option selected="" disabled="" value="">Choose...</option>
                                          <option>...</option>
                                        </select>
                                      </div> -->

                                        </hr>

                                        <p class="h3 text-primary">Guardian Information</p>

                                        <div class="col-md-4">
                                        <label class="form-label" for="validationServer01">Guardian Name</label>
                                        <input name="guardianname" class="form-control" id="validationServer01" type="text" required="">
                                       
                                      </div>
                                     
                                      <div class="col-md-3">
                                        <label class="form-label" for="validationServer04">Relationship</label>
                                        <select name="guardianrelationship" class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required="">
                                          <option selected="" disabled="" value="">Choose...</option>
                                          <option value="Father"> Father</option>
                                          <option value="Mother"> Mother</option>
                                          <option value="Other"> Other</option>
                                        </select>
                                      </div>

                                      <div class="col-md-4">
                                        <label class="form-label" for="validationServer02">Contact</label>
                                        <input name="guardiancontact" class="form-control" id="validationServer02" type="text" required="">
                                      </div>

                                      <div class="col-md-4">
                                        <label class="form-label" for="validationServer02">Address</label>
                                        <input name="guardianaddress" class="form-control" id="validationServer02" type="text"  required="">
                                      </div>
                        
                                      <div class="col-12">
                                        <button name="addstudent" class="btn btn-primary" type="submit">Submit form</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal fade" id="exampleModalXlLabelTeacher" tabindex="-1" aria-labelledby="exampleModalXlLabelTeacher" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalXlLabelTeacher">For Teachers</h5>
                                <button class="btn-close" type="button" data-coreui-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                Teachers From
                              </div>
                            </div>
                          </div>
                        </div>




                    
                </div>
              </div>
            </div>
          </div>
          <?php require_once("./includes/dashboard-ui.php");?>
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