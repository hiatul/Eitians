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

<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
    </head>
    <body>
         <?php 
           
            
                include './ApplicantHeader.php';
            

            
            ?>
        <div>
            
             <div  class="bgimg col-12" style="padding-top: 0;">
 <ul class="breadcrumb">
     <li><a href="userdashboard.php">Dashboard</a></li>
  <li>home</li>
 
 
</ul>
        <p style="font-family:global4;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;"><?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
</div>

        </div>     
        
        <div class="col-12" style="">
            <div class="col-3" style="">
                
                <ul class="list1" style="">
                    <li style="background: #357ebd;border-left: 5px solid gray;"><a href="#" style="color: #fff; "> <i class="fa fa-user" style="color: #fff;"></i>  Profile </a></li>
                <li><a href="#" style=""> <i class="fa fa-edit"></i>  Edit Profile</a></li>
                <li><a href="#" style=""> <i class="fa fa-file-o"></i>  Build Resume </a></li>
                <li><a href="#" style=""> <i class="fa fa-file-o"></i>  Saved Resume </a></li>
                <li><a href="#" style=""> <i class="fa  fa-list-ul"></i>  Jobs Applied</a></li>
                <li><a href="#" style=""> <i class="fa  fa-bookmark-o"></i>  Followed Companies </a></li>
            </ul>
            </div>
            <div class="col-8" style="">
                <div>
                <p style="font-family: Open Sans; font-size: 22px; color: black; display: inline-block; height: 40px; border-bottom: 2px solid #357ebd;">Profile Details</p>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                <div class="">
                    <div class="DataDiv" style="border-right: 4px solid #fff;">First Name</div>
                    <div class="DataDiv" style="width: 70%;">Last Name</div>
                </div>
                
                

            </div>
        </div>

        
         <?php
 include './footer.html';
 
            }
 ?>
    </body>
</html>