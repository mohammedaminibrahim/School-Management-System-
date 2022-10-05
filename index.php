<?php
    session_start();
    if(!isset($_SESSION['email']) OR $_SESSION['email'] == 0){
        header("location: login.php");
    }

    //get

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
                  <h4 class="font-weight-bold mb-0">Basic School Managment Dashboard</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div>
              </div>
            </div>
          </div>
          <?php require_once("./includes/dashboard-ui.php");?>
          <?php require_once("./add-school.php");?>
             <?php require_once("./add-headteacher.php");?> 
            <?php require_once("./includes/top-product-ui.php");?>
         <?php require_once("./includes/detail-report-ui.php");?>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require_once("./includes/footer-ui.php");?>