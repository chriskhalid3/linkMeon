
<?php
include 'modul.php';
$lead =  new conn();
session_start();
if(isset($_POST['war']) && isset($_SESSION['userId'])){
    echo '
    <div class="col-6 mt-3  col-sm-6 col-md-12 col-lg-12 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Java</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class=" mb-0 mr-3 font-weight-bold text-info"><a class="text-info" href="#">Study</a></div>
            </div>
            <div class="col">
              <div class="mr-2">
                <div class="text-xs" >classmates <p class="text-info d-inline">50</p> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


    
    
    ';
}
else{
  if(!empty($_SESSION['userId'])){
    $lead->logMeOut($_SESSION['userId']);
    }
$lead->unauthorizedNewDir();
}

?>