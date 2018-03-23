<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if($_SESSION['LoginStatus']=='0')
            {
                header('location: home.php');
            }
            else{
                
                
               
               
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
<link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">

<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <script type="text/javascript">
            function backgch(){
            document.getElementById("Settings1").style.backgroundColor="#357ebd";
            document.getElementById("Settings1").style.borderLeft="6px solid gray";
            document.getElementById("Settings2").style.color="white";
            document.getElementById("Settings3").style.color="white";
        }
        </script>
    </head>
    <body onload="backgch()">
         <?php 
           
            
                include './ApplicantHeader.php';
            

            
            ?>
        <div>
            
             <div  class="bgimg col-12" style="padding-top: 0;">
 <ul class="breadcrumb">
     <li><a href="userdashboard.php">Dashboard</a></li>
  <li>home</li>
 
 
</ul>
        <p style="font-family:Open Sans;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;"><?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
</div>

        </div>     
        
        <div class="col-12" style="">
                    <?php 
                        include './ApplicantDashboardMenu.php';
                      ?>
            
                    <div class="col-8 content"  style="border-left: 1px solid lightgray;">
                         
                        <div  class="col-8"style="">
                                                   <p class="headp" style="font-size: 25px;">Change Password</p>
                            
                                                   <div style="">
                                                       <form action="ChangePasswordApplicant.php" method="POST">
                                                                            <p style="color: red; font-family: global6;"><?php echo @$_SESSION['PassErr1'];?></p>
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
 
            }
 ?>
    </body>
</html>