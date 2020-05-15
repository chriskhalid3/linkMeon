<?php   include 'header.php';
  
   include 'include/modul.php';
   $lead = new conn();
   session_start();

   if(isset($_SESSION['email'])){ ?>
 
 <?php  if(isset($_POST['logout'])){
         $lead->logMeOut($_SESSION['userId']);
      } ?>
 <title> <?php echo $_SESSION['username']; ?> </title>
  </head>   
  <body>
  
  <?php include "navBar.php"; ?>


<div class="container align-items-center ">
        
<div class="col-12 mt-2 ">
    <div class="card shadow border-left-custom-top ">

        <div class="card-body p-0 border ">
            <?php
            
            if(empty($_GET['upload']) && empty($_GET['info'])){
              echo '<div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <div class="ml-3 d-flex  font-weight-bold text-primary">
                  <div class=" card-img-header post ">
                             <span class=" d-lg-inline text-gray-600 small">Your profile and identifications
                      </span>
                  </div>
                </div>
            </div> ';
            }
            
            
            if(isset($_GET['upload']) && $_REQUEST['upload']== 'successful'){ ?>
                   <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="ml-3 d-flex  font-weight-bold text-primary">
                                    <div class=" card-img-header post ">
                                               <span class=" d-lg-inline text-gray-600 small">Your Profile has successful changed
                                        </span>
                                    </div>
                                  </div>
                              </div>
                                 
                              <?php  }
                              if(isset($_GET['info']) && $_REQUEST['info'] == 'successful') {?>   
                               <div  class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="ml-3 d-flex  font-weight-bold text-primary">
                                    <div class=" card-img-header post ">
                                               <span class=" d-lg-inline text-gray-600 small">Your Identification has successful changed
                                        </span>
                                    </div>
                                  </div>
                              </div> 

                              <?php  }                             
                              ?>
                               
             <div class="row">
                 <!-- for plofile -->
                  <div class="col-6 col-sm-6 col-md-4  col-lg-4  mt-4 p-2 text-center ">
                        <div class=" ml-2">
                                <?php $lead->profileDisplay($_SESSION['userId']);
                                
                                if(isset($_POST['upload'])){
                                    
                               if(isset($_FILES['image'])){
                                    $uploadedImageTemp = $_FILES['image']['tmp_name'];
                                    $imgSize        = $_FILES['image']['size'];
                                    $uploadName     = $_FILES['image']['name'];
                                    $userId         = $_SESSION['userId'];
                                    $username       = $_SESSION['username'];
                                    $target_dir = "profile/"; 
                                    $target_file    = $target_dir . basename($_FILES["image"]["name"]);
                                    $imgType        = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                    
                                    $lead->modifyProfile($userId,$username,$uploadedImageTemp,$uploadName,$imgType,$imgSize);
                                } 
                                else{
                                    echo"<script>alert('Sorry you need to select image !')</script>";
                                    echo"<script>alert('window.open('profile.php','_self')')</script>";
                                    $uploadOk = 0;
                                }
                                }
                                ?>
                               </div>
                        <div class="row d-flex p-2">
                                   
                            <div class="col">
                                <form action="" method="post" enctype="multipart/form-data">  
                                     <div class="form-group">  
                                            <input type="file" required class="form-control btn btn-outline-info " name="image" id="fileToUpload" >                                         
                                           <button type="submit" class="btn btn-info mt-2 " name="upload">save</button>                                            
                                         </div>
                                     </form>
                                </div>
                           </div>
                      </div>
                      <!-- end of prolife place -->
                      <!-- form place -->
                      <div  class="col-12 col-sm-12 col-md-6 col-lg-8 p-4 ">
                      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="ml-3 d-flex  font-weight-bold text-primary">
                                <span id="editInfo" class=" m-2"> Edit<i class="fas fa-info text-info ml-1 "></i></span>
                               <?php if($_SESSION['userType'] == 'Teacher'){  
                                    $classalreadyIn = $lead->classcreated($_SESSION['userId'] );
                               if(!$classalreadyIn){?>
                                      <span id="Newcourse" class="m-2"> class  <i class="fas fa-book text-info "></i></span>
                                  <?php  }
                                   ?>                              
                               
                                  
                                <?php }else{ ?>
                                    <span id="Newcourse" class="m-2"> Challenges  <i class="fas fa-plus text-info "></i></span>
                                <?php }?>
                                  </div>
                                                       
                              </div>
                    
                          <div id="user-edit-form"  class="col mt-2">
                                   <?php $lead->userFormWithValue($_SESSION['userId'],$_SESSION['email']);
                                                             
                                   ?>
                                    </div>
                                    
                                    <?php 
                                   if(isset($_POST["update"])){
      
                                    $username = $_POST['username'];
                                    $fname    = $_POST['fname'];
                                    $lname    = $_POST['lname'];                                 
                                    $userId   = $_SESSION['userId']; 
                                    $lead->userFormWithHiddenValue($fname,$lname,$username);
                              
                                      }
                                                                   
                                    if(isset($_POST['confirm'])){
                                        $username = $_POST['username'];
                                        $fname    = $_POST['fname'];
                                        $lname    = $_POST['lname'];                                 
                                        $userId   = $_SESSION['userId']; 
                                        $lead->userModifyc($userId,$username,$fname,$lname);
                                           }                               
                                  if(isset($_POST['addClass'])){  
                                    $className      = $_POST['className'];
                                    $discription   = $_POST['discription'];
                                    $instruction  = $_POST['instruction'];
                                    $classLeader = $_SESSION['userId'];
                                    $lead->addClass($classLeader,$className,$discription,$instruction);    
                                }
                                    ?>
                                    
                            </div>
                           
                      <!-- end of form place -->
                 </div>
            </div>
        </div>
   </div>


  
</div>



   <?php    
   include 'footer.php';} 
   else{
        $lead->unauthorized();
      }
   ?>