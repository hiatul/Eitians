<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/togglepopup.css">
       
    </head>
    <body style="height: auto;">
      
    <div class="col-12" style="border-bottom: 1px solid #ccc; padding:5px 80px;">
        <div class="col-4" style="float: right;text-align: center;padding: 0;"  >
          <a href="https://www.facebook.com/Relevantglobalorganic/" class="fa fa-facebook fk" style=""></a>
          <a href="#" class="fa fa-twitter fk" style=""></a>
          <a href="#" class="fa fa-google fk" style=""></a>
          <a href="#" class="fa fa-linkedin fk" style=""></a>
      </div>
    </div>
    <div class="col-12" style="background-color: white;padding:0px 80px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border-bottom: 5px solid #555;">
        <div class="col-2" style="padding: 0;">
            <img src="../image/logo.png" alt="logo" style="width: 100%;"> 
        </div>
        <div class="col-2" style="float: right;padding-top: 16px;padding-bottom: 0;text-align: center;">
            <a href="#" class="" onclick="myFun()" onmouseover="style.backgroundColor='#35B1E3'" onmouseout="style.backgroundColor='#357ebd'" style="padding:8px 25px;color: #fff;background-color: #357ebd;outline: none;border: 1px solid #357ebd;border-radius: 5px;text-decoration: none;font-family: global6;width: 100%;"><i class="fa fa-sign-in"></i> Sign in
              </a>
            <div class="popup">
               
                <div class="popuptext" id="myPopup" style="padding: 50px;">
                     <p style="color:#fff;padding-left: 10px;font-family: global6;margin: 0;clear: both;">Sign In With E-Nolimits Account</p>
                     <form action="LoginCheck.php" method="POST">
                                                
                                        <div class="col-12" style="padding-bottom: 0px;padding: 0;">
                                               <?php echo @$emailErr , @$PassErr; ?>
                                            <div class="col-12" style="padding: 5px;">

                                                <input type="email" name="USERNAME" placeholder="Enter Email" style="width: 100%;padding: 12px;outline: none;border: 1px solid #ccc;border-radius: 2%;font-family: global6;">  
                                           </div>
                                        <div class="col-12" style="padding: 5px;">
                                            <input type="password" name="PASSWORD" placeholder="Enter Password" style="width: 100%;padding: 12px;outline: none;border: 1px solid #ccc;border-radius: 2%;font-family: global6;">  
                                        </div>

                                                          <div class="col-12" style="padding: 15px;">
                                                              <h3 style="text-align:left;color: #000;font-family: global7;float: left;"><input  type="submit" value="Login" name="login" style="background-color:#357ebd;color:#fff;padding: 10px;cursor: pointer;outline: none;border: 1px solid #ccc;border-radius: 5px;font-family: global6;"></h3>
                                                              <a href="ForgotPassword.php" style="color:#fff;padding: 10px;font-family: global6;float: right;font-size: 12px;padding-top: 30px;text-decoration: none;">Forgot password ?</a>
                                                          </div>
                                        </div>
                    </form>
                    
                     <form method="POST" action="Applicant_register.php">
                    <div class="col-6" style="padding: 5px; position: relative; top: -6px;">
                           <p style="color:#fff;padding-left: 10px;font-family: global6;margin: 0;font-size: 12px;">Don't have a E-Nolimit account?</p>
                           <button  type="submit"  style="width: 70%;background-color:#357ebd;color:#fff;padding: 10px;cursor: pointer;outline: none;border: 1px solid #ccc;border-radius: 5px;font-family: global6;">Sign Up </button>
                       </div>
    
                    </form> 
                    
                     <form method="POST" action="Recuriter_Login.php">
                <div class="col-6" style="padding: 5px;">
                    <p></p><p style="color:#fff;padding-left: 10px;font-family: global6;margin: 0;font-size: 12px;">Recruiter?</p>
                           <button  type="submit"  style="width: 70%;background-color:#357ebd;color:#fff;padding: 10px;cursor: pointer;outline: none;border: 1px solid #ccc;border-radius: 5px;font-family: global6;">Click Here <i class="fa fa-sign-in"></i></button>
                       </div>
                     </form> 
         
                </div>
</div>
 
<script>
// When the user clicks on div, open the popup
function myFun() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
 
}
</script>
            
           
        
           
<br><span style="font-size: 10px;font-family: global6;">or <a href="Applicant_register.php" style="text-decoration: none;">Create a new account</a></span>
        </div>
        <div class="col-6" style="float:right;padding: 0px;background-color: blue;">  
<ul class="topnav bold" id="myTopnav">
    <li><a href="home.php" style="">Home</a></li>
    <li><a href="job.php">Find A Job</a></li>
    <li><a href="services.html">Industry</a></li>
    <li><a href="services.html">Location</a></li>
    <li><a href="contact.php">Contact Us</a></li>

  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-bars" id="Dashicon"></i> </a>
  </li>
</ul>
        </div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

    </div>
    
 
   
    </body>
</html>
