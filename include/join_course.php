
<?php

include 'modul.php';
$lead =  new conn();
session_start();
if(isset($_POST['allCourse']) && isset($_SESSION['userId'])){
  $reaload = $_POST['allCourse'];
  if(!preg_match("/^[0-9]*$/",$reaload)){
    $lead->unauthorizedNewDir();
  }else{
    $lead->joincourse($reaload);
  } 
}
else{
 
  if(!empty($_SESSION['userId'])){
    $lead->logMeOut($_SESSION['userId']);
    }
$lead->unauthorizedNewDir();
}

?>