
<?php
session_start();
if(isset($_POST['allfriend']) && !empty($_SESSION['username'])){
   echo 'load friend';
}
else{
    exit('not working');
}

?>