<?php
    session_start();
    if(!isset($_SESSION['teacheremail']) OR $_SESSION['teacheremail'] == 0){
        header("location: login.php");
    }

            
      require_once("./auxiliaries.php");
      require_once("./config.php");

      

    

;?>

<?php require_once("./includes/head-ui.php");?>
<?php require_once("./includes/head.php");?>
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
              
                  <h4 class="font-weight-bold mb-0"><?=$_SESSION['teacherfirstname'];?> - <?= $_SESSION['teacherlastname'];?> | <?=  $_SESSION['teacheremail'];?></h4>
                  <h4 class="font-weight-bold mb-0"><?=$_SESSION['teacherclass'];?> Teacher</h4>
                </div>
                <div>
</div>
</div> 

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Attandace</h4>
                  <div class="table-responsive pt-3">
                    <div class="container text-justify text-primary">Date: <?php echo date("Y-m-d");?></div>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            # Serial Number
                          </th>
                          <th>
                            Student Name
                          </th>
                          <th>
                            Attandace Status
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <form method="POST">
                        <?php
                          $teacherclass = $_SESSION['teacherclass'];
                          $sqlSelectAllStudents = "SELECT * FROM students WHERE studentclass = '$teacherclass'";
                          $statement = $conn->prepare($sqlSelectAllStudents);
                          $results = $statement->execute();
                          $rows = $statement->rowCount();
                          $columns = $statement->fetchAll();

                          foreach($columns as $column){
                            $id = $column['id'];
                            $studentfirstname = $column['studentfirstname'];
                            $studentlastname = $column['studentlastname'];
                            $studentclass = $column['studentclass'];
                            $studentname = $studentfirstname . $studentlastname;


                            echo "

                            <tr>
                            <td>
                            {$id}
                            </td>
                            <td>
                            {$studentname}
                            <input type='hidden' value='{$studentname}' name='studentname[]'>
                            </td>
                            <td>
                           
                                <input type='radio' class='form-check-input' name='attendancestatus[{$id}]' id='optionsRadios1' value='Present'>
                                Present
                           
                            
                                <input type='radio' class='form-check-input' name='attendancestatus[{$id}]' id='optionsRadios1' value='Absent'>
                                Absent
                             
                            </td>
                          </tr>
                            ";

                            if(isset($_POST['submit'])){
                               foreach($_POST['attendancestatus'] as $id=>$attendancestatus){
                                $date = date("Y-m-d");
                                $studentname = $studentfirstname . $studentlastname;
                                $attendancestatus = $_POST['attendancestatus'][$id];
                                $sqlInsertAttendance = "INSERT INTO attendance(studentname, attendancestatus, datecreated)
                                VALUES('$studentname','$attendancestatus','$date')";
                                $statement = $conn->prepare($sqlInsertAttendance);
                                $results = $statement->execute();
                               }
    
                              if($results){
                                $_SESSION['message'] = "Attendance Taken SuccessFully!!";
                                $_SESSION['alert'] = "alert alert-success";
                              } else{
                                $_SESSION['message'] = "Oooopss Something went wrong";
                                $_SESSION['alert'] = "alert alert-warning";
                              }
                            
                              }
                          }
                        
                       
                        ;?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

                          <input name="submit" type="submit" class="form-control" value="Submit">
                        </form>

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