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
            

                <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Students</h4>
                  <p class="card-description">
                   
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Student Name
                          </th>
                          <th>
                            Class
                          </th>
                          <th>
                            Gender
                          </th>
                          <th>
                            Reg. Date
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            
                            $sqlStudentAlreadyExist = "SELECT * FROM students WHERE studentschool = '$headmasterschool'";
                            $statement = $conn->prepare($sqlStudentAlreadyExist);
                            $results = $statement->execute();
                            $rows = $statement->rowCount();
                            $columns = $statement->fetchAll();

                            if($results){
                                foreach($columns as $column){
                                    $id = $column['id'];
                                    $fullname = $column['studentfirstname'] . $column['studentlastname'];
                                    $studentclass = $column['studentclass'];
                                    $studentgender = $column['studentgender'];
                                    $regdate = $column['createdat'];

                                    echo "
                                    <tr>
                                    <td>
                                      {$id}
                                    </td>
                                    <td>
                                      {$fullname}
                                    </td>
                                    <td>
                                        {$studentclass}
                                    </td>
                                    <td>
                                      {$studentgender}
                                    </td>
                                    <td>
                                        {$regdate}
                                    </td>
                                  </tr>
                                    
                                    ";
                                }
                            }
                        
                        ;?>
                       
                      </tbody>
                    </table>
                  </div>
                </div>
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