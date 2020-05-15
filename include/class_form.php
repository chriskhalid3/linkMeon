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
echo '<div class="alert alert-info">you have class</div> ';
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