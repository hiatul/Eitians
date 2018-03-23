<?php
//$pattern = '/^(?:\(\+?44\)\s?|\+?44 ?)?(?:0|\(0\))?\s?(?:(?:1\d{3}|7[1-9]\d{2}|20\s?[78])\s?\d\s?\d{2}[ -]?\d{3}|2\d{2}\s?\d{3}[ -]?\d{4})$/';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$error="";
$_SESSION['fname']="";
$_SESSION['lname']="";
$_SESSION['pemail']="";
$_SESSION['oemail']="";
$_SESSION['omobile']="";
$_SESSION['company']="";
if(isset($_POST['signup']))
{
     include './../Connection/connect.php';
    if($connection==1)
    {
        
        
        $Table="applicant";
        $FName=$_POST['FirstName'];
        $LName=$_POST['LastName'];
        $PEmail=$_POST['PEmail'];
        $OEmail=$_POST['OEmail'];
        $Mobile=$_POST['Mobile'];
        $CompanyName=$_POST['CompanyName'];
        $Password=$_POST['Password'];
        
        if(!ctype_alpha($FName)||empty($FName)){
            $error="First Name should only contains characters";
            }
        elseif (!ctype_alpha($FName)||empty ($LName)) {
            $error="Last Name should only contains characters";
            $_SESSION['fname']=$FName;
            }
        elseif (!filter_var($PEmail, FILTER_VALIDATE_EMAIL)||empty($PEmail)){
            $error="Please enter correct Personal Email address";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
            }
          elseif (!filter_var($OEmail, FILTER_VALIDATE_EMAIL)||empty($OEmail)){
            $error="Please enter correct Official Email address";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
             $_SESSION['pemail']=$PEmail;
            }
          elseif(empty($Mobile) ) 
            {
                $error="Please enter correct Phone number";
                    $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                
            }
//           elseif( !preg_match( $pattern, $Mobile ) )
//                {
//                    $error="Please enter correct Phone number";
//                    $_SESSION['fname']=$FName;
//                    $_SESSION['lname']=$LName;
//                    $_SESSION['pemail']=$PEmail;
//                    $_SESSION['oemail']=$OEmail;
//                    
//                }
           elseif (empty($CompanyName)) {
            $error="Company Name should only contains characters";
                    $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                    $_SESSION['omobile']=$Mobile;
            }
            
        elseif (strlen($_POST["Password"]) <= '8') {
            $error ="Your password must contain At Least 8 characters!";
              $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                    $_SESSION['omobile']=$Mobile;
                     $_SESSION['company']=$CompanyName;
                    
        }
        elseif(!preg_match("#[0-9]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                    $_SESSION['omobile']=$Mobile;
                     $_SESSION['company']=$CompanyName;
        }
        elseif(!preg_match("#[A-Z]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                    $_SESSION['omobile']=$Mobile;
                     $_SESSION['company']=$CompanyName;
        }
        elseif(!preg_match("#[a-z]+#",$Password)) {
            $error ="Your password must contain Number,Capital Letter and Lowercase Letter";
            $_SESSION['fname']=$FName;
                    $_SESSION['lname']=$LName;
                    $_SESSION['pemail']=$PEmail;
                    $_SESSION['oemail']=$OEmail;
                    $_SESSION['omobile']=$Mobile;
                     $_SESSION['company']=$CompanyName;
        }
        else{
            
           $command="Insert into recruitersignup(FirstName,LastName,PEmail,OEmail,Mobile,CompanyName,Password) values('$FName','$LName','$PEmail','$OEmail','$Mobile','$CompanyName','$Password')";
            if($result=$con->query($command))
            {
                $error="To complete the registration sucessfully click the link sent to your email";
                $code=rand(100,99999);
                $command2="Insert into tokens(Email,Value,Type) values('$OEmail','$code','$Type1')";
                if($result=$con->query($command2))
                {
                    session_unset();
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type:text/html;charset=iso-8859-1' . "\r\n";
                    $subject2="Thanks for your registration with Enolimits please click the link given below to complete registration";
                    $message2="<h2>Dear $FName $LName</h3><br><h3>We have sucessfully recieved your registration details please click the link given below to complete registration</h3><br><a href='http://www.telpherpoint.com/nvv/webpage/RecValidate.php?data=$code'>Verify Yourself</a>";
                    mail($OEmail,$subject2,$message2,$headers);                    
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
                  
                 
                     
                      <div class="col-6"style="float: none;margin: auto;">
                          <p style="text-align: center;font-family:global4;font-size: 30px;position: relative;padding: 0;margin: 0;color:#fff;">Sign Up</p>
                      </div>
                       
                 
             
                  
                  <div class="col-12" style="padding-top: 10px;">
                       
                      
                    <div class="wid col-6" style="float: none;margin: auto;padding: 30px; padding-right: 30px;border-radius: 5px;height: auto;color: #fff;background-color:#f9f9f9 ;text-align:center;text-align: justify;font-family: global6;">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
                            <h4 style="color: red; font-family: global6;"><?php echo $error?></h4>
                                        <p class="formText">First Name</p>
                                        <input type="text" class="col-12 textbox" name="FirstName" value=<?php echo @$_SESSION['fname']; ?>>
                                       <p class="formText">Last Name</p>
                                       <input type="text" class="col-12 textbox" name="LastName" value=<?php echo @$_SESSION['lname']; ?>>
                                       <p class="formText">Personal Email</p>
                                       <input type="text" class="col-12 textbox" name="PEmail" value=<?php echo @$_SESSION['pemail']; ?>>
                                        <p class="formText">Official Email</p>
                                       <input type="text" class="col-12 textbox" name="OEmail" value=<?php echo @$_SESSION['oemail']; ?>>
                                        <p class="formText">Official Mobile No.</p>
                                       <input type="text" class="col-12 textbox" name="Mobile" value=<?php echo @$_SESSION['omobile']; ?>>
                                        <p class="formText">Company Name</p>
                                       <input type="text" class="col-12 textbox" name="CompanyName" value=<?php echo @$_SESSION['company']; ?>>
                                         <p class="formText">Password</p>
                                         <input class=" col-12 textbox" style="padding: 0;"  type="password" name="Password">
                                         <br>
                                         <input type="submit" class="col-12 textbox" style="margin-top: 30px;padding: 0; height: 40px; background: #357ebd; color: white;" value="Sign Up" name="signup">
                                      
                        </form>
                    </div>
                    </div>
                  
          </div>



 <?php
 include './footer.html';
 ?>



</body>
</html>