<?php 

include 'modul.php';
$lead  =  new conn();
session_start();

if(isset($_SESSION['username']) && isset($_POST['userInfo'])){
 $lead->userFormWithValue($_SESSION['userId'],$_SESSION['email']);
                                                             

echo ' </div>';
 

if(isset($_POST["update"])){

 $username = $_POST['username'];
 $fname    = $_POST['fname'];
 $lname    = $_POST['lname'];                                 
 $userId   = $_SESSION['userId']; 
 $lead->userFormWithHiddenValue($fname,$lname,$username);

   }
                                
 if(isset($_POST['confirm'])){
     $username = $_POST['username'];
     $fname    = $_POST['fname'];
     $lname    = $_POST['lname'];                                 
     $userId   = $_SESSION['userId']; 
     $lead->userModifyc($userId,$username,$fname,$lname);
        }  
        
    }
    else{
     echo '<script>window.open("../signin.php")</script>';
    }

 ?>

