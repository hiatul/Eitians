<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
     if($_SESSION['RecLoginStatus']=="0")
   {
     header('location:home.php');
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
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Edit_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
       <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
       <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">
   

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
   
    <style>

</style>
<script type="text/javascript">
    function chnng()
    {
        
            document.getElementById("Settings1").style.backgroundColor="#357ebd";
            document.getElementById("Settings1").style.borderLeft="6px solid gray";
            document.getElementById("Settings2").style.color="white";
            document.getElementById("Settings3").style.color="white";
        
        
    }
    
  
</script>
</head>
<body onload="chnng()">
   <?php include './RecuriterHeader.php';?>
    
    
                     <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                                <div class="col-12" style="  padding: 0;">
                                            <ul class="breadcrumb">
                                                      <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                                      <li><a href="Recuriter_Dashboard_Edit_profile.php"style="color: white;">Settings</a></li>
                                            </ul>
                                 
                                </div>

             
                     </div>

    
     <div class="col-12" style="height: auto;padding-bottom: 50px;" >
                       
                       
                           <div class="col-3" style="padding: 0px;">
                         
                            <?php
                           include '../webpage/Recuriter_Dashboard_Menu.php';
                           ?>
                           </div>
                           
                              
                 <div class="col-8 content"  style="">
                                <div  class="col-8"style="">
                                                   <p class="headp" style="font-size: 25px;">Change Password</p>
                            
                                                   <div style="">
                                                       <form action="ChangePasswordRec.php" method="POST">
                                                                            <p style="color: red; font-family: global6;"><?php echo @$_SESSION['PassErr'];?></p>
                                                                            <p class="formText">Old Password</p>
                                                                            <input type="password" name="OPassword" class="col-12 textbox" >
                                                                            <p class="formText">New Password</p>
                                                                            <input type="password" name="NPassword" class="col-12 textbox" >
                                                                            <input  type="submit" class="col-12 textbox s2" style="margin-top: 20px;" name="PasswordSend" value="Set Password">

                                                             </form>
                                                   </div>
                             </div>
                

                 </div>
                           </div>
                           

            
                    

    
    
 <?php
 include './footer.html';
 ?>










   
</body>
</html>