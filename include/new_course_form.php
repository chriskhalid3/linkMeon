<?php
include 'modul.php';
$lead=new conn();
session_start();
if(isset($_SESSION['userId']) && isset($_POST['ins'])){
 
    echo'
    <div class="col-md-12 col-lg-9 ">
    <form id ="class-addition-form  "  method="post" >  
                                            
<div class="form-group">                                        
        <input type="text" id="courseInput" name="courseName"  class="form-control border-none" placeholder="course name"  >
    </div>
    
    <div class="form-group">                                      
        <textarea type="text" id="discriptions" name="discription" rows="7" class="form-control border-none" placeholder="describe your course"  ></textarea>
    </div>
<div class="form-group">                                     
        <textarea type="text" id="comment" name="comment"  class="form-control border-none" placeholder="comment "  ></textarea>
    </div>

    <div class="form-group">                                     
        <textarea type="text" id="instructions" name="instructions"  class="form-control border-none" placeholder="set instructions "  ></textarea>
    </div>
    <div class="form-group">                                     
    <textarea type="text" id="goal" name="goal"  class="form-control border-none" placeholder="set Goal "  ></textarea>
      </div>

    <div class="form-group">
            <button  name="addcourse" class="btn btn-info btn-block " >Add <i class="fas fa-plus" ></i> </button>
        </div>
</form>  
    </div>
    ';

}
else{
    if(!empty($_SESSION['userId'])){
        $lead->logMeOut($_SESSION['userId']);
        }
    $lead->unauthorizedNewDir();
exit();
}


?>