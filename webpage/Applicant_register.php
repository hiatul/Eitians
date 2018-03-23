<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$error="";
$_SESSION['fname']="";
$_SESSION['lname']="";
$_SESSION['email']="";
if(isset($_POST['signup']))
{
    include './../Connection/connect.php';
    if($connection==1)
    {
        
        
        $Table="applicant";
        $FName=$_POST['FirstName'];
        $LName=$_POST['LastName'];
        $Email=$_POST['Email'];
        $Password=$_POST['Password'];
        
        if(!ctype_alpha($FName)||empty($FName)){
            $error="First Name should only contains characters";
            }
        elseif (!ctype_alpha($FName)||empty ($LName)) {
            $error="Last Name should only contains characters";
            $_SESSION['fname']=$FName;
            }
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)||empty($Email)){
            $error="Please enter correct Email address";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            }
        elseif (strlen($_POST["Password"]) <= '8') {
            $error ="Your password must contain At Least 8 characters!";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            $_SESSION['email']=$Email;
        }
        elseif(!preg_match("#[0-9]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            $_SESSION['email']=$Email;
        }
        elseif(!preg_match("#[A-Z]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            $_SESSION['email']=$Email;
        }
        elseif(!preg_match("#[a-z]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            $_SESSION['email']=$Email;
        }
        else{
            
           $command="Insert into applicant(FirstName,LastName,Email,Password) values('$FName','$LName','$Email','$Password')";
            if($result=$con->query($command))
            {
                $error="To complete the registration sucessfully click the link sent to your email";
                $code=rand(100,99999);
                $command2="Insert into tokens(Email,Value,Type) values('$Email','$code','$Type1')";
                if($result=$con->query($command2))
                {
                    session_unset();
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type:text/html;charset=iso-8859-1' . "\r\n";
                    $subject2="Thanks for your registration with Enolimits please click the link given below to complete registration";
                    $message2="<h2>Dear $FName $LName</h3><br><h3>We have sucessfully recieved your registration details please click the link given below to complete registration</h3><br><a href='http://www.telpherpoint.com/nvv/webpage/ApplicantValidate.php?data=$code'>Verify Yourself</a>";
                    mail($Email,$subject2,$message2,$headers);                    
                }
                
            }
            else {
                $error="User already registered Please Sign In";
//                header("refresh:5;url=home.php");
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

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
      <?php 
//      session_save_path("/home/users/web/b644/ipg.telpherpoint"/cgi-bin/tmp);
      
      include './header.php';?>
   
  

         <div  class="bgimg col-12" style="padding-top: 30px; padding-bottom: 30px; ">
                    <div class="col-12" style="  padding: 0;">
                                <ul class="breadcrumb">
                                          <li><a href="home.php">Home</a></li>
                                          <li>Sign Up</li>
                                </ul>
                                
                    </div>
             
                     <div class="col-8 vis" style="height: 480px; padding: 0;">
                         
                        
                                 <p style="font-family:global4;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;">Sign Up </p>
                                 <div class="col-1" style=" height: 40px; float: left; "><i class="fa fa-user-o fa-3x" aria-hidden="true" style="color:#fff;"></i> </div>
                                 <div class="col-11" style=" height: 40px;">
                                 <p style="font-family:global4;font-size: 20px;position: relative;padding: 0;margin: 0;color:#fff;">Register and Search for various jobs.</p>
                                 <p style="font-family:global4;font-size: 13px;position: relative;padding: 0;margin: 0;color:#fff;">Sign up ,finding job was never this easy.</p><br><br>
                                 </div>
                                 <div class="col-1" style="  height: 40px; float: left; margin-top: 35px;" ><i class="fa fa-sign-in fa-3x" aria-hidden="true" style="color:#fff;"></i> </div>
                                 <div class="col-11" style=" height: 40px;margin-top: 35px;">
                                  <p style="font-family:global4;font-size: 20px;position: relative;padding: 0;margin: 0;color:#fff;"> Create a profile and upload your resume</p>
                                 <p style="font-family:global4;font-size: 13px;position: relative;padding: 0;margin: 0;color:#fff;">Showcase your skills and be found.</p><br>
                                 </div>
                                 <div  class="col-1"style="  height: 40px; float: left; margin-top: 35px;"><i class="fa fa-search fa-3x" aria-hidden="true" style="color:#fff;"></i></div>
                                 <div class="col-11" style="height: 40px;margin-top: 35px;">
                                <p style="font-family:global4;font-size: 20px;position: relative;padding: 0;margin: 0;color:#fff;"> Search and apply to thousands of  jobs</p>
                                  <p style="font-family:global4;font-size: 13px;position: relative;padding: 0;margin: 0;color:#fff;">You are one step away from your dream job.</p>
                                 </div>
                             
                                 
                                  
                    </div>
                 
                    <div class="wid col-4" style="padding: 30px; padding-right: 30px;border-radius: 5px;height: auto;color: #fff;background-color:#f9f9f9 ;text-align:center;text-align: justify;font-family: global6; ">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                            <h4 style="color: red; font-family: global6;"><?php echo $error?></h4>
                                        <p class="formText">First Name</p>
                                        <input type="text" class="col-12 textbox" name="FirstName" value=<?php echo @$_SESSION['fname']; ?>>
                                       <p class="formText">Last Name</p>
                                       <input type="text" class="col-12 textbox" name="LastName" value=<?php echo @$_SESSION['lname']; ?>>
                                       <p class="formText">Email</p>
                                       <input type="text" class="col-12 textbox" name="Email" value=<?php echo @$_SESSION['email']; ?>>
                                         <p class="formText">Password</p>
                                         <input class=" col-12 textbox" style="padding: 0;"  type="password" name="Password">
                                         <br>
                                         <input type="submit" class="col-12 textbox" style="margin-top: 30px;padding: 0; height: 40px; background: #357ebd; color: white;" value="Sign Up" name="signup">
                                      
                        </form>
                    </div>
             
          </div>



<!--         <div class="bgimg-3 col-12" style="color: #000;background-color:#fff;text-align:center;text-align: justify;font-family: global6;">
  <span style="font-family: global7;font-size: 30px;background-color: black;color: #fff;padding: 30px; border-radius: 10px;position: relative;left:40%;">Parrelex Demo</span>

  <p style="font-family: global4;line-height: 40px;padding: 30px;color: #fff;">Parallax scrolling is a web site trend where the background content is moved at a different speed than the foreground content while scrolling. Nascetur per nec posuere turpis, lectus nec libero turpis nunc at, sed posuere mollis ullamcorper libero ante lectus, blandit pellentesque a, magna turpis est sapien duis blandit dignissim. Viverra interdum mi magna mi, morbi sociis. Condimentum dui ipsum consequat morbi, curabitur aliquam pede, nullam vitae eu placerat eget et vehicula. Varius quisque non molestie dolor, nunc nisl dapibus vestibulum at, sodales tincidunt mauris ullamcorper, dapibus pulvinar, in in neque risus odio. Accumsan fringilla vulputate at quibusdam sociis eleifend, aenean maecenas vulputate, non id vehicula lorem mattis, ratione interdum sociis ornare. Suscipit proin magna cras vel, non sit platea sit, maecenas ante augue etiam maecenas, porta porttitor placerat leo.</p>
</div>    -->
    




<!--
    <div style="position:relative;background-color:#c85b5f;" class="col-12">
  <div style="color:#ddd;background-color:#282E34;text-align:center;text-align: justify;">
    <p>Scroll up and down to really get the feeling of how Parallax Scrolling works.</p>
  </div>
</div>-->

<!--    
<div class="col-12" style="background-color: #ccc;height: 50%;">
     <div class="caption">
      <span style="font-family: global7;font-size: 30px;background-color: black;color: #fff;padding: 15px; border-radius: 10px;">Welcome</span>
  </div>
</div> -->


 <?php
 include './footer.html';
 ?>



</body>
</html>