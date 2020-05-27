
<?php
include 'modul.php';
$lead =  new conn();
session_start();


if(isset($_POST['war']) && isset($_SESSION['userId'])){

  if($_SESSION['userType'] == 'Teacher'){
    $classIn = $lead->classcreated($_SESSION['userId']);
    if($classIn){
      $lead->coursePresenterIndex();
    }
    else{
      echo'
      
 <div class="col-12 ">
 <div class="card border-left-custom-top bg-info shadow h-100 py-2">
   <div class="card-body">
     <div class="row no-gutters align-items-center">
       <div class="col mr-2">
          <div class="row no-gutters align-items-center">
           <div class="col-auto">
             <div class=" mb-0 mr-3 font-weight-bold text-default" ><i class="text-gray-200 " >Make new course by clicking on your profile pricture and again on profile and click on class, fill all fields and start to make new courses and also to share your knowledge </i></div>
           </div>           
         </div>
       </div>
       <div class="col-auto">
         <i class="fas fa-info-circle fa-3x text-gray-100"></i>
       </div>
     </div>
   </div>
 </div>
 
     </div>
      ';

    }
 
  }
  else{

$lead->courseFollowed();
  
}
}
else{
  if(!empty($_SESSION['userId'])){
    $lead->logMeOut($_SESSION['userId']);
  }
    $lead->unauthorizedNewDir();
  }

?>
