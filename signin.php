<?php   include 'header.php'; 
session_start();
session_destroy();
include 'include/modul.php';
$lead = new conn();
if(isset($_POST['sign_in'])){
   
   $username = strtolower(trim($_POST['email']));
   $pass     = $_POST['password']; 
   $lead->logMeIn($username,$pass);

}

?>

   <style>
   #functionWhen{
    display: none;
    opacity: 0;}
    
     </style>
   <title>Login into your account</title>
</head>

<?php
$rand = rand(1,1000000);
if(empty($_GET['Forgot'])){?>
 <body>
    <div class="sign-form ">
        <form class="border-left-custom-top" action="" method="post">
            <div class="form-header">
                <h2>Sign in </h2>
                
               <?php  if(isset($_GET['error']) && strlen($_GET['error']) < 50){ ?>
                     <div style="border: 1px solid rgb(235, 10, 122);" class="alert alert-info border-violet">
                  <?php   echo $_GET['error'] ; ?>
                     </div>
             <?php  } ?>
             <?php  if(isset($_GET['success']) && strlen($_GET['success']) < 26){ ?>
                     <div style="border: 1px solid rgb(235, 10, 122);" class="alert alert-info ">
                  <?php   echo $_GET['success']  ; ?>
                     </div>
             <?php 
            
            } ?>
                </div>
            <div class="form-group">
                <label for="">Email Or Username</label>
                <input type="text" name="email"  class="form-control" placeholder="some@site.com or username" autocomplete="off"  id="">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password"  placeholder="password" class="form-control" placeholder="some@site.com" autocomplete="off"  id="">
            </div>
           
            <div class="small">Forgot password <a style = "border:none;color: #2cb3dd;outline:none" href="signin.php?Forgot=<?php  echo $rand; ?>" type="submit" name="forgot" >click here</a> </div><br>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary btn-block btn-lg " name="sign_in">Login</button>
            </div>
       
            <div class="text-center gray-700 small "  >Don't have an account <a href="signup.php">Create one</a> </div>
        </form>
        
    </div>
<?php }

if(isset($_GET['Forgot']) ){
    
?>
 <div class="sign-form" id="sign-form" >
        <form class="border-left-custom-top" action="" method="post">
            <div class="form-header">
                <h2>Fill it to reset </h2><small class="small"> step(1-2)</small>
                <?php  if(isset($_GET['error'])){ ?>
                     <div style="border: 1px solid rgb(235, 10, 122);" class="alert alert-info border-violet">
                  <?php   echo $_GET['error'] ; ?>
                     </div>
             <?php  } ?>
            </div>
            <div class="form-group">
                <label for="">Email </label>
                <input type="text" name="email"  class="form-control" placeholder="Email@some.com" autocomplete="off"  id="">
            </div>
            <div class="form-group">
                <label for="">Security reset</label>
                <input type="text" name="question"  placeholder="secret::" class="form-control" autocomplete="off"  id="">
            </div>
           <div class="form-group">
                <button type="submit" class="btn btn-outline-primary btn-block btn-lg "  name="subQuestion">submit</button>
            </div>
       
            <div class="text-center gray-700  "  ><a href="signin.php">login</a> || <a href="signup.php">signup </a></div>
        </form>
       </div>
       

<?php } if(isset($_POST['subQuestion'])){ 
    
    $email     = strtolower(trim($_POST['email']));
    $security  = strtolower(trim($_POST['question']));
    $lead->forgotPassword($email,$security);
} ?>
    


    <?php 
   
   include "footer.php" ;

?>
