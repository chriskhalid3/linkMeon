<?php
include 'modul.php';
$lead =  new conn();
session_start();

if(isset($_SESSION['username']) && isset($_POST['newCourse']) && $_SESSION['userType'] == 'Teacher'){
   $classalreadyIn = $lead->classcreated($_SESSION['userId'] );
    if(!$classalreadyIn){
echo'
<form id ="class-addition-form" method="post" enctype="multipart/form-data" >  
                                            
<div class="form-group">                                        
        <input type="text" id="classInput" name="className"  class="form-control border-none" placeholder="class name" autocomplete="off" >
    </div>
    
    <div class="form-group">                                      
        <textarea type="text" id="discriptions" name="discription" rows="7" class="form-control border-none" placeholder="describe your class"  ></textarea>
    </div>


    <div class="form-group">                                     
        <textarea type="text" id="instruction" name="instruction"  class="form-control border-none" placeholder="set instructions "  ></textarea>
    </div>
   

    <div class="form-group">
            <button  name="addClass" class="btn btn-info btn-block btn-lg " ><i class="fas fa-plus" ></i> course</button>
        </div>
</form>  

';}
else{
    
    $noCourseYet = $lead->courseCheck();
if(!$noCourseYet){

 echo '<div class="col-12">
    

<div class="col-12 mt-3  col-sm-12 col-md-12 col-lg-12 mb-4">
<div class="card border-left-custom-top bg-info shadow h-100 py-2">
  <div class="card-body" id = "addNewCourse" >
    <div class="row no-gutters align-items-center">
      <div class="col mr-2">
        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Make</div>
        <div class="row no-gutters align-items-center">
          <div class="col-auto">
            <div class=" mb-0 mr-3 font-weight-bold text-default" ><i class="text-gray-100 fa-2x "  >New course</i></div>
          </div>
          <div class="col">
            <div class="mr-2">
              <div class="text-xs" > </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <i class="fas fa-plus fa-2x text-gray-200"></i>
      </div>
    </div>
  </div>
</div>

    </div>

</div> ';

    }
    else{

        echo '<div class="col-12">
    

        <div class="col-12 mt-3  col-sm-12 col-md-12 col-lg-6 mb-4">
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
        
        </div> ';
    }

}

}elseif(isset($_SESSION['username']) && isset($_POST['newCourse']) && $_SESSION['userType'] == 'Student'){

    echo '<form  method="post" enctype="multipart/form-data" >  
                                            
    <div class="form-group">                                        
            <input type="text" id="courseInput" name="challenge"  class="form-control border-none" placeholder="challenge" autocomplete="off" >
        </div>
        <div class="form-group">                                        
            <input type="text" id="comment" name="caption"  class="form-control border-none" placeholder="caption" autocomplete="off" >
        </div>
       
        <div class="form-group">
                <button  name="addChallenge" class="btn btn-info btn-block btn-lg " > challenge</button>
            </div>
    </form>  ';

}

else{
    header('location:../signin.php');
    exit();
}
?>