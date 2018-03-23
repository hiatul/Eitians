<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
    
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
  <?php 
   if($_SESSION['RecLoginStatus']=="0")
   {
    include './header.php';
   }
   else
   {
      include './RecuriterHeader.php';
   }
 
   ?>   
  

              <div  class="bgimg col-12" style="padding-top: 30px; padding-bottom: 30px; ">
                    <div class="col-12" style="  padding: 0;">
                                <ul class="breadcrumb">
                                          <li><a href="home.php">Home</a></li>
                                          <li>Login </li>
                                </ul>
                      
                    </div>
                  
                 <div class="col-6"style="float: none;margin: auto;">
                          <p style="text-align: center;font-family:global4;font-size: 30px;position: relative;padding: 0;margin: 0;color:#fff;">Login</p>
                      </div>
                       
             
                  
                  <div class="col-12" style="padding-top: 10px;">
                       
                      <div class="wid col-5" style="float: none; margin: auto;padding: 30px; padding-right: 30px;border-radius: 5px;height: auto;color: #fff;background-color:#f9f9f9 ;text-align:center;text-align: justify;font-family: global6;">
                          <form action="RecLoginCheck.php" method="POST">
                            <h4 style="color: red; font-family: global6;"><?php echo @$_SESSION['RecPassErr'];?></h4>
                                 <p class="formText">Official Email</p>
                                       <input type="text" class="col-12 textbox" name="OEmail" value="<?php echo @$_SESSION['RecEmailValue'];?>">
                                 <p class="formText">Password</p>
                                         <input class=" col-12 textbox" style="padding: 0;"  type="password" name="Password">
                                         <br>
                                         <input type="submit" class="col-12 textbox" style="margin-top: 30px;padding: 0; height: 40px; background: #357ebd; color: white;" value="Login" name="Login">
                                      
                           </form>
                          <p style="text-align: center;font-family:global6;font-size: 12px;position: relative;padding: 0;margin-top:5px;color:black;"><a href="RecForgotPassword.php" style="text-decoration: none; color: #357ebd;font-size: 14px;">Forgot Password ? </a></p>
                    
                       
                          
                          <p style="text-align: center;font-family:global6;font-size: 12px;position: relative;padding: 0;margin-top:5px;color:black;">* New Recruiter?<a href="Recuriter_Register.php" style="text-decoration: none; color: #357ebd;font-size: 14px;">  Sign Up </a>here.</p>
                    </div>
                      
                    
                    </div>
                  
          </div>



 <?php
 include './footer.html';
 ?>



</body>
</html>