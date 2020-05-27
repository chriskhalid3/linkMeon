<?php 


if(isset($_SESSION['email'])){
if(isset($_POST['logout'])){
      $lead->logMeOut($_SESSION['userId']);
    } ?>
    <style>

.text-info{ 
color: #2CB3DD;
}
.btn-info{
background-color: #2CB3DD;
} 
.f-color-custom{
color: rgb(210, 208, 211);
} 
.btn-color-custom{
background-color:rgb(159, 154, 161);
}

.search-header {
text-transform:uppercase:
}

.reasult-mob{

width:100%;
opacity:0;
transition: ease .5s;
}

.reasult-mob li{
cursor:pointer;

}
.reasult-mob li:hover{
cursor:pointer;
background-color:#2CB3ED;
border-radius:2px ;
color:white;
border:1px solid #2CB3DD;

}
#class,#friend,#add-course,#chat{
  cursor: pointer;
  margin:5px;
  margin-top:2px;
  justify-content:space-between;

}
#class:hover{
  color:rgb(13, 130, 226);
  font-weight: bold;
  transition: ease .5s;
}
#friend:hover{
  color:rgb(13, 130, 226);
  font-weight: bold;
  transition: ease .5s;
}
#add-course:hover{
  color:rgb(13, 130, 226);
  font-size:16px;
  font-weight: bold;
  transition: ease .5s;
}
#chat:hover{
color:rgb(13, 130, 226);
  font-size:16px;
  font-weight: bold;
  transition: ease .5s;
}
.overflow-scroll{
  overflow: auto;
}
#editInfo,#Newcourse{
color:#f8f9fc;
outline:none;
}
#editInfo:hover{
  cursor: pointer;
  color:rgb(13, 130, 226); 
}
#Newcourse:hover{
  cursor: pointer;
  color:rgb(13, 130, 226);
}
#create-course{
position:absolute;
top:33%;
opacity:0;
}
#addCourse{
color:gray;
cursor:pointer;
}
#addNewCourse{
  cursor:pointer;
  outline:none;
}
#addNewCourse:hover{
  cursor:pointer;
  color:#f8f9dc!important;
}

</style>
<title> linkOn - <?php echo $_SESSION['username']; ?> </title>
</head>   
<body>
<!-- navigation  -->
<nav class="navbars navbars-expand-sm sticky-top" >
  <div class="logo">
    <h4><a style="color: #4bacca;text-transform:uppercase; text-decoration:none;" href="index.php"> Lin<i class="fas fa-home text-info" ></i>on </a></h4>
  </div>
  <ul class="navbars-nav">

  <!-- message -->
          
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope  fa-fw m-0"><sup class="badge badge-info badge-counter ml-0">3</sup></i>
          <!-- Counter - Alerts -->
          
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header text-gray-800">
            Message 
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-unread rounded-circle" src="imag/avatar2.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="unread  col ">unchecked</div> <div class="text-secondary  col ">Mark as checked</div> 
                  </div>
                </div>
                
          </a>
          <hr >
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-read rounded-circle" src="imag/avatar1.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="text-secondary  col ">checked</div> <div class="unread col ">Mark as not checked</div> 
                  </div>
                </div>
                
          </a>
        
          <a class="dropdown-item text-center small text-gray-800" href="#">Show All Message </a>
        </div>
      </li>
<!-- 
      Notification -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw m-0"><sup class="badge badge-info badge-counter ml-0">3</sup></i>
          <!-- Counter - Alerts -->
          
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header text-gray-800">
            Notification
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-unread rounded-circle" src="imag/avatar2.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="unread  col ">unchecked</div> <div class="text-secondary  col ">Mark as checked</div> 
                  </div>
                </div>
                
          </a>
          <hr >
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-read rounded-circle" src="imag/avatar1.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="text-secondary  col ">checked</div> <div class="unread col ">Mark as not checked</div> 
                  </div>
                </div>
                
          </a>
        
          <a class="dropdown-item text-center small text-gray-800" href="#">Show All notification</a>
        </div>
      </li>

      
      <!-- Challengs -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-snowflake fa-fw m-0"><sup class="badge badge-info badge-counter ml-0">3</sup></i>
          <!-- Counter - Alerts -->
          
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header text-gray-800">
            Challengs
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-unread rounded-circle" src="imag/avatar2.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="unread  col ">unchecked</div> <div class="text-secondary  col ">Mark as checked</div> 
                  </div>
                </div>
                
          </a>
          <hr >
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div class="row">
                  <div class="col-lg-12 p-0">
                      <a class="hoverd dropdown-item d-flex align-items-center" href="#">
                          <div class="dropdown-list-image mr-3">
                            <img class="img-profile-read rounded-circle" src="imag/avatar1.jpg" alt="">
                            <div class="status-indicator bg-success"> </div>
                          </div>
                          <div class="font-weight-bold">
                            <div class="text-gray-600 text-gray-900 mb-2  ">Henry kelly</div>
                            <div class="small text-gray-500"> <i class=" text-gray-600">  Lorem ipsum lorem ipsum lorem ipsum lorem </i></div>
                          </div>
                        </a>
                  </div>
                  <div class="row justify-content-between text-center p-3 ml-3 ">
                      <div class="text-secondary  col ">checked</div> <div class="unread col ">Mark as not checked</div> 
                  </div>
                </div>
                
          </a>
        
          <a class="dropdown-item text-center small text-gray-800" href="#">Show All Challengs</a>
        </div>
      </li>

    <li class="nav-item nav-sale-chat"  >
        <a class="nav-link" href="">Chats</a>
    
      </li>
    </ul>
    <span>
    <form id="form-1" style="min-height:10px; position:relative; " class="d-none d-sm-inline-block form-inline mt-0 navbar-search">
          <div class="input-group form-group p-0">

            <input  type="text" id="searchBox" auto-complete="on" class="form-control bg-light  small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button  class="btn btn-color-custom"  type="button">
                <i class="fas fa-search fa-sm text-info"></i>
              </button>
            </div>
          </div>
        </form>

          <ul id="resultfield"  >
            <div class="card shadow border-left-custom-top ">
            <div class="card-header text-center">
          
            <span class="display-5 uppercase text-info search-header " id='search-header'> search result</span>
          
            </div>
            <ul class="card-body p-2" id="search-result">
                
              </ul>
            </div>
            </ul>
        </span>

        <li class="nav-item dropdown no-arrow d-sm-none mt-0">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw text-info"></i>
            </a>
          
            <div style="min-width:25rem;" class="dropdown-menu dropdown-menu-right ml-md-5 p-2 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group form-group">
                  <input type="text" id="searchbox-mob" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-color-custom" type="button">
                      <i class="fas fa-search fa-sm text-info"></i>
                    </button>
                  </div>
                </div>
              </form>
              <ul class="reasult-mob" id="reasult-mob">
            
                <div class="card shadow border-left-custom-top ">
                    <div class="card-header text-center">
                          <span class="display-5 uppercase text-info search-header " id='search-header'> search result</span>                   
                      </div>
                      <ul class="card-body p-2" id="search-result-mob">
                          
                        </ul>
                    </div>
                </ul>
            </div>
          </li>
  <div class="profile-place">
  <ul>  
    <li class="nav-item dropdown no-arrow">
        <?php $lead->profileRetrieve($_SESSION['userId']); ?>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="profile.php">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-700"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-700"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-700"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <form action="" method="post">
            <button type="submit" name="logout" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-700"></i>
              Logout
            </button>
            </form>
          </div>
        </li>
      </ul>
      </div>
  <div style="z-index:1000" class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
</nav>
  
<?php } else{
header('location:signin.php');
exit();
}?>