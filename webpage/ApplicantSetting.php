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
                
                  if($_SESSION['Profile']==1)
                {
                    include './../Connection/connect.php';
                if($connection==1)
                {
                    $command2="Select * from applicantprofile where Id=".$_SESSION['Id']."";
                    $rs=$con->query($command2);
                    if($data=$rs->fetch_assoc())
                            {
                                $_SESSION['fname']=$data['FirstName'];
                                $_SESSION['lname']=$data['LastName'];
                                $_SESSION['Dob']=$data['Dob'];
                                $_SESSION['email']=$data['Email'];
                                $_SESSION['phone']=$data['Phone'];
                                $_SESSION['leducation']=$data['LastEducation'];
                                $_SESSION['address']=$data['Address'];
                                $_SESSION['about']=$data['About'];
                                $date = date('Y-m-d');
                            }
                }          
                }
                else{
                    header('location: ApplicantEditProfile.php');
                }
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
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard.css">
<link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">

<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <script type="text/javascript">
            function backgch(){
            document.getElementById("Profile").style.backgroundColor="#357ebd";
            document.getElementById("Profile").style.borderLeft="6px solid gray";
            document.getElementById("Profile2").style.color="white";
            document.getElementById("Profile3").style.color="white";
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
            <div class="col-8 content"  style="">
                <div>
                <p style="margin-top: 0px; font-family: Open Sans; font-size: 22px; color: black; display: inline-block; height: 40px; border-bottom: 2px solid #357ebd;">Profile Details</p>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['fname'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Last Name</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['lname'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Date of Birth</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['Dob'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Email</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['email'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Phone</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['phone'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Last Education</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['leducation'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">Address</div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['address'];?></div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">About yourself </div>
                    <div class="DataDiv" style="width: 70%;"><?php echo $_SESSION['about'];?></div>
                </div>
                

            </div>
        </div>

        
         <?php
 include './footer.html';
 
            }
 ?>
    </body>
</html>