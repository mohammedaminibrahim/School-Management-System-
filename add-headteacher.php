<?php
    //session_start();

    if(isset($_POST['addmaster'])){
      $headmastername = sterilize($_POST['headmastername']);
      $headmasteraddress = sterilize($_POST['headmasteraddress']);
      $headmasterschool = sterilize($_POST['headmasterschool']);
      $headmasteremail = sterilize($_POST['headmasteremail']);
      $headmasterregion = sterilize($_POST['headmasterregion']);

      //check if inputs are not empty
      if(!empty($headmastername) && !empty($headmasteraddress) && !empty($headmasterschool) 
      && !empty($headmasteremail) && !empty($headmasterregion)){
      $headmasterschool = sterilize($_POST['headmasterschool']);
          $sqlInsert = "INSERT INTO headmaster(headmastername, headmasteraddress, headmasterschool, headmasteremail, headmasterregion)
           VALUES('$headmastername', '$headmasteraddress', '$headmasterschool', '$headmasteremail', '$headmasterregion')";
          $statement = $conn->prepare($sqlInsert);
          $results = $statement->execute();

          if($results){
            $_SESSION['message'] = "Headmaster Created Successfully!";
            $_SESSION['alert'] = "alert alert-success";
          } else{
            $_SESSION['message'] = "Something Went Wrong!";
            $_SESSION['alert'] = "alert alert-warining";
          }

      } else{
        $_SESSION['message'] = "All Fields are required!";
        $_SESSION['alert'] = "alert alert-warining";
      }
    }





;?>


<div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Assign Headmaster to a Basci School</h4>
      <p class="card-description">
        Basic form layout
      </p>
      <form action="" method="POST" class="forms-sample">
        <div class="form-group">
          <label for="exampleInputUsername1">Full Name</label>
          <input name="headmastername" type="text" class="form-control" id="exampleInputUsername1" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Contact Address</label>
          <input name="headmasteraddress" type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">School</label>
          <!-- <input name="schoolcontactaddress" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Address"> -->
          <select name="headmasterschool" class="form-control" id="exampleInputEmail1" >
        
          
        
          <?php

            require_once("./config.php");
            $sqlSelectSchools = "SELECT * FROM basicschools";
            $statement = $conn->prepare($sqlSelectSchools);
            $results = $statement->execute();
            $rows = $statement->rowCount();
            $columns = $statement->fetchAll();

            if($results){
                foreach($columns as $column){
                  $id = $column['id'];
                  $schoolname = $column['schoolname'];

                  echo "
                  <option value='<?= $schoolname;?>'>{$schoolname}</option>

                  ";
                }
            } else{
              $_SESSION['message'] = "Something went wrong!!";
              $_SESSION['alert'] = "alert alert-warning";
            }
          
          
          ;?>
          </select>
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input name="headmasteremail" type="text" class="form-control" id="exampleInputPassword1" 
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Region</label>
          <input name="headmasterregion" type="text" class="form-control" id="exampleInputPassword1">
        </div>
        <button name="addmaster" type="submit" class="btn btn-primary me-2">Submit</button>
       
      </form>
    </div>
  </div>
</div>