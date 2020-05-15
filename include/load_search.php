<?php 
include 'modul.php';
session_start();

if(isset($_POST['claimedSearch']) && !empty($_POST['claimedSearch']) && isset($_SESSION['userId'])){
 $lead = new conn();
 
 $searchValue = trim($_POST['claimedSearch']);

 $lead->searchUser($searchValue,$_SESSION['userId']);

}else{
 header('location:../index.php');
 exit();
}

?>