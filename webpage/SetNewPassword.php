<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
    }
    
    $_SESSION['RPEmail']=$_GET['data'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/ForgotPasswordStyle.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
<?php 
   if($_SESSION['LoginStatus']=="0")
   {
    include './header.php';
   }
   else
   {
    include './ApplicantHeader.php';
   }
 
   ?>   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:auto; padding-top: 50px;padding-bottom: 50px;">
                    <div class="col-12" style="  padding: 0;">
                                <ul class="breadcrumb">
                                          <li><a href="home.php">Home</a></li>
                                          <li>Set Password</li>
                                </ul>
                                
                    </div>
             
                
                    <div class="col-4 s1"  >
                        <form action="UpdatePassword.php" method="POST">
                            <p style="color: red; font-family: global6;"><?php echo @$_SESSION['PassErr'];?></p>
                                        <p class="formText">New Password</p>
                                        <input type="password" name="Password" class="col-12 textbox" >
                                        <p class="formText">Confirm Password</p>
                                        <input type="password" name="CPassword" class="col-12 textbox" >
                                        <input type="submit" class="col-12 textbox s2" style="margin-top: 10px;" name="PasswordSend" value="Set Password">
                                      
                              </form>
                    </div>
             
          </div>






 <?php
 include './footer.html';
 ?>










   
</body>
</html>