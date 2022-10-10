<?php
    session_start();
    // if(!isset($_SESSION['teacheremail']) OR $_SESSION['teacheremail'] == 0){
    //     header("location: login.php");
    // }

            
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
              
                
                </div>
                <div>
</div>
</div> 

          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Students</h4>
                  <div class="table-responsive pt-3">
                    <div class="container text-justify text-primary">Today's Date: <?php echo date("Y-m-d");?></div>
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
                           Class
                          </th>
                          <th>
                           School
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       
                        <?php
                          
                          $sqlSelectAllStudents = "SELECT * FROM students";
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
                            $studentschool = $column['studentschool'];


                            echo "

                            <tr>
                            <td> {$id}  </td>
                            <td>{$studentname}</td>
                            <td> {$studentclass}</td>
                            <td> {$studentschool}</td>
                          </tr>
                            ";

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