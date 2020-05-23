
<?php
include 'modul.php';
$lead =  new conn();
session_start();

if(isset($_POST['allfriend']) && !empty($_SESSION['userId'])){
   echo 'load friend';
}
else{
    
    if(!empty($_SESSION['userId'])){
        $lead->logMeOut($_SESSION['userId']);
        }
    $lead->unauthorizedNewDir();

}

?>