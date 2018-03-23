<?php
include '../Connection/connect.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
    }

if(isset($_POST['PasswordSend']))
{
    if($connection==1)
    {
        $Email=$_POST['Email'];
        
        if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
        {
            $Emailerr="Invalid Email";
        }
        else
        {
            $command="Select * from recruitersignup WHERE OEmail='$Email'";
            $m=$con->query($command);
            if($data=$m->fetch_assoc())
            {
//                $code=rand(100,99999);
//                $command2="Insert into tokens(Email,Value,Type) values('$Email','$code','$Type2')";

                            
                      
                            $headers = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type:text/html;charset=iso-8859-1' . "\r\n";
                            $subject2="Please click the link given bleow to change Password.";
                            $message2="<h2>Dear ".$data['FirstName']." ".$data['LastName']."</h3><br><h3>please click the link given below to change the password.</h3><br><a href='http://www.telpherpoint.com/nvv/webpage/RecSetNewPassword.php?data=$Email'>Link Reset Password</a>";
                            mail($Email,$subject2,$message2,$headers);
                            
                            $Emailerr="Reset password link has been sent to your e-mail.";
            }
            else
            {
                $Emailerr="Invalid User";
            }
        }
    }   
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
   if($_SESSION['LoginStatus']=="0")
   {
    include './header.php';
   }
   else
   {
    include './RecuriterHeader.php';
   }
 
   ?>   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:400px; ">
                    <div class="col-12" style="  padding: 0;">
                                <ul class="breadcrumb">
                                          <li><a href="home.php">Home</a></li>
                                          <li>Forgot Password</li>
                                </ul>
                                
                    </div>
             
                
                    <div class="col-4 s1"  >
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <p style="color: red; font-family: global6;"> <?php echo @$Emailerr;?> </p>
                                  <p class="formText" style="font-family: global6;">E-mail</p>
                                  <input type="text" class="col-12 textbox" name="Email">
                                        <input type="submit" class="col-12 textbox s2" style="margin-top: 30px;" name="PasswordSend" value="Send Mail">
                                      
                              </form>
                        <p style="color: black;font-size: 10px;font-family: global6;">* Password reset link will be send to this e-mail.</p>
                        
                    </div>
             
          </div>






 <?php
 include './footer.html';
 ?>










   
</body>
</html>