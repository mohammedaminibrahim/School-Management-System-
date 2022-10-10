<?php

require_once("./config.php");
require_once("./auxiliaries.php");

if(isset($_POST['submit'])){
    $schoolname = sterilize($_POST['schoolname']);
    $schooladdress = sterilize($_POST['schooladdress']);
    $schoolcontactaddress = sterilize($_POST['schoolcontactaddress']);
    $headteachername = sterilize($_POST['headteachername']);
    $schoolregion = sterilize($_POST['schoolregion']);
    $schooldistrict = sterilize($_POST['schooldistrict']);

    if(!empty($schoolname) && !empty($schooladdress) && !empty($schoolcontactaddress) && !empty($headteachername)
     && !empty($schoolregion) && !empty( $schooldistrict)){
           $sqlInsertSchool = "INSERT INTO basicschools(schoolname, schooladdress, schoolcontactaddress,
            headteachername, schoolregion, schooldistrict) VALUES('$schoolname','$schooladdress',
            '$schoolcontactaddress','$headteachername','$schoolregion','$schooldistrict')";
           $statement = $conn->prepare($sqlInsertSchool);
           $results = $statement->execute();
           if($results){
            $_SESSION['message'] = "Succcess!!";
            $_SESSION['alert'] = "alert alert-success";
           } else {
            $_SESSION['message'] = "OOppss Sorry!! Something went wrong!!";
            $_SESSION['alert'] = "alert alert-danger";
           }
    } else{
        $_SESSION['message'] = "All Fields Are Required!!";
        $_SESSION['alert'] = "alert alert-danger";
    }
}




;?>

<div class="main-panel">        
    <div class="content-wrapper">
    <?php
            if(isset($_SESSION['message'])):?>
                <div class="<?= $_SESSION['alert'];?>"  role="alert">
                    <strong><?= $_SESSION['message'];?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
        <?php endif;?>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add New School</h4>
              <p class="card-description">
                Basic form layout
              </p>
              <form action="" method="POST" class="forms-sample">
                <div class="form-group">
                  <label for="exampleInputUsername1">Basic School Name</label>
                  <input name="schoolname" type="text" class="form-control" id="exampleInputUsername1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">School Address</label>
                  <input name="schooladdress" type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Contact Address</label>
                  <input name="schoolcontactaddress" type="text" class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Head Teacher's Name</label>
                  <input name="headteachername" type="text" class="form-control" id="exampleInputPassword1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputConfirmPassword1">Region</label>
                  <input name="schoolregion" type="text" class="form-control" id="exampleInputConfirmPassword1" >
                </div>
                <div class="form-group">
                  <label for="exampleInputConfirmPassword1">District</label>
                  <input name="schooldistrict" type="text" class="form-control" id="exampleInputConfirmPassword1">
                </div>
                <button name="submit" type="submit" class="btn btn-primary me-2">Submit</button>
               
              </form>
            </div>
          </div>
        </div>