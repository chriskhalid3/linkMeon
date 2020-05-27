
<?php   include 'header.php';
  
   include 'include/modul.php';
   $lead = new conn();
   session_start();

   if(isset($_SESSION['email'])){

    
   ?>
   
 
 <?php include "navBar.php"; ?>

<div class=" container-fluid d-sm-block d-md-flex ">
  
   <div class="col-sm-12 col-md-3 col-lg-3  ">
  
         
      
    <div class="mt-2">
          <div class="d-flex text-center col-12 overflow-scroll m-3 ">
 
                <?php  if($_SESSION['userType'] == 'Teacher' ){ ?>
                <span id="class"> Class  <i class="fas fa-pen text-info" ></i> </span>
                        <?php }else{?>
                <span id="class" > take  <i class="fas fa-book text-info" ></i> </span>
                        <?php }?>
                <span id="friend"> Friend<i class="fas fa-user text-info ml-1" ></i></span>
                <span id="add-course">join <i class="fas fa-plus text-info" ></i></span>
                <span id="chat">Chat<i class="fas fa-snowflake  text-info ml-1" ></i></span>
           
          </div>
      <div class="overflow-x-true" id="page-leader">
         
       
    </div>
    </div>
 </div>

<!-- end of lefte side -->
<!-- post side -->
<div class="d-sm-flex  ">
  <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9  mt-3 p-2 overflow-y-true">
      
  
        <div class="card">
    
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="ml-3 d-flex  font-weight-bold text-primary">
                                    <div class=" card-img-header post ">
                                        <img class="img-profile  rounded-circle" src="imag/avatar1.jpg">
                                        <span class=" d-lg-inline text-gray-600 small">Valerie Luna
                                      
                                        </span>
                                    </div>
                                  </div>
                                
                                <div class="dropdown no-arrow">
                                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                                  </a>
                                  <div class="dropdown-menu border-left-custom-top dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 18px, 0px);">
                                    <div class="dropdown-header text-gray-600">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                  </div>
                                </div>
                              </div>


                          <div class="card-body p-0 ">
                            <div class="text-center">
                              <img class="img-fluid m-0"  src="imag/discover.jpg" alt="">
                            </div>
                          <div class="p-1 mt-2">
                              <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 col-12">
                                  <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="comment on..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                      <button class="btn btn-outline-primary" type="button">
                                        <i class="fas fa-comment fa-sm text-gray-600"></i>
                                      </button>
                                    </div>
                                  </div>
                                </form>

                                        </div>
                                        <div class="media p-1 mb-1">
                                          <div class="d-flex"> 
                                          <img src="imag/discover.jpg" alt="Demo Avatar John Doe" class="mr-1 img-profile rounded-circle" >
                                            <div class="media-body">
                                              <h6  class="text-gray-900">John Doe <small><i  class="text-gray-600">On February 19, 2016</i></small></h6>
                                              <p class="text-gray-700 commented">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <a class=" link mr-2  " href="">Read more...</a> </p>
                                              
                                            </div>
                                            
                                            </div>
                                          
                      </div>
                    </div>
                          
                  
                  </div> 
                  <div class="card shadow  mb-2 mt-3">
    
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <div class="m-0 d-flex  font-weight-bold text-primary">
                              <div class="post  card-img-header ">
                                  <img class="img-profile rounded-circle" src="imag/avatar1.jpg">
                                  <span class=" d-lg-inline text-gray-600 small">Valerie Luna
                                
                                  </span>
                              </div>
                            </div>
                          
                          <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                            </a>
                            <div class="dropdown-menu border-left-custom-top dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 18px, 0px);">
                              <div class="dropdown-header text-gray-600">Dropdown Header:</div>
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>
                        </div>


                    <div class="card-body p-0 ">
                      <div class="text-center">
                        <img class="img-fluid m-0"  src="imag/retro.jpg" alt="">
                      </div>
                    <div class="p-1 mt-2">
                        <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 col-12">
                            <div class="input-group">
                              <input type="text" class="form-control bg-light border-0 small" placeholder="comment on..." aria-label="Search" aria-describedby="basic-addon2">
                              <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="button">
                                  <i class="fas fa-comment fa-sm text-gray-800"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                                  </div>
                                  <div class="media p-1 mb-1">
                                    <div class="d-flex"> 
                                    <img src="imag/discover.jpg" alt="Demo Avatar John Doe" class="mr-1 img-profile rounded-circle" >
                                      <div class="media-body">
                                        <h6  class="text-gray-900">John Doe <small><i  class="text-gray-600">On February 19, 2016</i></small></h6>
                                        <p class="text-gray-700 commented">Lorem ipsum dolor sit amet, consectetur adipiscing elit, <a class=" link mr-2  " href="">Read more...</a> </p>
                                        
                                      </div>
                                      
                                      </div>
                                    
                </div>
              </div>
                    
            
            </div> 
          </div>
          <!-- end of post side -->

          <!-- suggestinon side -->
          
          <div id="sale-courses"  class="col-xs-4 col-sm-6 col-md-4 col-lg-3 mb-4 mt-3 overflow-y-true sale ">
            <div class="text-center text-info ">
                Suggested class
              </div>
          <div class="col-6  col-sm-12 col-md-12 col-lg-12 mb-4  suggestinon">

          <div class="card p-0 border-left-custom-top ">  
            <img class="card-img-top" src="imag/css.jpg" >
             <div class="card-img-overlay p-0">
               <div class="card-body   ">
                <div class="row  no-gutters align-items-center">
                  <div class="col ml-2 ">
                    <div class="course">
                        <div class="media  mb-1">
                            <div class="d-flex"> 
                            <img src="imag/discover.jpg" alt="Demo Avatar John Doe" class="mr-1 tec-img-profile rounded-circle" >
                          </div>
                        </div>
                    </div>
                   </div>
                </div>
              </div>
            </div>
         </div> 
         </div> 
         
     
        
      </div>
   
          <!-- end of suggestion side -->

     <!-- friends -->
<div id="sale-chat" class="col-lg-3 mt-3 ml-1 shadow d-none">
        <div class="row">
          <div class="col-lg-12 p-0">
              <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="img-profile-active rounded-circle" src="imag/avatar2.jpg" alt="">
                    <div class="status-indicator bg-success"> </div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-gray-600 small ">Henry kelly</div>
                    <div class="small text-gray-500"> <i class="fas fa-user-circle text-active">  active</i></div>
                  </div>
                </a>
          </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                      <img class="img-profile-offline rounded-circle" src="imag/avatar1.jpg" alt="">
                      <div class="status-indicator bg-success"> </div>
                    </div>
                    <div class="font-weight-bold">
                      <div class="text-gray-600 small ">Henry kelly</div>
                      <div class="small text-gray-500"> <i class="fas fa-user-circle text-offline">  offline</i></div>
                    </div>
                  </a>
            </div>
          </div>
       
    </div>
 
  
     
              
          <!-- end of friends side -->

</div>


   <?php }else{
     header('location:signin.php');
     exit();
   }


   include "footer.php" ;

?>

