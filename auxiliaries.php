<?php

require_once("./config.php");

//clean POST vars
function sterilize($element){
    return trim(htmlspecialchars($element));
}



//get number of school
$sqlNumberofSchools = "SELECT * FROM basicschools";
$statement = $conn->prepare($sqlNumberofSchools);
$results = $statement->execute();
$NumberOfSchools = $statement->rowCount();



//get number of school
$sqlNumberofSchools = "SELECT * FROM basicschools";
$statement = $conn->prepare($sqlNumberofSchools);
$results = $statement->execute();
$NumberOfHeadteachers = $statement->rowCount();



//get number of students
$sqlNumberofSchools = "SELECT * FROM basicschools";
$statement = $conn->prepare($sqlNumberofSchools);
$results = $statement->execute();
$NumberOfStudents = $statement->rowCount();


;?>