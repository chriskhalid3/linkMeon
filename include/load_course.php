
<?php

if(isset($_POST['war'])){
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

    <div class="col-6 mt-3   col-sm-6 col-md-12 col-lg-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
          <div class="col-auto ">
          <i class="fab fa-java fa-2x text-danger"></i>
        </div>
            <div class="d-flex m-0 p-0">
            <div class=" mb-0 font-weight-bold text-gray-800"><a class=" text-info" href="#">Study</a></div>
            <p class="ml-1 mr-1">classmate</p> <div class="text-info">50</div> 
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  


    <div class="col-6 mt-3   col-sm-6 col-md-12 col-lg-12 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-1">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">boostrap</div>
            <div class=" mb-0 font-weight-bold text-gray-800"><a class=" text-info" href="#">Study</a></div>
          </div>
          <div class="col-auto ml-md-3">
            <i class="fas fa-bold fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
  </div>




<div class="col-6 mt-3   col-sm-6 col-md-12 col-lg-12 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-md font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
          <div class=" mb-0 font-weight-bold text-gray-800"><a class=" text-info" href="#">Study</a></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>


    
    
    ';
}
else{
    exit('not working');
}

?>