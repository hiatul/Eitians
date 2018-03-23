<?php
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if($_SESSION['LoginStatus']=='0')
            {
                header('location: home.php');
            }
            else{     
                include './../Connection/connect.php';

                
                    $_SESSION['error']="";
                    $_SESSION['fname']="";
                    $_SESSION['lname']="";
                    $_SESSION['Dob']="";
                    $_SESSION['email']="";
                    $_SESSION['phone']="";
                    $_SESSION['leducation']="";
                    $_SESSION['address']="";
                    $_SESSION['about']="";
                    $date = date('Y-m-d');
                    
                if($_SESSION['Profile']==1)
                {
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
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">


<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <script type="text/javascript">
            function backgch(){
            document.getElementById("EditProfile").style.backgroundColor="#357ebd";
            document.getElementById("EditProfile").style.borderLeft="6px solid gray";
            document.getElementById("EditProfile2").style.color="white";
            document.getElementById("EditProfile3").style.color="white";
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
                <p class="headp">Edit Profile</p>
                </div>
                <form action="" method="POST">
                    <p style="color: red;display: inline-block;">*</p><p style="display: inline-block;">Enter Your details so that the things can go easefully</p>
                    <h4 style="color: red; font-family: global6;"><?php echo @$_SESSION['error'];?></h4>

                    <div class="" style="clear: both;">
                       
                    <div class="col-6 inputpart1" style="">
                        <p class="text">First Name *</p>
                        <input type="text" class="textinput" name="FirstName" value=<?php echo @$_SESSION['fname']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Last Name *</p>
                        <input type="text" class="textinput" name="LastName" value=<?php echo @$_SESSION['lname']; ?>>
                    </div>
                        
                     <div class="col-6 inputpart1" style="">
                        <p class="text">Date of Birth *</p>
                        <input type="date" class="textinput" name="Dob" value=<?php echo @$_SESSION['Dob']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Email *</p>
                        <input type="text" class="textinput" name="Email" value=<?php echo @$_SESSION['email']; ?>>
                    </div>
                        
                     <div class="col-6 inputpart1" style="">
                        <p class="text">Phone *</p>
                        <input type="text" class="textinput" name="Phone" value=<?php echo @$_SESSION['phone']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Last Education *</p>
                        <input type="text" class="textinput" name="LastEducation" value=<?php echo @$_SESSION['leducation']; ?>>
                    </div>    
                    
                     <p class="text">Address *</p>
                        <textarea class="textinput" rows="4" style="padding: 0;" name="Address" ><?php echo @$_SESSION['address']; ?></textarea>
                    
                    <p class="text">About yourself *</p>
                        <textarea class="textinput" rows="4" style="padding: 0;" name="About" ><?php echo @$_SESSION['about']; ?></textarea>
                    </div>
                    
                    
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Submit">Save Details <i class="fa fa-angle-right"></i></button>
                   
                                
                </form>
                

            </div>
        </div>

         <!-- The actual snackbar -->
<div id="snackbar">Some text some message..</div>
<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "ApplicantEditProfile.php";},3000);
     
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantBuildResume.php";},3000);
        }
        
         function ref2(x)
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantDashboard.php";},3000);
        }
         
</script>
        

<!--///////////////////////Form Php Code////////////////////////////////-->
<?php

if(isset($_POST['Submit']))
{
    if($connection==1)
    {
        
        
        $Table="ApplicantProfile";
        $FName=$_POST['FirstName'];
        $LName=$_POST['LastName'];
        $Email=$_POST['Email'];
        $Dob=$_POST['Dob'];
        $Phone=$_POST['Phone'];
        $LastEdu=$_POST['LastEducation'];
        $Addres=$_POST['Address'];
        $About=$_POST['About'];

        $diff = abs(strtotime($date) - strtotime($Dob));
        $years = floor($diff / (365*60*60*24));
        
        if(!ctype_alpha($FName)||empty($FName)){
            $_SESSION['error']="First Name should only contains characters";
            }
        elseif (!ctype_alpha($LName)||empty ($LName)) {
            $_SESSION['error']="Last Name should only contains characters";
            $_SESSION['fname']=$FName;
            }
            elseif (empty ($Dob)) {
            $_SESSION['error']="Invalid Date of Birth";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
        }
        elseif ($years<18) {
            $_SESSION['error']="Age should be more or equal to 18yrs";
            $_SESSION['fname']=$FName;
            $_SESSION['lname']=$LName;
        }
        elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)||empty($Email)){
            $_SESSION['error']="Please enter correct Email address";
            $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
            }
    elseif(preg_match($phoneregex, $Phone)||empty ($Phone)) 
            {
                $_SESSION['error']="Please enter correct Phone number";
                $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
                $_SESSION['email']=$Email;
                
            }
    elseif(!((strlen($Phone)>9)&&(strlen($Phone)<17))) 
            {
                $_SESSION['error']="Please enter correct Phone number";
                $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
                $_SESSION['email']=$Email;
                
            }
            elseif(empty ($LastEdu))
            {
                $_SESSION['error']="Invalid Education Detail";
                $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
                $_SESSION['email']=$Email;
                $_SESSION['phone']=$Phone;
            }
            elseif(empty ($Addres))
            {
             $_SESSION['error']="Address can't be left empty";
                $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
                $_SESSION['email']=$Email;
                $_SESSION['phone']=$Phone;
                $_SESSION['leducation']=$LastEdu;   
            }
            elseif(empty ($About))
            {
                $_SESSION['error']="Please fill about yourself section";
                $_SESSION['fname']=$FName;
                $_SESSION['lname']=$LName;
                $_SESSION['Dob']=$Dob;
                $_SESSION['email']=$Email;
                $_SESSION['phone']=$Phone;
                $_SESSION['leducation']=$LastEdu;
                $_SESSION['address']=$Addres;

            }
        else{
            if($_SESSION['Profile']==0){
                $date = date('Y-m-d H:i:s');
                $command="Insert into applicantprofile(Id,FirstName,LastName,Dob,Email,Phone,LastEducation,Address,About,UpdateDate) values(".$_SESSION['Id'].",'$FName','$LName','$Dob','$Email','$Phone','$LastEdu','$Addres','$About','$date')";
                 if($result=$con->query($command))
                 { 
                    $command2="Update applicant set Profile='1' where Id=".$_SESSION['Id']."" ;
                    if($con->query($command2)===TRUE){
                        $_SESSION['error']="";
                        $_SESSION['Profile']=1;
                        if($_SESSION['Resume']==0)
                        {
//                            header('location: ApplicantBuildResume.php');
                             $_SESSION['error']="Please Complete Your Resume";
                            echo '<script type="text/javascript">','myFunction("Profile Details Uploaded...");','</script>';
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        else{
//                            header('location: ApplicantDashboard.php');
                            echo '<script type="text/javascript">','myFunction("Profile Details Uploaded...");','</script>';
                            echo '<script type="text/javascript">','ref2();','</script>';
                        }
                    }
                    else{
                        
                    }

                 }
                 else {
                     
                 }
            }
            else{
                 $date = date('Y-m-d H:i:s');
                $command="Update applicantprofile set FirstName='$FName',LastName='$LName',Dob='$Dob',Email='$Email',Phone='$Phone',LastEducation='$LastEdu',Address='$Addres',About='$About',UpdateDate='$date' where Id=".$_SESSION['Id']."" ;
            
                 if($con->query($command)===TRUE){
                     $_SESSION['error']="";
                        if($_SESSION['Resume']==0)
                        {
//                            header('location: ApplicantBuildResume.php');
                            echo '<script type="text/javascript">','myFunction("Profile Details Updated...");','</script>';
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        else{
//                            header('location: ApplicantDashboard.php');
                            echo '<script type="text/javascript">','myFunction("Profile Details Updated...");','</script>';
                            echo '<script type="text/javascript">','ref2();','</script>';
                        }
                    }
                    else{
                        
                    }
            }
        }
    }
}
    ?>
<!--///////////////////////////////////////////-->



         <?php
 include './footer.html';
 
            }
 ?>
    </body>
</html>