<?php 
include 'modul.php';
$lead = new conn();
session_start();
if(isset($_POST['subNewPass']) && $_SESSION['userId']){
    $newPass  = $_POST['newPass'];  
    $confPass = $_POST['passConfirm'];
    if(empty($newPass) || empty($confPass) || empty($_SESSION['userId'])){
        echo '<script>alert("You have empty field ")</script>';
        echo '<script>window.open("../signin.php?error=empty%20password%20fields","_self")</script>';
       
        exit();
      }elseif(strlen($newPass) < 8 ){
        echo '<script>alert("Password must be over 8")</script>';
        echo '<script>window.open("../signin.php?error=low%20password","_self")</script>';
        exit();
      }elseif($newPass !== $confPass){
        echo '<script>alert("Your confirmation password is not equal to new password ")</script>';
        echo '<script>window.open("../signin.php?error=password%20does%20not%20","_self")</script>';
        exit();
        }
      else{
            $lead->changepass($newPass,$confPass,$_SESSION['userId']);
        }

}else{
    $lead->unauthorizedNewDir();
    }
  

?>