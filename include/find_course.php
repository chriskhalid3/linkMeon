
<?php

// for addin it to planns fonts <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

if(isset($_POST['allCourse'])){
  
    echo '  <div class="col-6 mt-3  col-sm-6 col-md-12 col-lg-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Java</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class=" mb-0 mr-3 font-weight-bold text-info"><a class="text-info" href="#">Join</a></div>
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
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">java</div>
          <div class=" mb-0 font-weight-bold text-gray-800"><a class=" text-info" href="#">Join</a></div>
        </div>
        <div class="col-auto">
          <i class="fab fa-java fa-2x text-danger"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-6 mt-3  col-sm-6 col-md-12 col-lg-12 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class=" mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
            </div>
            <div class="col">
              <div class="progress progress-sm mr-2">
                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
          <div class="text-md font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
          <div class=" mb-0 font-weight-bold text-gray-800"><a class=" text-info" href="#">Join</a></div>
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