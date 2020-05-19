<?php 
include 'modul.php';
session_start();
$lead = new conn();
if(isset($_POST['claimedSearch']) && !empty($_POST['claimedSearch']) && isset($_SESSION['userId'])){

 
 $searchValue = trim($_POST['claimedSearch']);

 $lead->searchUser($searchValue,$_SESSION['userId']);

}else{
$lead->unauthorizedNewDir();

}

?>