<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
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
    <link rel="stylesheet" type="text/css" href="../css/ForgotPasswordStyle.css">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
<?php 
   
    include './header.php';  
 
   ?>   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:auto; padding-top: 50px;padding-bottom: 50px;">
                    <div class="col-12" style="  padding: 0;">
                                <ul class="breadcrumb">
                                          <li><a href="home.php">Home</a></li>
                                          <li>Login</li>
                                </ul>
                                
                    </div>
             
                
                    <div class="col-4 s1"  >
                        <form action="LoginCheck.php" method="POST">
                            <p style="color: red; font-family: global6;"><?php echo @$_SESSION['PassErr'];?></p>
                                        <p class="formText">Email</p>
                                        <input type="text" name="USERNAME" class="col-12 textbox" value="<?php echo @$_SESSION['EmailValue'];?>" >
                                        <p class="formText">Password</p>
                                        <input type="password" name="PASSWORD" class="col-12 textbox" >
                                        <input type="submit" class="col-12 textbox s2" style="margin-top: 30px;" name="login" value="Login">
                                      
                              </form>
                        <p style="text-align: center;font-family:global6;font-size: 12px;position: relative;padding: 0;margin-top:5px;color:black;">* New User?<a href="Applicant_register.php" style="text-decoration: none; color: #357ebd;font-size: 14px;">  Sign Up </a>here.</p>

                    </div>
             
          </div>






 <?php
 include './footer.html';
 ?>
</body>
</html>