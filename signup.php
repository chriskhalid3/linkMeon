<?php include "header.php"; 
session_start();
session_destroy();

if(isset($_POST['signup'])){
   include 'include/modul.php';
   $lead    = new conn();
   $email   = trim($_POST['userEmail']);
   $username= $_POST['userName'];
   $pass    = $_POST['userPass']; 
   $repass  = $_POST['Repassword'];
   $fname   = $_POST['fname'];
   $lname   = $_POST['lname'];
   $gander  = $_POST['userGander'];
   $country = $_POST['userCountry'];
   $type = $_POST['userType'];
   $sec     = strtolower(trim($_POST['Security']));
   $lead->signMeUp($fname,$lname,$username,$email,$pass,$repass,$gander,$country,$sec,$type);
}

?>
    
<title>Create new Account</title>
</head>

<body>
    <div class="sign-form ">
        <form class="border-left-custom-top" action="" method="post">
            <div class="form-header">
                <h2>Signup </h2>
                <?php  if(isset($_GET['error'])){ ?>
                     <div style="border: 1px solid rgb(235, 10, 122);" class="alert alert-info border-violet">
                  <?php 
                  
                  echo strlen($_GET['error']) < 10 ; ?>
                     </div>
             <?php 
            exit();
            } ?>

             <?php  if(isset($_GET['success'])){ ?>
                     <div style="border: 1px solid rgb(235, 10, 122);" class="alert alert-info border-violet">
                  <?php   echo strlen($_GET['success']) < 10 ; ?>
                     </div>
             <?php 
            exit();
            } ?>
            </div>
            <div class="form-group">
                <label for="">Firstname</label>
                <input type="text" name="fname"  class="form-control" placeholder="firstname"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Lastname</label>
                <input type="text" name="lname"  class="form-control" placeholder="lastname"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="userName"  class="form-control" placeholder="Example: khalid3"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" name="userEmail"  class="form-control" placeholder="some@site.com"   id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="userPass"  placeholder="password" class="form-control" placeholder="password"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="Repassword"  placeholder="Re-password" class="form-control" placeholder="Confirm"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Write something you will remember during password reset (secret) </label>
                <input type="text" name="Security"  placeholder="Secrets::" class="form-control" placeholder="retype your password"  required  id="">
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <select class="form-control" name="userCountry"  required  id="">
                     <option disabled > Select country</option>
                     <option value="Rwanda">Rwanda</option>
                     <option value="Kenya">Kenya</option>
                </select>  
            </div>
            <div class="form-group">
                <label for="">Gander</label>
                <select class="form-control" name="userType"  required  id="">
                     <option disabled> Select your type</option>
                     <option value="Student">Student</option>
                     <option value="Teacher">Teacher</option>
                    
                </select>  
            </div>
            <div class="form-group">
                <label for="">Gander</label>
                <select class="form-control" name="userGander"  required  id="">
                     <option disabled> Select gender</option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                    
                </select>  
            </div>
            <div class="form-group">
                <label class="checkbox-inline"  for=""> <input type="checkbox"  > I accept the <a href="#">terms of use</a> &amp; <a href="#">Privacy policy</a>  </label>
            </div>
          
           
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary btn-block btn-lg " name="signup">Sign Up</button>
            </div>
           
            <div class="text-center small " style="color: #f0f0f0" >Already have an account <a href="signin.php">Signin here </a> </div>
        </form>
       
    </div>


    <?php 
   include "footer.php" ;

?>

