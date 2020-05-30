<?php 

class conn {

    private $hostName = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'linkon';
    protected $dns = '';
    private $conn = '';

 public function __construct(){
     
        try{
          $dns = 'mysql:host='.$this->hostName.';dbname='.$this->dbname.';';   
          $this->conn = new PDO($dns,$this->username,$this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
        catch(PDOException $error){

            echo 'connection not archived '.$error->getMessage();
        }

    }

// function for log in user
 public function logMeIn($username,$password){
    if(empty($username) && empty($password)){
      header('location:signin.php?error=your%20username%20and%20password%20field%20is%20empty');
      exit();
   }
     elseif(empty($username)){
      header('location:signin.php?error=your%20email%20or%20username%20field%20is%20empty');
      exit();
   }
   elseif(empty($password)){
      header('location:signin.php?error=your%20password%20field%20is%20empty');
      exit();
   }
   elseif(strlen($password) < 8 ){
      header('location:signin.php?error=your%20password%20value%20is%20to%20low');
      exit();
   }
   else{
      $sql  = "SELECT * from users where username = :username or userEmail = :email "; 
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':username'=>$username,':email'=>$username]);
      $returnedRow = $stmt->rowCount(); 
     if($returnedRow < 1){
      header('location:signin.php?error=Unknown%20user');
      exit();
     }else{
      // result of selected users  
      $row = $stmt->fetch();

      // if password match
      $isEqual = password_verify($password,$row['password']);
      if($isEqual){
        session_start();
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['userEmail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['profileName'] = $row['profile'];
        $_SESSION['userId'] = $row['userId'];
        $_SESSION['userType'] = $row['userTYpe'];
        

       $sql  = "UPDATE users SET status = 'active' where userId = :usid";
       $stmt = $this->conn->prepare($sql);
       $stmt->execute([':usid'=>$row['userId']]);


        header('location:index.php');
        exit();

      }
      // if password does not  match
      else{
         header('location:signin.php?error=your%20password%20is%20wrong');
         exit();
            }

         }
      }
 }

//function forgot password 

public function forgotPassword($email,$security){

   if(empty($email) || empty($security)){
      echo '<script>alert("You have empty field ")</script>';
      echo '<script>window.open("signin.php?Forgot=fail?error=empty%20fields")</script>';
   }else{
      $sql       = 'SELECT * FROM users where userEmail = :email';
      $stmtUsers = $this->conn->prepare($sql);
      $stmtUsers->execute([':email'=>$email]);
      $rowReturned = $stmtUsers->rowCount();
      // if user exist
if($rowReturned){
  
      $row = $stmtUsers->fetch();
    //if he or she has security question
   if($row['seculity_question'] !== 0 ){ 
            $sec_verfy = password_verify($security,$row['seculity_question']);
           if($sec_verfy){
              session_start();
              $_SESSION['userId'] = $row['userId'];
               echo' <script src="javascript/toggle.js"></script>';
               echo'
               <div class="sign-form" id="passreset" >
                  <form class="border-left-custom-top" action="include/changepass.php" method="post">
                     <div class="form-header">
                        <h2>Password verify </h2><small class="small"> step(2-2)</small>
                        
                     </div>
                     <div class="form-group">
                        <label for="">New password </label>
                        <input type="password" name="newPass"  class="form-control" placeholder="password" autocomplete="off"  id="">
                     </div>
                     <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" name="passConfirm"  class="form-control"  placeholder="confirm" autocomplete="off"  id="">
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary btn-block btn-lg " name="subNewPass">submit</button>
                     </dimev>
               
                     <div class="text-center gray-700  "  ><a href="signin.php">login</a> || <a href="signup.php">signup </a></div>
                     </form>
              </div>
               ';
               
               }else{
                  echo '<script>alert("Wrong security answer ")</script>';
                  echo '<script>window.open("signin.php?Forgot=fail?error=Wrong%20reset")</script>';
               } 

          }else{
            echo '<script>alert("You don\'t have security reset you need to create new account '.$row['seculity_question'] .' ")</script>';
            echo '<script>window.open("signup.php")</script>';
          }

      }else{           
         echo '<script>alert("Unknown user")</script>';
         echo '<script>window.open("signin.php?Forgot=fail?error=Unknow%20user")</script>';
          
      }

   }
}
public function changepass($newPass,$confPass,$userId){

 
    if(empty($newPass || empty($confPass))){
      echo '<script>alert("You have empty field ")</script>';
      header('location:../signin.php?error=empty%20password%20fields');
    }elseif(strlen($newPass) < 8 ){
      echo '<script>alert("You have inserted low password")</script>';
      echo '<script>window.open("../signin.php?error=low%20password")</script>';
    
    }elseif($newPass !== $confPass){
      echo '<script>alert("Your confirmation password is not equal to new password ")</script>';
      header('location:../signin.php?error=low%20password');
      }
    else{
        $hashPass = password_hash($newPass , PASSWORD_DEFAULT); 
        $sql = "UPDATE users SET password = :pass  where userId = :uid ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':pass'=>$hashPass,':uid'=>$userId]);
        $isAffected = $stmt->rowCount();
        if($isAffected){
          echo'<script>alert("Your password have been updated")</script>';
          header('location:../signin.php?success=your%20password%20has%20updated');
          exit();
        }else{
          echo'<script>alert("Your password have not been updated")</script>';
          header('location:../signin.php');
          exit();
        }
    }  

  
}

// function for signup user
public function signMeUp($fname,$lname,$username,$email,$password,$repassword,$gander,$country,$sec,$userType){
   $trimValue = trim($sec);   
      if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password) || empty($repassword) || empty($gander) || empty($country)|| empty($sec) || empty($userType)){
         header('location:signup.php?error=your%20have%20empty%20field');
         exit();
      }
      else{
     $sec = $trimValue;

         if(!preg_match("/^[a-zA-Z]*$/",$fname)){
            header('location:signup.php?error=invalid%20firstname%20should%20not%20contain%20spacial%20charactor%20or%20number');
            exit();
         }
        
         elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header('location:signup.php?error=invalid%20email');
            exit();
         }
         elseif(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
            header('location:signup.php?error=invalid%20username%20no%20space%20allowed');
            exit();
         }
         elseif($password !== $repassword){
            header('location:signup.php?error=password%does%20not%20match');
            exit();
         }
         elseif(strlen($password) < 8){
            header('location:signup.php?error=please%20increase%20your%20password');
            exit();
         }
         else{
            //check if user exist in database 
            $sql  ="SELECT * from users where username= :uname or userEmail =:email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':uname'=>$username,':email'=>$email]);
            $rowsReturned = $stmt->rowCount();
            $row = $stmt->fetch();
            if($rowsReturned > 0){
               if($row['userEmail'] == $email){
                  echo"<script>alert('Email already exist $email try again with another email')</script>";
                  echo"<script>alert('window.open('signup.php','_self')')</script>";
              
               }
               else{
                  echo"<script>alert('Username already exist $username try again with another username')</script>";
                  echo"<script>alert('window.open('signup.php','_self')')</script>";
                 
               }
            }
            else{
               $id      = '';
               $stut    = 'offline';
               $delete  = 0;
               $dateIn  = date("y-m-d"); 
               $ron = rand(1,5);
               $profile = 'avatar'.$ron.'.jpg'; 
               $profileDefault = 1;
               $dateOut = '';
               $change  = '';
               $secHash = password_hash($sec, PASSWORD_DEFAULT); 
               $hashPassword =password_hash($password, PASSWORD_DEFAULT); 
               $sql  = 'INSERT INTO users values (:userid,:fname,:lname,:uname,:email,:pass,:statu,:del,:prof,:gander,:country,:def,:change,:sec,:dateIn,:dateOut,:typeu)';
               $stmt = $this->conn->prepare($sql);
               $stmt->execute([':userid'=>$id,':fname'=>$fname,':lname'=>$lname,':uname'=>$username,':email'=>$email,':pass'=>$hashPassword,':statu'=>$stut,':del'=>$delete,':prof'=>$profile,':gander'=>$gander,':country'=>$country,':def'=>$profileDefault,':change'=>$change,':sec'=>$secHash,':dateIn'=>$dateIn,':dateOut'=>$dateOut,':typeu'=>$userType]);
               $affected = $stmt->rowCount();
               if($affected){
                  echo"<script>alert('you have been registered with username $username and email $email  ')</script>";
                  echo"<script>window.open('signin.php','_self')</script>";
               }else{

                  echo"<script>alert('you have not been registered with username $username and email $email  ')</script>";
               } 
           
                
            }
         }
      }
     
}


// session destroy
public function logMeOut($userId){
   $dateOut = date('y-m-d');
   $sql  = "UPDATE users SET status = 'offline' , dateOut = :dateOut where userId = :usid";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':usid'=>$userId,':dateOut'=>$dateOut]);
    session_start();  
    session_destroy(); 
    session_abort();
    session_start();
    header('location:signin.php');
    exit();
 }

// session destroy for unauthorised
public function unauthorized(){
   session_start();
    session_destroy(); 
    session_abort();
    session_start();
    header('location:signin.php');
    exit();
 }
 public function unauthorizedNewDir(){
   session_start();
   session_destroy(); 
   session_abort();
   session_start();
   echo'<script>window.open("../signin.php","_self")</script>';
   exit();
}
//profile retrive
public function profileRetrieve($userId){
         
   $sql  = "SELECT * FROM users where userId = :userid";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':userid'=>$userId]);
   $row = $stmt->fetch();
   echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$row['username'].'</span>
             ';
   if($row['profileDefault'] == 1 ){
    echo '  <img class="img-profile rounded-circle" src="profile/default/'.$row['profile'].'">
            '  ;
   }
   else{
      echo '  <img class="img-profile rounded-circle" src="profile/userProfile/'.$row['profile'].'">
      '  ;
   }
   echo'</a>';


}

//second profile retrieve

public function secProfileRetrieve($userId) {
   
   $sql  = "SELECT * FROM users where userId = :userid";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':userid'=>$userId]);
   $row = $stmt->fetch();
   if($row['profileDefault'] == 1 ){
      echo '<img class="img-profile rounded-circle" src="profile/default/'.$row['profile'].'">
      <span class=" d-lg-inline text-gray-600 small">'.$row['username'].', <small>your courses</small></span>        
      '  ;
     }
   else{
      echo '  <img class="img-profile rounded-circle" src="profile/userprofile/'.$row['profile'].'">
      '  ;
     }

}


//function for profile display


public function profileDisplay($userId) {
   
   $sql  = "SELECT * FROM users where userId = :userid";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':userid'=>$userId]);
   $row = $stmt->fetch();
   if($row['profileDefault'] == 1 ){
      echo '<img class="img-fluid " src="profile/default/'.$row['profile'].'">
      <span class=" d-lg-inline text-gray-600 small">'.$row['username'].', <small>your profile</small></span>        
      '  ;
     }
   else{
      echo '  <img class="img-fluid " src="profile/userprofile/'.$row['profile'].'">
      '  ;
     }

}


//funtion to customize profile
public function modifyProfile($userId,$username,$uploadedImageTemp,$uploadName,$imgType,$imgSize){
   $random = rand(1,100);

   $sql  =   "SELECT * from users where username = :uname and userId = :id";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':uname'=>$username,':id'=>$userId]);
   $row  = $stmt->fetch();
   $profileDefault = $row['profileDefault'];
   $dir = $userId.$random.$uploadName;
   
   if($profileDefault){
     //making file that hold  profile
      // $drc = 'profile/'.$username;
      // mkdir($drc);
    if($imgType !== 'png' && $imgType !== 'jpg' && $imgType !== 'jpeg' && $imgType !== 'gif' && $imgType !== 'webp' ){
      echo"<script>alert('Sorry your image type is not supported')</script>";
      echo"<script>alert('window.open('profile.php','_self')')</script>";
      $uploadOk = 0;
    }
    elseif($imgSize > 500000){
      echo"<script>alert('Your image size is too large!! try to crop it and try again or change it')</script>";
      echo"<script>alert('window.open('profile.php','_self')')</script>";
      $uploadOk = 0;
    }
    else{
     
      $currentImageName = $dir;
      $id     = '';
      $date   = date('y-m-d'); 
      $insert = "INSERT INTO profiles values (:uids,:PathName,:tri,:dateUpload)";
      $stmt   = $this->conn->prepare($insert);

     if($stmt->execute([':uids'=>$userId,':PathName'=>$currentImageName,':tri'=>$id,':dateUpload'=>$date])){

       if(move_uploaded_file($uploadedImageTemp , "profile/userprofile/$dir")){
             $sql  = "UPDATE users set profileDefault = 0 , profile = :profi where userId = :id";
             $stmt = $this->conn->prepare($sql);
             $stmt->execute([':profi'=>$dir,':id'=>$userId]); 
             $uploadOk = 1;
      
       }
       else{
         echo"<script> alert('Failed to upload')</script>";
         echo"<script>alert('window.open('profile.php','_self')')</script>";
         $uploadOk = 0;
       }
      }
      else{
         echo"<script> alert('Insert error')</script>";
         echo"<script>alert('window.open('profile.php','_self')')</script>";
         $uploadOk = 0;
      }
       
    }
   
   }

   // if you are not using default profile

   else{
   
   if(move_uploaded_file($uploadedImageTemp , "profile/userprofile/$dir")){
              
        $currentImageName = $dir;
        $id     = '';
        $date   = date('y-m-d'); 
        $insert = "INSERT INTO profiles values (:uids,:PathName,:tri,:dateUpload)";
        $stmt   = $this->conn->prepare($insert);

       if($stmt->execute([':uids'=>$userId,':PathName'=>$currentImageName,':tri'=>$id,':dateUpload'=>$date])){

         $sql  = "UPDATE users set profileDefault = 0 , profile = :profi where userId = :id";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([':profi'=>$dir,':id'=>$userId]); 
         $uploadOk = 1; 
        
       } 
       else{
         echo"<script> alert('Profileinserterror')</script>";           
         echo"<script>window.open('profile.php','_self')</script>";
         $uploadOk = 0;
       }  

     
         
   }
   else{
         echo"<script> alert('Failed to upload')</script>";
         echo"<script>alert('window.open('profile.php','_self')')</script>";
         $uploadOk = 0;
   }

   if($uploadOk){
      echo"<script> alert('successful uploaded')</script>";
      echo"<script>window.open('profile.php?upload=successful','_self')</script>";

   }
   else{
      echo"<script> alert('did not uploaded')</script>";
   }
}
    

}
//function to modify  user infomation
public function userFormWithValue($userId,$email){

   $sql  ="SELECT * from users where userId= :uname and userEmail =:email";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':uname'=>$userId,':email'=>$email]);
   $rowsReturned = $stmt->rowCount();
   $row = $stmt->fetch();
   $rand = rand(1,1000000);
   if($rowsReturned > 0){
     echo '
     <form  method="post" >  
                                        
     <div class="form-group">
             
             <input type="text" name="fname"  class="form-control border-none" value="'.$row['firstName'].'"  autocomplete="off" >
         </div>
         <div class="form-group">
           
             <input type="text" name="lname"  class="form-control border-none" value="'.$row['lastName'].'" autocomplete="off" >
         </div>
     <div class="form-group">
             
             <input type="text" name="username"  class="form-control border-none" value="'.$row['username'].'" autocomplete="off" >
         </div>
         
         <div class="form-group">
                 <button type="submit" class="btn btn-info btn-block btn-lg " name="update">Update</button>
             </div>
 </form>
     ';

   
     
   }
   else{
      echo"<script>alert('User doesnot exist $username try to reload')</script>";
      echo"<script>window.open('profile.php','_self')</script>";
     
   }
}

//user modify
public function userFormWithHiddenValue($fname,$lname,$username){

     echo '
     <form  method="post" >  
                                        
     <div class="form-group">
             
             <input type="hidden" name="fname"  class="form-control border-none" value="'.$fname.'"  autocomplete="off" >
         </div>
         <div class="form-group">
           
             <input type="hidden" name="lname"  class="form-control border-none" value="'.$lname.'" autocomplete="off" >
         </div>
     <div class="form-group">
             
             <input type="hidden" name="username"  class="form-control border-none" value="'.$username.'" autocomplete="off" >
         </div>
         
         <div class="form-group ml-2 text-center">
                 <button type="submit" class="btn btn-success " name="confirm">Update</button>
                 <a class="btn btn-info btn-danger " href="profile.php" >cancer</a>
             </div>
 </form>
     ';

    
     

}
 
public function searchUser($searchTarget,$userId){
   
   $sql  = "SELECT * FROM users where  username like concat('%',:search,'%') or userEmail like concat('%',:search,'%') having  userId != :id   ";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':id'=>$userId,':search'=>$searchTarget]);
   $isThere = $stmt->rowCount(); 
   if($isThere){
      $row = $stmt->fetchAll();

      foreach($row as $rows){
         $profileIsdefault = $rows['profileDefault'];
         echo '<div class="row" id="search-found">
         <div class="col-lg-12 p-0">
             <a  class="dropdown-item d-flex align-items-center" href="#">
                 <div class="dropdown-list-image mr-3">';
                 if($profileIsdefault){
                  echo' <img class="img-profile-'.$rows['status'].' rounded-circle" src="profile/default/'.$rows['profile'].'" alt="'.$rows['username'].'">';
                 }else{
                  echo' <img class="img-profile-'.$rows['status'].' rounded-circle" src="profile/userProfile/'.$rows['profile'].'" alt="'.$rows['username'].'">';
                 }
                  echo ' 
                 </div>
                 <div class="font-weight-bold">
                   <div class="text-gray-600 small " id="response"><li>'.$rows['username'].'</li></div>          
                <div class="small "> <i class="fas fa-user-circle text-'.$rows['status'].'" >'.$rows['status'].'</i></div>

              </div>
               </a>
         </div>
       </div>
       <div class="dropdown-divider" ></div>
       ';
      }
   }else{
        echo '<div class="row">
        <div class="col-lg-12 text-center">
            <ul>
               <p>No result about that :)</p>
            </ul>
        </div>
      </div>
      ';
   }
}

public  function userModifyc($userId,$username,$fname,$lname){

   if(empty($userId) || empty($username) || empty($fname) || empty($lname)){
      echo"<script>alert('You have empty field $username.$fname.$lname')</script>";
      echo"<script>window.open('profile.php','_self')</script>";
     
   }
   else{
     if(!preg_match("/^[a-zA-Z]*$/",$fname)){
      echo"<script>alert('Invalid first name no space allowed or spacial charactor for space use _ or -')</script>";
      echo"<script>window.open('profile.php','_self')</script>";
     
     }
     elseif(!preg_match("/^[a-zA-Z]*$/",$lname)){
      echo"<script>alert('Invalid last name')</script>";
      echo"<script>window.open('profile.php','_self')</script>";
     
     }
      //check if user exist in database 
      $sql  ="SELECT * from users where userId= :uname";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':uname'=>$userId]);
      $rowsReturned = $stmt->rowCount();
      $row = $stmt->fetch();
      if($row['username'] == $username){
                
            echo"<script>alert('Username already exist $username try again with another username')</script>";
            echo"<script>window.open('profile.php','_self')</script>";
        }
        else{
         
         $sql  = "UPDATE users set username =:uname ,firstName = :fname , lastName = :lname , changed = 1 where userId =:id";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([':fname'=>$fname,':lname'=>$lname,':uname'=>$username,':id'=>$userId]);
         $rowReturned  = $stmt->rowCount(); 
         if($rowReturned){
            echo"<script> alert('successful updated')</script>";
            echo"<script>window.open('profile.php?info=successful','_self')</script>";
         $_SESSION['username'] = $username;
         }
         else{
            echo"<script> alert(' Did not change ')</script>";
            echo"<script>window.open('profile.php?info=dsm','_self')</script>";
      
         }

        }
   }

}



public function  addClass($classLeader,$className,$discription,$instruction){
  $len = 3;
  $sql  ='SELECT  * from class where className = :classname ';
  $stmt = $this->conn->prepare($sql);
  $stmt->execute([':classname'=>$className]);
  $exist = $stmt->rowCount();

   if(isset($_POST['addClass'])){
     if(empty($classLeader)||empty($className)||empty($discription )|| empty( $instruction)){
         echo'<script>alert("you have empty field")</script>';
     }else{
       if(strlen($className) < 5){
         echo'<script>alert("class name charactor should be above 5")</script>';
       }
       elseif(strlen($discription) < $len){
         echo'<script>alert("class name charactor should be above '.$len.'")</script>';      
       }         
       elseif($exist){
         echo '<script>alert("class name exist")</script>';
       }
       else{
          $classId = '';
          $dateCreated = date('y-m-d');
          $sql  =  "INSERT INTO class values(:cid,:creator,:className,:datecreate,:discri,:instru)";
          $stmt =  $this->conn->prepare($sql);
          $stmt->execute([':cid'=>$classId,':creator'=>$classLeader,':className'=>$className,':datecreate'=>$dateCreated,':discri'=>$discription,':instru'=>$instruction]); 
          $inserted = $stmt->rowCount();
          if($inserted){
                echo '<script>alert("inserted")</script>';
          }else{
                echo '<script>alert(" not inserted")</script>';
          }
       }
     }
  }
  
}

public function classcreated($id){
   $sql  =  "SELECT * from class where userId = :userid";
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':userid'=>$id]);
   $classIn = $stmt->rowCount();
   if($classIn){
       return true;
   }else{
      return false;
   }
 } 

 public function courseCheck(){
 
   $sql  = 'SELECT course.* , class.*  from course join class using(classID) where userId = :classOwner';
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':classOwner' => $_SESSION['userId']]);
   $noCourseYet = $stmt->rowCount();
   if($noCourseYet){
      return true;      
   }else{
      return false; 
   }
   

}

//require more validation 

public function addCourse($courseName,$comment,$description,$instruction,$goal){
   if(!empty($courseName) && !empty($comment) && !empty($description) && !empty($instruction) && !empty($goal)){

      $sql  = "SELECT concat(mid(class.datecreated,1,2),'',mid(class.datecreated,7,8),'^',mid(users.username,1,5),'^',class.classname) as courseCode ,class.classID from class  join users using(userId) where userId = :classOwner";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([':classOwner' => $_SESSION['userId']]);
      $row  = $stmt->fetch();
      $date = date("h/i"); 
      $randme = rand(1,4);
      $code ='&%3';
      if($randme = 1){
         $code = '#^#%';
      }
      elseif($randme = 2){
         $code = '%^#%';
      }
      elseif($randme = 3){
         $code = '%^#%';
      }
      else{
         $code = '^#^#';
      }
      $rand = rand(1,5000);
      $fullConcat = $row['courseCode'].$date.$rand.$code;
      $courseCode = trim($fullConcat);
        
      //if the course exist
      $sqlExist  = 'SELECT * FROM course join class using (classId) join users using (userId) where userId = :id and course.courseName = :cname ';
      $stmtExist = $this->conn->prepare($sqlExist);
      $stmtExist->execute([':id'=>$_SESSION['userId'],':cname'=>$courseName]);
      $courseExist = $stmtExist->rowCount();
         if(!$courseExist){
            if(strlen($courseName) < 5){
               echo'<script>alert("too low !  course name should be more than what you provided ")</script>';
            }
            elseif(strlen($comment) < 5 ){
               echo'<script>alert("too low !  course comment should be more 200 words")</script>';
            }else{
               $complit = '';
               $date = date('y-m-d');
               $sql  = "INSERT into course values (:id,:classid,:courseNam,:datecreated,:statu,:deletStatus,:comment,:instruction,:discription,:goal,:code)";
               $stmt = $this->conn->prepare($sql);
              
               if( $stmt->execute([':id'=>$complit,':classid'=>$row['classID'],':courseNam'=>$courseName,':datecreated'=>$date,':statu'=>$complit,':deletStatus'=>$complit,':comment'=>$comment,':instruction'=>$instruction,':discription'=>$description,':goal'=>$goal,':code'=>$fullConcat])){
               echo '<div  class="alert alert-success text-center" > inserted </div>';
               } 
               else{
                  echo '<div  class="alert alert-danger text-center" > not created </div>';
                 }
            }
      
   }
   else{
      echo'<script>alert("Course exist ","_self")</script>';
   }
    
}
   else{
      echo'<script>alert("You have empty field ")</script>';
   }
   

}

public function coursePresenter(){
  
   $sql  = 'SELECT course.* , mid(course.courseName,1,1) as "short" ,class.classId from course join class using(classID) where userId = :classOwner';
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':classOwner' => $_SESSION['userId']]);
   $CourseYet = $stmt->rowCount();
   if($CourseYet){
      $row = $stmt->fetchAll();
      
   
     foreach($row as $rows){
        $clsmate = "SELECT* FROM coursetracks  join course using(courseId) join class using(classId) where classId = :classId and courseId = :courseId";
        $stmtSql = $this->conn->prepare($clsmate);
        $stmtSql->execute([':classId'=>$rows['classId'] ,':courseId'=> $rows['courseId'] ]);
        $classmate = $stmtSql->rowCount(); 
         
      echo'
     
     <div class="col-12 mt-3  col-sm-12 col-md-6 col-lg-6 mb-4"">
     <div class="card border-left-info shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">'. $rows['courseName'] .'</div>
             <div class="row no-gutters align-items-center">
               <div class="col-auto">
                 <div class=" mb-0 mr-3 font-weight-bold text-info"><a class="text-info" href="index.php?course='.$rows['courseCode'].'">Teach</a></div>
               </div>
               <div class="col">
                 <div class="mr-2">
                   <div class="text-xs" >classmates <p class="text-info d-inline">'.$classmate.'</p> </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-auto">
             <span class=" fa-2x   text-info text-uppercase">'.$rows['short'].'</span>
           </div>
         </div>
       </div>
     </div>
     
         </div>
     ';
     }
    
     if($CourseYet <= 5 ){

      echo '
    

      <div class="col-12 mt-3  col-sm-12 col-md-12 col-lg-12 mb-4">
      <div class="card border-left-custom-top bg-info shadow h-100 py-2">
        <div class="card-body" id = "addNewCourse" >
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Make</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class=" mb-0 mr-3 font-weight-bold text-default" ><i class="text-gray-100 fa-1x ">New course</i></div>
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
      
      ';
      
     }  else{
        
 echo '
    

 <div class="col-12 mt-3  col-sm-12 col-md-12 col-lg-12 mb-4">
 <div class="card border-left-custom-top bg-info shadow h-100 py-2">
   <div class="card-body">
     <div class="row no-gutters align-items-center">
       <div class="col mr-2">
         <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Make</div>
         <div class="row no-gutters align-items-center">
           <div class="col-auto">
             <div class=" mb-0 mr-3 font-weight-bold text-default" ><i class="text-gray-100 fa-2x " >disactive one course to add onather one</i></div>
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
  ';
 
     }
   }else{
      return false; 
   }
   
}



public function coursePresenterIndex(){
  
   $sql  = 'SELECT course.* , mid(course.courseName,1,1) as "short" ,class.classId from course join class using(classID) where userId = :classOwner';
   $stmt = $this->conn->prepare($sql);
   $stmt->execute([':classOwner' => $_SESSION['userId']]);
   $CourseYet = $stmt->rowCount();
   if($CourseYet){
      $row = $stmt->fetchAll();
      
    
     foreach($row as $rows){
        $clsmate = "SELECT* FROM coursetracks  join course using(courseId) join class using(classId) where classId = :classId and courseId = :courseId";
        $stmtSql = $this->conn->prepare($clsmate);
        $stmtSql->execute([':classId'=>$rows['classId'] ,':courseId'=> $rows['courseId'] ]);
        $classmate = $stmtSql->rowCount(); 
         
      echo'
     
     <div class="col-6 mt-3  col-sm-6 col-md-12 col-lg-12 mb-4"">
     <div class="card border-left-info shadow h-100 py-2">
       <div class="card-body">
         <div class="row no-gutters align-items-center">
           <div class="col mr-2">
             <div class="text-xs font-weight-bold text-info text-uppercase mb-1">'. $rows['courseName'] .'</div>
             <div class="row no-gutters align-items-center">
               <div class="col-auto">
                 <div class=" mb-0 mr-3 font-weight-bold text-info"><a class="text-info" href="index.php?course='.$rows['courseCode'].'">Teach</a></div>
               </div>
               <div class="col">
                 <div class="mr-2">
                   <div class="text-xs" >classmates <p class="text-info d-inline">'.$classmate.'</p> </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-auto">
             <span class=" fa-2x   text-info text-uppercase">'.$rows['short'].'</span>
           </div>
         </div>
       </div>
     </div>
     
         </div>
     ';
     }
    
   
   }else{
      return false; 
   }
   
}

public function courseFollowed(){
   //course  followed 
   $live = 1;
   $sql ='SELECT course.courseid,course.courseName,mid(course.courseName,1,1) as "short" ,course.courseCode ,class.classId  FROM coursetracks join course using(courseId) join class using(classId) where coursetracks.userId = :id and coursetracks.live = :live';
   $costmt = $this->conn->prepare($sql);
   $costmt->execute([':id'=>$_SESSION['userId'],':live'=>$live]);
   $rowTrack = $costmt->fetchAll();
   $courseTrackExist = $costmt->rowCount();
   if($courseTrackExist){
      foreach($rowTrack as $rowTracks){
         $clsmate = "SELECT* FROM coursetracks  join course using(courseId) join class using(classId) where classId = :classId and courseId = :courseId";
         $stmtSql = $this->conn->prepare($clsmate);
         $stmtSql->execute([':classId'=>$rowTracks['classId'] ,':courseId'=> $rowTracks['courseid'] ]);
         $classmate = $stmtSql->rowCount(); 

       echo'
       <div class="col-6 mt-3  col-sm-6 col-md-12 col-lg-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">'.$rowTracks['courseName'].'</div>
            <div class="row no-gutters align-items-center">
              <div class="col-auto">
                <div class=" mb-0 mr-3 font-weight-bold text-info"><a class="text-info" href="?course='.$rowTracks['courseCode'].'">Enroll</a></div>
              </div>
              <div class="col">
                <div class="mr-2">
                  <div class="text-xs" >classmates <p class="text-info d-inline">'. $classmate .'</p> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto">
            <i class=" fa-2x text-gray-300"> '.$rowTracks['short'].' </i>
          </div>
        </div>
      </div>
    </div>
  </div>
  

       ';
      }
   }else{
      echo'
      
      <div class="col-12 m-2">
      <div class="card border-left-custom-top bg-info  h-100 ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">              
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class=" mb-0 mr-3 font-weight-bold text-default" ><i class="text-gray-200 " >You need to join some courses so that you can attend one  </i></div>
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
   
   //classmate  

}

public function classPresenter(){

}

public function joincourse(){

   $sql = 'SELECT * from coursetracks';

}


}

?>