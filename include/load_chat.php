
<?php
include 'modul.php';
$lead =  new conn();
session_start();

if(isset($_POST['allChat']) && isset($_SESSION['userId'])){
    
    echo "chat page";
}
else{
    if(!empty($_SESSION['userId'])){
        $lead->logMeOut($_SESSION['userId']);
        }
    $lead->unauthorizedNewDir();
}

?>