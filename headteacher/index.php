<?php
    session_start();
    if(!isset($_SESSION['headmastercode']) OR $_SESSION['headmastercode'] == 0){
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
                                Students
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