<?php
    session_start();
    if(!isset($_SESSION['teacheremail']) OR $_SESSION['teacheremail'] == 0){
        header("location: login.php");
    }

            
      require_once("./auxiliaries.php");
      require_once("./config.php");

      

    

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
              
                  <h4 class="font-weight-bold mb-0"><?=$_SESSION['teacherfirstname'];?> - <?= $_SESSION['teacherlastname'];?> | <?=  $_SESSION['teacheremail'];?></h4>
                  <h4 class="font-weight-bold mb-0"><?=$_SESSION['teacherclass'];?> Teacher</h4>
                </div>
                <div>
                    





                    
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