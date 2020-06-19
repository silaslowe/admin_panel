<?php

function createRows(){
if(isset($_POST['submit'])) {

$connection = mysqli_connect('localhost', 'root', "myObj:php$$$12", "admin_panel");    

$month = $_POST['month'];
$day = $_POST['day'];
$day_of_week = $_POST['day_of_week'];
$band = $_POST['band'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$venue = $_POST['venue'];
$time = $_POST['time'];


if($connection) {
    echo "We are connected";
} else {
    die("error");
}

$query = "INSERT INTO gig_calendar(month,day,day_of_week,band,city,state,country,venue,time) ";

$query .= "VALUES ('$month', '$day', '$day_of_week', '$band', '$city', '$state', '$country', '$venue', '$time')";
    
$result = mysqli_query($connection, $query);
    
if(!$result) {

die("Query Failed");
    }   
  }
}

function showAllData(){
    global $connection;

    $query = "SELECT * FROM gig_calendar"; 
    $result = mysqli_query($connection, $query);   
  
    if(!$result) { 
      die("Query Failed" . mysqli_error());
    }
  
    while($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      echo  "<option value='$id'>$id</option>";   
    }
  }



function deleteRows(){

if(isset($_POST['delete'])) {
global $connection; 

$id = $_POST['id'];
  
    $query = 'DELETE FROM gig_calendar ';
    $query .= "WHERE id = $id ";
  
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
      die("You fucked up " . mysqli_error($connection));
      }
    }
  }
 





// $query .= "month = '$month', ";
// $query .= "day = '$day', ";
// $query .= "day_of_week = '$day_of_week', ";
// $query .= "band = '$band', ";
// $query .= "city = '$city', ";
// $query .= "state = '$state', ";
// $query .= "country = '$country', ";
// $query .= "venue = '$venue', ";
// $query .= "time = '$username', ";


// $day = mysqli_escape_string($connection, $month );
// $month = mysqli_escape_string($connection, $day );
// $day_of_week = mysqli_escape_string($connection, $day_of_week );
// $band = mysqli_escape_string($connection, $band );
// $city = mysqli_escape_string($connection, $city );
// $state = mysqli_escape_string($connection, $state );
// $country = mysqli_escape_string($connection, $country );
// $venue = mysqli_escape_string($connection, $venue );
// $time = mysqli_escape_string($connection, $time );