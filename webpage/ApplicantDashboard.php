<?php
date_default_timezone_set('Asia/Kolkata');
include '../DocConverter/Doc_Converter.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if($_SESSION['LoginStatus']=='0')
            {
                header('location: home.php');
            } 
            else{
                
                   $path1="../ApplicantResume/";
                    $path = "../Applicant_pic/";
                    include './../Connection/connect.php';
                    
                     include './../Connection/connect.php';
                
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
                                $_SESSION['searchable']=$data['Searchable'];
                                $_SESSION['date']=$data['UpdateDate'];
                                $_SESSION['profession']=$data['Profession'];
                                
                                if($_SESSION['searchable']==1){
                                    $SearchTitle="Searchable";
                                }else{$SearchTitle="Not Searchable";}
                                
                                $date = date('Y-m-d');
                            }
                }          
                }
                else{
                   
                }
                    
                    
                    $rc1=$rc2=$rc3=$rc4=$rc5=$rc6=$rc7=0;
                if($connection==1)
                {
                    $Aid=$_SESSION['Id'];
                                          $command="SELECT * FROM applicantprofile WHERE Id=$Aid";
                                          $result=$con->query($command);
                                           $data=$result->fetch_assoc();
                                            $rc1=$result->num_rows;
                                           
                                            $command2="SELECT * FROM applicantSkills WHERE Aid=$Aid";
                                          $result2=$con->query($command2);
                                           $data2=$result2->fetch_assoc();
                                             $rc2=$result2->num_rows;
                                             
                                            $command3="SELECT * FROM applicantSocialLinks WHERE Id=$Aid";
                                          $result3=$con->query($command3);
                                           $data3=$result3->fetch_assoc();
                                            $rc3=$result3->num_rows;
                                            
                                            $command4="SELECT * FROM educationDetail WHERE Aid=$Aid";
                                          $result4=$con->query($command4);
                                           $data4=$result4->fetch_assoc();
                                            $rc4=$result4->num_rows;
                                            
                                              $command5="SELECT * FROM applicantJobExperience WHERE Aid=$Aid";
                                          $result5=$con->query($command5);
                                           $data5=$result5->fetch_assoc();
                                            $rc5=$result5->num_rows;
                                            
                                             $command6="SELECT * FROM applicantJobCategroy WHERE Id=$Aid";
                                          $result6=$con->query($command6);
                                           $data6=$result6->fetch_assoc();
                                            $rc6=$result6->num_rows;
                                            
                                            $command7="SELECT * FROM resume WHERE Aid=$Aid";
                                          $result7=$con->query($command7);
                                           $data7=$result7->fetch_assoc();
                                            $rc7=$result7->num_rows;
                                           
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
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantDashStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/skills.css">
    <link rel="stylesheet" type="text/css" href="../css/seekbar.css">   

 <!--//DatePicker-->
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link href="../css/jquery.dateselect.css" rel="stylesheet" type="text/css">

        <!--///-->
        <style>
            *
            {
                box-sizing: border-box;
            }
        </style>
    
 <!--Google Loation autocomplete-->   
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyCDC1VIuedy_5zdEluB3HNiqESWVkSp9Jk"></script>

 
<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-1.9.1.js"></script>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title></title>
        
        <script type="text/javascript">
           flag=0;
           function backgch(){
            document.getElementById("Profile").style.backgroundColor="#357ebd";
            document.getElementById("Profile").style.borderLeft="6px solid gray";
            document.getElementById("Profile2").style.color="white";
            document.getElementById("Profile3").style.color="white";
        }
            
            function viewmode()
            {
                document.getElementById("bottommenu2").style.display = "none"; 
                document.getElementById('content1').style.display="block";
                document.getElementById('content2').style.display="none";
                flag=0;
                
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');  // XMLHttpRequest object

                // create pairs index=value with data that must be sent to server

                request.open("GET", "viewmode.php", true);			// set the request
               request.onreadystatechange = function() {
                 // if (request.readyState == 4) {
                 // }
                }
                // adds  a header to tell the PHP script to recognize the data as is sent via POST
                              // calls the send() method with datas as parameter
              request.send();	
            }
            
            function editmode()
            {
                document.getElementById("bottommenu").style.display = "none"; 
                document.getElementById('content1').style.display="none";
                document.getElementById('content2').style.display="block";
                flag=1;
               
            }
           
        window.addEventListener("scroll", function(){  
                var st = window.pageYOffset || document.documentElement.scrollTop;
                var elem = document.getElementById('Done');
                //get the distance scrolled on body (by default can be changed)
                var distanceScrolled = document.body.scrollTop;
                //create viewport offset object
                var elemRect = elem.getBoundingClientRect();
                //get the offset from the element to the viewport
                var elemViewportOffset = elemRect.top;
                //add them together
                var totalOffset = distanceScrolled + elemViewportOffset;
                    if(flag==0){
                if (st < totalOffset){
                    document.getElementById("bottommenu").style.display = "block";                    
                    document.getElementById("bottommenu").style.top = "-100%";
                    
                } else {
                   document.getElementById("bottommenu").style.top = "0";
                }
            }
                
             }, false);
         
          
          window.addEventListener("scroll", function(){  
                var st = window.pageYOffset || document.documentElement.scrollTop;
                var elem = document.getElementById('Done2');
                //get the distance scrolled on body (by default can be changed)
                var distanceScrolled = document.body.scrollTop;
                //create viewport offset object
                var elemRect = elem.getBoundingClientRect();
                //get the offset from the element to the viewport
                var elemViewportOffset = elemRect.top;
                //add them together
                var totalOffset = distanceScrolled + elemViewportOffset;
                if(flag==1){
                if (st < totalOffset){
                    document.getElementById("bottommenu2").style.display = "block";                    
                    document.getElementById("bottommenu2").style.top = "-100%";
                } else {
                   document.getElementById("bottommenu2").style.top = "0";
                }
            }
                
             }, false);
        
          
          document.getElementById("file-upload").onchange = function() {
    document.getElementById("form").submit();
};
             
             
    function SeekBarToInput(){
        var x = document.getElementById("Seekbar").value;
        document.getElementById("Experience").value = x;
    }
    
    function InputToSeekbar(){
        var x = document.getElementById("Experience").value;
        document.getElementById("Seekbar").value = x;
    }
             
             
             function fileName()
        {
            var x=document.getElementById("file-upload").value;
            document.getElementById("FileName").innerHTML=x+"<p style=\"margin: 0px; padding: 0px; float: right;background: gainsboro;\">Browse</p>";
        }
   
        
          
        </script>
    </head>
    <body onload="backgch();<?php if(!empty($_SESSION['error'])){  echo 'editmode();';}?>">
        
         <div id="profile_pic_modal" style="margin:0 auto; width:100%; position: absolute; z-index: 99; background: rgba(0,0,0,0.9);float: none; align-content: center;">
<?php echo $image; ?>
        
<!--<div id="thumbs" style=" width:600px"></div>                      -->
</div>
         <?php  include './ApplicantHeader.php';?>
        
        
        <div>
            
             <div  class="bgimg col-12" style="padding-top: 0; " >
 <ul class="breadcrumb">
     <li><a href="userdashboard.php">Dashboard</a></li>
  <li>home</li>
 
 
</ul>
        <p style="font-family:Open Sans;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;"><?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
</div>

        </div>     
        
        <div class="col-12" id="Done2"  style="">

                    <?php 
                        include './ApplicantDashboardMenu.php';
                      ?>

            
            <div class="col-9 content1" id="content1">
<?php
                                                  $count=0;
                                                  if($rc1!==0)
                                                  {  $count++;
                                                      
                                                  }
                                                  if($rc2!==0)
                                                  {  $count++;
                                                      
                                                  }
                                                  if($rc3!==0)
                                                  {  $count++;
                                                      
                                                  }if($rc4!==0)
                                                  {  $count++;
                                                      
                                                  }if($rc5!==0)
                                                  {  $count++;
                                                      
                                                  }if($rc6!==0)
                                                  {  $count++;
                                                      
                                                  }
                                                  if($rc7!==0)
                                                  {  $count++;
                                                  
                                                    if($count==7 && $_SESSION['searchable']==0)
                                                    {
                                                        $_SESSION['FSrearchOff']=1;
                                                    }
                                                  
                                                     if($_SESSION['FSrearchOff']==0){
                                                            
                                                             $command2="Update applicantprofile set Searchable='1' where Id=".$_SESSION['Id']."" ;
                                                                    if($con->query($command2)===TRUE){
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
                                                                                    $_SESSION['searchable']=$data['Searchable'];
                                                                                    $_SESSION['date']=$data['UpdateDate'];

                                                                                    if($_SESSION['searchable']==1){
                                                                                        $SearchTitle="Searchable";
                                                                                    }else{$SearchTitle="Not Searchable";}
                                                                                    
                                                                                    

                                                                                    $date = date('Y-m-d');
                                                                                }
                                                                    }
                                                            }           
                                                      $_SESSION['ProfilePercentage']=100;
                                                  }
                                                  else{
                                                      $_SESSION['ProfilePercentage']=0;
                                                      if($_SESSION['FSrearchOff']==0){
                                                                  $command2="Update applicantprofile set Searchable='0' where Id=".$_SESSION['Id']."" ;
                                                                    if($con->query($command2)===TRUE){
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
                                                                                    $_SESSION['searchable']=$data['Searchable'];
                                                                                    $_SESSION['date']=$data['UpdateDate'];

                                                                                    if($_SESSION['searchable']==1){
                                                                                        $SearchTitle="Searchable";
                                                                                    }else{$SearchTitle="Not Searchable";}

                                                                                    $date = date('Y-m-d');
                                                                                }
                                                                    }
                                                                }
                                                      
                                                      
                                                      
                                                      $_SESSION['PassErr']="Please Upload Your Resume Else You Will Not be Searchable By Recruiter";
                                                  }
                                                    $_SESSION['ResumeUploadCount']=$rc7;
                                                  if(($rc1==0)||($rc2==0)||($rc3==0)||($rc4==0)||($rc5==0)||($rc6==0)||($rc7==0))
                                                        {         $k=($count/7)*100;
                                                                  settype($k, "integer");
                                                                  
                                                                
                                                                 
                       
                                                                  
                                           ?>
                                                                        <div class="col-12" style="background: #f1f1f1;height: auto;padding: 10px;margin: 0px;margin-bottom: 5px;">
                                                                                            <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: red;margin-bottom: 5px;"><?php echo @$_SESSION['PassErr'];?></p>
                                                                                            <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;margin-bottom: 5px;">Your profile is <?php echo $k;?>% complete. Complete your profile to get noticed by Employers.</p>
                                                                                           <div class="col-12" style="background: lightgray;height: 25px;margin:0px;padding: 0px;margin-bottom: 5px;">
                                                                                                                    <div style="width:<?php echo $k."%"?>;background: #357ebd;height: 25px;margin:0px;padding: 0px;">
                                                                                                                    </div>
                                                                                            </div>
                                                                        </div>  
                                                                      
                        
                                        <?php
                                                        }
                                                        else
                                                        {
                                                            
                                                            
                                                            
                                                                                    $Note="";
                                                                                    if($_SESSION['FSrearchOff']==1)
                                                                                    {
                                                                                        $Note=" But Not Searchable";
                                                                                    }
                                                         
                                                            
                                                            
                                        ?>
                                                                            <div class="col-12" style="background: #f1f1f1;height: auto;padding: 10px;margin: 0px;">
                                                                                <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Your profile is 100% complete.<?php echo $Note;?></p>
                                                                                  <div class="col-12" style="background: lightgray;height: 25px;margin:0px;padding: 0px;margin-bottom: 5px;">
                                                                                                                    <div style="width:100%;background: #cbed9a;height: 25px;margin:0px;padding: 0px;">
                                                                                                                    </div>
                                                                                            </div>
                                                                          </div>  
                                         <?php
                                                        }
                                                        
                                        ?>
                                       

                                        <div class="col-12" style="margin: 0px;margin-top: 10px;height: auto; padding: 0px;">
                                                                      <div class="col-12" style="padding: 0px;margin: 0px;height: auto;border-bottom: 1px solid lightgray;">
                                                                      <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                            <div class="col-12 bb" >
                                                                                                                          <?php
                                                                                                                                                
                                                                                                                                                if($data['Searchable']==0)
                                                                                                                                                {
                                                                                                                                ?>
                                                                                                                        <div class="col-9 abd" >  
                                                                                                                                    <p  class="ssq"style="font-size: 20px;color: gray;"><?php  echo "Not Searchable  (Last Edited:".$data['UpdateDate'].")"; ?></p>
                                                                                                                         </div>
                                                                                                                            <?php
                                                                                                                                           }
                                                                                                                                           else
                                                                                                                                           {
                                                                                                                            ?>
                                                                                                                           <div class="col-9 abd" >  
                                                                                                                                    <p  class="ssq"style="font-size: 20px;color: gray;"><?php  echo "Searchable  (Last Edited:".$data['UpdateDate'].")"; ?></p>
                                                                                                                         </div>
                                                                                                                              <?php
                                                                                                                                           }
                                                                                                                                      ?>
                                                                                                
                                                                                                
                                                                                                
                                                                                                                        <div class="col-3 bb" style="float: right;">
                                                                                                                                                   
                                                                                                                            <button class="col-10 submitbtn" id="Done" style="margin: 0px;height: 45px;" onclick="editmode()" value="Submit" name="EditProfile">Edit Profile <i class="fa fa-angle-right"></i></button>
                                                                                                                                                   
                                                                                                                        </div>


                                                                                            </div>
                                                                       <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                           <div class="col-4" style="height: 200px;">
                                                                                               <div style="margin: 0px;padding: 0px;height: 180px;width: 180px;float: none;margin: auto;">
                                                                                                                        <img src='<?php echo $data['AImage']; ?>' style="height: 90%; width: 90%;border-bottom-left-radius:2%;">
                                        
                                                                                                                    <div  title="Update Profile Picture"class="fu" style="background: white;height: 30px;width: 30px;position: relative;float: right;margin-right:12px;margin-top:-20px;border-radius:10%;">
                                                                                                                        <form id="cropimage" enctype="multipart/form-data" method="post">
                                                                                                                            <label for="upload" class="" style="background: white;margin-left: 5px;margin-top: 45px;">
                                                                                                                                <img class="cursor" src="../icons/picture.svg" height="20" width="20">
                                                                                                                            </label>
                                                                                                                        <input id="upload" class="fu__input cursor" name="photoimg" type="file"  onchange="javascript:this.form.submit();">                                       
                                                                                                                        </form>
                                                                                                                     </div>
                                                                                               </div>
                                                                                               
                                                                                            </div>
                                                                      <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                          <div class="col-8" style="height: auto;padding: 0px;padding-left: 5px;padding-bottom: 10px;">
                                                                                                                        <div class="" style="">
                                                                                                                                   <p  class="ssq" style="font-size: 25px;"><?php  echo $data['FirstName']." ".$data['LastName']; ?></p>
                                                                                                                        </div>
                                                                                                                        <div style="">
                                                                                                                                  <p class="ssq"><i class="fa fa-envelope"></i> <?php  echo $data['Email']; ?> </p>
                                                                                                                        </div>
                                                                                                                         <?php
                                                                                                                                 if($data['Phone']==NULL)
                                                                                                                                 {
                                                                                                                         ?>
                                                                                                                                    <div style="">
                                                                                                                                        <p  class="ssq"><i class="fa fa-phone" ></i> <a href="" style="color: #357ebd;">Add Phone Number</a></p>
                                                                                                                                   </div>
                                                                                                                          <?php
                                                                                                                                 }
                                                                                                                                else
                                                                                                                                 {
                                                                                                                         ?>
                                                                                              
                                                                                              
                                                                                                                        <div style="">
                                                                                                                                    <p  class="ssq"><i class="fa fa-phone" ></i> <?php  echo $data['Phone']; ?></p>
                                                                                                                        </div>
                                                                                                                         <?php
                                                                                                                                 }
                                                                                                                                 if($data['Address']==NULL)
                                                                                                                                 {
                                                                                                                         ?>
                                                                                                                           <div style="">
                                                                                                                                   <p class="ssq"><i class="fa fa-location-arrow" ></i><a href="" style="color: #357ebd;"> Add Address</a></p>
                                                                                                                        </div>
                                                                                                                        <?php
                                                                                                                                 }
                                                                                                                                else
                                                                                                                                 {
                                                                                                                         ?>
                                                                                                                        <div style="">
                                                                                                                                   <p class="ssq"><i class="fa fa-location-arrow" ></i>  <?php  echo $data['Address']; ?></p>
                                                                                                                        </div>
                                                                                                                            <?php
                                                                                                                                 }
                                                                                                                                
                                                                                                                         ?>
                                                                                                                        <?php
                                                                                                                                
                                                                                                                                 if($data['Profession']==NULL)
                                                                                                                                 {
                                                                                                                         ?>
                                                                                                                           <div style="">
                                                                                                                                   <p class="ssq"><i class="fa fa fa-briefcase" ></i><a href="" style="color: #357ebd;"> Add Profession</a></p>
                                                                                                                        </div>
                                                                                                                        <?php
                                                                                                                                 }
                                                                                                                                else
                                                                                                                                 {
                                                                                                                         ?>
                                                                                                                        <div style="">
                                                                                                                                   <p class="ssq"><i class="fa fa-briefcase" ></i>  <?php  echo $data['Profession']; ?></p>
                                                                                                                        </div>
                                                                                                                            <?php
                                                                                                                                 }
                                                                                                                                
                                                                                                                         ?>
                                                                                                                          
                                                                                                                        <div class="col-12 bb"style="margin-top: 5px;">
                                                                                                                           

                                                                                                                                 <p class="ssq" style="float: left;">Searchable</p>
                                                                                                                                 <form action="ApplicantDashboard_1.php" method="POST">
                                                                                                                                                <label class="switch" style="float:left;margin-left: 20px;">
                                                                                                                                                    <input type="checkbox" name="Searchable" value="1" autocomplete="off" disabled <?php if(@$_SESSION['searchable']){ echo 'checked';}?>>
                                                                                                                                                    <div class="slider round"></div>
                                                                                                                                                  </label>
                                                                                                                                   </form>
                                                                                                                                   
                                                                                                                         </div>

                                                                                          </div>
                                                                      
                                                                                          <div class="col-12" style="margin: 0px;padding: 0px;">
                                                                                                        <p  class="headp"style="height: 30px;font-family: global6;font-size: 18px;margin: 0px;padding: 0px;">About Me</p>          
                                                                                                        <?php
                                                                                                     if($data['About']==NULL)
                                                                                                    {
                                                                                                    ?>
                                                                                                         <div class="col-12 bb" style="margin-top: 10px;background: #f1f1f1;padding: 10px;">
                                                                                                                <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Add About Yourself.</p>
                                                                                                        </div>
                                                                                                        <?php
                                                                                                    }
                                                                                                     else
                                                                                                    {
                                                                                                    ?>
                                                                      
                                                                                                        
                                                                                                         <p  class="ssq"style="text-align: justify;font-family: global6;font-size: 14px;margin: 0px;margin-top: 10px;margin-bottom: 10px;"><?php  echo $data['About']; ?></p>          
                                                                                                     <?php
                                                                                                    }
                                                                                                    
                                                                                                    ?>
                                                                                      </div>
                                                                        
                                                                      <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                        </div>

                                                                        <div class="col-12" style="height: auto;padding: 0px;margin: 0px;margin-top: 20px; padding-bottom: 20px;border-bottom: solid 1px lightgray;">
                                                                                          <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                         <div class="col-12 bb">
                                                                                                        <div class="col-6 bb">
                                                                                                                        <div style="width: 7%;float: left;padding: 0px;height: 30px;">
                                                                                                                                    <i class="fa fa-twitter" style=""></i>
                                                                                                                          </div>
                                                                                                                        <?php
                                                                                                                            if($data3['Twitter']==NULL)
                                                                                                                            {
                                                                                                                        ?>
                                                                                                            
                                                                                                            
                                                                                                                          <div class="icc"style="">
                                                                                                                              <p class="ssq" style="margin-top: 5px;"><a onclick="editmode()" style="color: #357ebd;"> Add Twitter</a></p>
                                                                                                                          </div>
                                                                                                            
                                                                                                                        <?php
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['Twitter']; ?></p>
                                                                                                                          </div>
                                                                                                                        <?php
                                                                                                                            }
                                                                                                                        ?>
                                                                                                        </div>
                                                                                                       <div class="col-6 bb" >
                                                                                                                        <div style="width: 7%;float: left;padding: 0px;height: 30px;">
                                                                                                                                    <i class="fa fa-google-plus" style=""></i>
                                                                                                                          </div>
                                                                                                                         <?php
                                                                                                                              if($data3['GooglePlus']==NULL)
                                                                                                                            {
                                                                                                                         ?>
                                                                                                                         <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><a onclick="editmode()" style="color: #357ebd;"> Add Google Plus</a></p>
                                                                                                                          </div>
                                                                                                                        <?php
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['GooglePlus']; ?></p>
                                                                                                                          </div>
                                                                                                                           <?php
                                                                                                                            }
                                                                                                                        ?>
                                                                                                        </div>
                                                                                            </div>
                                                                                          <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                              <div class="col-12 bb" >
                                                                                                         <div class="col-6 bb" >
                                                                                                        <div style="width: 7%;float: left;padding: 0px;height: 30px;">
                                                                                                                    <i class="fa fa-facebook" style=""></i>
                                                                                                          </div>
                                                                                                             <?php
                                                                                                                              if($data3['Facebook']==NULL)
                                                                                                                            {
                                                                                                                         ?>
                                                                                                                         <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><a onclick="editmode()" style="color: #357ebd;"> Add Facebook</a></p>
                                                                                                                          </div>
                                                                                                                        <?php
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['Facebook']; ?></p>
                                                                                                                          </div>
                                                                                                                           <?php
                                                                                                                            }
                                                                                                                        ?>
                                                                                                        </div>
                                                                                                       <div class="col-6 bb ">
                                                                                                        <div style="width: 7%;float: left;padding: 0px;height: 30px;">
                                                                                                                    <i class="fa fa-linkedin" style=""></i>
                                                                                                          </div>
                                                                                                            <?php
                                                                                                                              if($data3['LinkedIn']==NULL)
                                                                                                                            {
                                                                                                                         ?>
                                                                                                                         <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><a onclick="editmode()" style="color: #357ebd;"> Add LinkedIn</a></p>
                                                                                                                          </div>
                                                                                                                        <?php
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['LinkedIn']; ?></p>
                                                                                                                          </div>
                                                                                                                           <?php
                                                                                                                            }
                                                                                                                        ?>
                                                                                                        </div>
                                                                                              </div> 
                                                                                          <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->

                                                                      </div>
                                         </div>

                                                                  <div class="col-12 bb" style="padding-left: 5px; padding-bottom: 20px;padding-top: 10px;">
                                                                      <div class="col-12 bb">
                                                                               <div class="col-9 bb" style="">
                                                                                   <p  class="headp"style="font-family: global6;font-size: 25px;margin: 0px;">Job Preferences</p>          
                                                                                  </div>
                                                                                <div class="col-3 bb" style="float: right;margin-bottom: 5px;margin-top: 10px;">
                                                                                                      
                                                                                    <button class="col-10 submitbtn" style="margin: 0px;height: 45px;" onclick="editmode()" value="Submit" name="EditResume">Edit Resume <i class="fa fa-angle-right"></i></button>
                                                                                                      
                                                                                  </div>
                                                                      </div> 
                                                                                           <?php
                                                                                           if($data6==NULL)
                                                                                           {
                                                                                           ?>
                                                                                              <div class="col-12 bb" style="margin-top: 10px;background: #f1f1f1;padding: 10px;">
                                                                                                      <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Add Preferred Job or Job Location,Relocation,Expected Salary.</p>
                                                                                             </div>
                                                                                          <?php
                                                                                           }
                                                                                          else {
                                                                                          ?>
                                                                                          
                                                                      <div class="col-12 bb" style="border-bottom: solid 1px lightgray;padding-bottom: 20px;">
                                                                                  
                                                                                    <div class="col-12 bb" style="margin-top: 10px;">
                                                                                         
                                                                                                  <div class="col-3 aaa "style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Desired Job:</p>
                                                                                                  </div>
                                                                                                 <div class="col-9 aaa"style="">
                                                                                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data6['JobCategory'].""; ?></p>
                                                                                                  </div>
                                                                                        </div>
                                                                                     <div class="col-12 bb" style="margin-top: 10px;">
                                                                                         
                                                                                                  <div class="col-3 aaa "style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Relocate:</p>
                                                                                                  </div>
                                                                                                 <div class="col-9 aaa"style="">
                                                                                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data6['Relocate'].""; ?></p>
                                                                                                  </div>
                                                                                        </div>

                                                                                      <div class="col-12 bb" style="margin-top: 10px;">
                                                                                                  <div class="col-3 aaa"style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Preferred Location:</p>
                                                                                                  </div>
                                                                                                 <div class="col-9 aaa"style="">
                                                                                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data6['PrefLocation'].""; ?></p>
                                                                                                  </div>
                                                                                        </div>



                                                                                       <div class="col-12 bb" style="margin-top: 10px;">
                                                                                                  <div class="col-3 aaa"style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Experience:</p>
                                                                                                  </div>
                                                                                                 <div class="col-9 aaa"style="">
                                                                                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data6['Experience'].""; ?></p>
                                                                                                  </div>
                                                                                        </div>

                                                                                       <div class="col-12 bb" style="margin-top: 10px;">
                                                                                                  <div class="col-3 aaa"style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Expected Salary:</p>
                                                                                                  </div>
                                                                                                 <div class="col-9 aaa"style="">
                                                                                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data6['ExpSalary'].""; ?></p>
                                                                                                  </div>
                                                                                        </div>

                                                                                       <div class="col-12 bb" style="margin-top: 10px;">
                                                                                                  <div class="col-3 aaa"style="">
                                                                                                              <p class="ssq" style="margin-top: 5px;">Resume:</p>
                                                                                                  </div>

                                                                                                 <div class="col-5 aaa"style="">
                                                                                                     <p class="ssq" style="margin-top: 5px;"><a href="<?php  echo $path1."".$data7['Path'].""; ?> " style="color: #357ebd;">Download</a></p>
                                                                                                  </div>
                                                                                                 
                                                                                        </div>
                                                                                        <?php
                                                                                          }
                                                                                        ?>
                                                                                  </div>
                                                                                        <div class="col-12" style=" height:auto;padding: 0px;margin: 0x;margin-top: 10px;border-bottom: 1px solid lightgray; margin-top: 20px; padding-bottom: 20px; ">
                                                                                                 <div style="padding-bottom: 5px;">
                                                                                                     <p class="headp"style="font-family: global6;font-size: 25px;margin: 0px;"> Skills</p>
                                                                                                </div>
                                                                                                      <?php
                                                                                           if($data2==NULL)
                                                                                           {
                                                                                           ?>
                                                                                              <div class="col-12 bb" style="margin-top: 10px;background: #f1f1f1;padding: 10px;">
                                                                                                      <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Add Your Top Skills.</p>
                                                                                             </div>
                                                                                          <?php
                                                                                           }
                                                                                           else
                                                                                           {    $command2="SELECT * FROM applicantSkills WHERE Aid=$Aid";
                                                                                                $result2=$con->query($command2);
//                                                                                                 $data2=$result2->fetch_assoc();
//                                                                                                   $rc2=$result2->num_rows;
                                                                                             ?>
                                                                                            
                                                                                            <div class="col-12 bb" style="">
                                                                                                            <div  class="aaa"style=" width:35%;">
                                                                                                                        <p class="ssq" style="margin-top: 5px;">Top Skills</p>
                                                                                                            </div>
                                                                                                     <div  class="aaa"style="width: 65%;height: auto;">
                                                                                                                       <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;">Experience | Last Used</p>
                                                                                                            </div>
                                                                                                 </div>
                                                                                           
                                                                                               <?php
                                                                                                   while($data2=$result2->fetch_assoc())
                                                                                                   {
                                                                                               ?>
                                                                                            
                                                                                                   
                                                                                               <div class="col-12 bb" style="margin-bottom: 10px;">
                                                                                                    <div  class="aaa"style=" width:35%;">
                                                                                                                        <p class="ssq" style="margin-top: 5px;"><?php  echo $data2['Skills'].""; ?></p>
                                                                                                            </div>
                                                                                                            <div class="aaa"style="width: 65%;height: auto;">
                                                                                                                       <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;"><?php  echo $data2['ExpYear']." Years  | ".$data2['LastUsed']."  "; ?></p>
                                                                                                            </div>
                                                                                                              <?php $c=$data2['ExpYear']; 
                                                                                                                   $c=($c/15)*100;
                                                                                                              ?>
                                                                                                    <div class="col-12" style="background: lightgray;height: 20px;margin:0px;padding: 0px;">
                                                                                                                    <div style="width:<?php echo $c."%"?>;background: #357ebd;height: 20px;margin:0px;padding: 0px;">
                                                                                                                    </div>
                                                                                                    </div>


                                                                                             </div>
                                                                                                    <?php
                                                                                           }  }
                                                                                                    ?>

                                                                                            <div class="col-3" style=" padding: 0px;margin: 0px;margin-bottom: 20px;margin-top: 10px;">
                                                                                                
                                                                                                     <button class="col-10 submitbtn" style="margin: 0px;float: left;height: 45px;" onclick="editmode()" value="Submit" name="AddSkill">Add Skills <i class="fa fa-angle-right"></i></button>
                                                                                                
                                                                                            </div>


                                                                                        </div>

                                                                                         <div class="col-12" style="height:auto;padding: 0px;margin: 0x;margin-top: 10px;border-bottom: 1px solid lightgray;margin-top: 20px; padding-bottom: 20px;">
                                                                                                 <div style="margin-bottom: 10px;">
                                                                                                     <p class="headp"style="font-family: global6;font-size: 25px;margin: 0px;"> Work Experience</p>
                                                                                                </div>
                                                                                                        <?php
                                                                                           if($data5==NULL)
                                                                                           {
                                                                                           ?>
                                                                                              <div class="col-12 bb" style="margin-top: 10px;background: #f1f1f1;padding: 10px;">
                                                                                                      <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Add Work Experience.</p>
                                                                                             </div>
                                                                                          <?php
                                                                                           }
                                                                                          else {     $command5="SELECT * FROM applicantJobExperience WHERE Aid=$Aid";
                                                                                                        $result5=$con->query($command5);
                                                                                                        while($data5=$result5->fetch_assoc())
                                                                                                        {
                                                                                          ?>
                                                                                             
                                                                                                 <div class="col-12 bb" style="margin-bottom: 10px;">
                                                                                                           <div class="col-12" style=" float: left;padding: 0px;height:auto;">
                                                                                                               <p class="ssq " style="font-size: 16px;margin-top: 5px;"><b><?php  echo $data5['Position'].", ".$data5['Company']; ?></b></p>
                                                                                                            </div>
                                                                                                         
                                                                                                            <div class="col-12"style="float: left;padding: 0px;height: auto;margin: 0px;padding: 0px;">
                                                                                                                       <p class="ssq" style="font-size:13px;margin-top: 5px;"><?php  echo $data5['StartDate']." to ".$data5['EndDate']; ?></p>
                                                                                                            </div>
                                                                                                              <div class="col-12"style="float: left;padding: 0px;height: auto;margin: 0px;padding: 0px;">
                                                                                                                       <p class="ssq" style="font-size:15px;margin-top: 5px;"><?php  echo $data5['Description'].""; ?></p>
                                                                                                            </div>
                                                                                                 </div>
                                                                                             <?php
                                                                                                          }}
                                                                                          ?>

                                                                                                <div class="col-3" style="padding: 0px;margin: 0px;margin-bottom: 20px;margin-top: 10px;">
                                                                                                
                                                                                                     <button class="col-10 submitbtn" style="margin: 0px;float: left;height: 45px;" onclick="editmode()" value="Submit" name="AddExperience">Add Work Experience  <i class="fa fa-angle-right"></i></button>
                                                                                                
                                                                                            </div>

                                                                                           </div>

                                                                                         <div class="col-12" style="height:auto;padding: 0px;margin: 0x;margin-top: 10px;margin-top: 20px; padding-bottom: 20px;">
                                                                                                 <div style="margin-bottom: 10px;">
                                                                                                     <p class="headp" style="font-family: global6;font-size: 25px;margin: 0px;"> Education</p>
                                                                                                </div>
                                                                                                     <?php
                                                                                                        if($data4==NULL)
                                                                                                        {
                                                                                                        ?>
                                                                                                           <div class="col-12 bb" style="margin-top: 10px;background: #f1f1f1;padding: 10px;">
                                                                                                                   <p style="font-family: global6; padding: 0px;margin:0px;font-size: 18px;color: gray;">Add Education Details.</p>
                                                                                                          </div>
                                                                                                       <?php
                                                                                                        }
                                                                                                       else {     $command4="SELECT * FROM educationDetail WHERE Aid=$Aid";
                                                                                                                    $result4=$con->query($command4);
                                                                                                                     while( $data4=$result4->fetch_assoc())
                                                                                                                     {
                                                                                                       ?>
                                                                                                 <div class="col-12" style="height:auto;padding: 0px;margin: 0x; margin-bottom: 10px;">
                                                                                                           <div class="col-12 bb" style=" ">
                                                                                                               <p class="ssq" style="font-size: 16px;margin-top: 5px;"><b><?php  echo $data4['DegreeTitle']." , ".$data4['Institution']; ?></b></p>
                                                                                                            </div>
                                                                                                         
                                                                                                           <div class="col-12 bb"style="">
                                                                                                                       <p class="ssq" style="font-size:13px;margin-top: 5px;"><?php  echo $data4['StartDate']." to ".$data4['EndDate']; ?></p>
                                                                                                            </div>
                                                                                                            <div class="col-12 bb"style="">
                                                                                                                       <p class="ssq" style="font-size:15px;margin-top: 5px;"><?php  echo $data4['Description'].""; ?></p>
                                                                                                            </div>
                                                                                                 </div>
                                                                                                    <?php
                                                                                                       }}
                                                                                                    ?>

                                                                                                <div class="col-3" style="padding: 0px;margin: 0px;margin-bottom: 20px;margin-top: 10px;">
                                                                                                
                                                                                                     <button class="col-10 submitbtn" style="margin: 0px;float: left;height: 45px;" onclick="editmode()" value="Submit" name="AddEducation">Add Education <i class="fa fa-angle-right"></i></button>
                                                                                                
                                                                                               </div>

                                                                                           </div>





                                                                   </div>
</div>
            
            


            <div class="col-9 content2" id="content2" style="display: none;">
            <div class="EditProfie">              
                <form action="" method="POST">
                    <div>
                       <p class="headp">Edit Profile</p>
                       <button class="col-3 submitbtn" type="submit" value="Submit" name="ProfileDone">Done <i class="fa fa-angle-right"></i></button>

                    </div>
                      
                           <p style="color: red;display: inline-block;">*</p><p style="display: inline-block;">Enter Your details so that the things can go easefully</p>
                           <h4 style="color: red; font-family: global6;"><?php echo @$_SESSION['error'];?></h4>

                           <div class="" style="clear: both;">

                           <div class="col-6 inputpart1" style="">
                               <div class="styled-input" style="">
                                   <input type="text" name="FirstName" value='<?php echo $_SESSION['FirstName']; ?>' disabled/>

                               <span></span> </div>
                           </div>

                           <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                                   <input type="text"  name="LastName" value='<?php echo $_SESSION['LastName']; ?>' disabled/>

                               <span></span> </div>
                           </div>

                            <div class="col-6 inputpart1" style="">
                                <div class="input-group styled-input">                             
                                    <input type="text" name="Dob" id="date1" value='<?php echo @$_SESSION['Dob']; ?>' class="form-control" data-select="date" placeholder="Date of Birth" style="width: 80%;" required>
                                    <button class="btn btn-primary" type="button" data-toggle="select" style="float: right; margin-top: 12px; background: none; border: none;"><i  class="fa fa-calendar"></i></button>
                                    </div>
                            </div>

                           <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                                   <input type="text"  name="Email" value='<?php echo $_SESSION['Email']; ?>' disabled/> 

                               <span></span> </div>
                           </div>

                            <div class="col-6 inputpart1" style="">
                               <div class="styled-input">
                               <input type="text"  name="Phone" value='<?php echo @$_SESSION['phone']; ?>' required/>
                               <label>Phone</label>
                               <span></span> </div>
                            </div>

                           <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                               <input type="text"  name="LastEducation" value='<?php echo @$_SESSION['leducation']; ?>' required/>
                               <label>Last Education</label>
                               <span></span> </div>
                           </div>
                            
                              
                               <div class="col-6 inputpart1" style="clear: both; display: inline-block;">
                                    <?php
                               
                               $TitleAtb="Incomplete Profile";
//                               $_SESSION['error']=$_SESSION['ProfilePercentage'];
                               if($_SESSION['ProfilePercentage']==100)
                               {
                                   $TitleAtb="Click to change";
                               }
                               ?>
                                   <p class="ssq" style="float: left;">Searchable<?php echo "(".$TitleAtb.")";?></p>
                                              <label class="switch" style="float:left;margin-left: 20px;">
                                                  <input type="checkbox" name="Searchable" <?php if($_SESSION['ProfilePercentage']<100){ echo 'disabled';}?> autocomplete="off" <?php if(@$_SESSION['searchable']){ echo 'checked';}?>>
                                                  <div class="slider round" title="<?php echo $TitleAtb;?>"></div>
                                                </label>
                               </div>
                                   
                            <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                               <input type="text"  name="Profession" value='<?php echo @$_SESSION['profession']; ?>' required/>
                               <label>Profession</label>
                               <span></span> </div>
                           </div>
                               
                           <div style="clear: both;" >   
                           <div class="styled-input wide">
                               <textarea name="Address" rows="3" required><?php echo @$_SESSION['address']; ?></textarea>
                           <label>Address</label>
                           <span></span> </div> 
                           </div>

                           <div style="clear: both;">
                           <div class="styled-input wide">
                               <textarea name="About" rows="3" required><?php echo @$_SESSION['about']; ?></textarea>
                           <label>About yourself</label>
                           <span></span> </div>     
                           </div>

                           </div>                   

                </form>
                
                
                 </div>
                
              
                
                
                
                
                
                
                
                
                
    <div class="Resume" style="background: #f1f1f1;" class="col-12" style="padding: 0;">
        
    <!--/////////Job Preference//--> 
    
   
    <div style="clear: both;overflow: hidden; padding-right: 0px;">
        <form action="" method="GET">
                    <div>
                       <p class="headp">Job Preferences</p>
                       <button class="col-3 submitbtn" id="Done" type="submit" value="Submit" name="JobPreference">Done <i class="fa fa-angle-right"></i></button>

                    </div>
                           <div class="" style="clear: both;">

                            <div class="col-6 inputpart1" style="">
                               <div class="styled-input">
                               <input type="text"  name="DesiredJob" value='<?php echo @$data6['JobCategory']; ?>' required/>
                               <label>Desired Job</label>
                               <span></span> </div>
                            </div>

                           <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                                   <input type="text" name="PrefLocation" id="autocomplete" value='<?php echo @$data6['PrefLocation']; ?>' placeholder="" required/>    
                               <label>Preferred Location</label>
                               <span></span> </div>
                           </div>
                            
                               <div class="col-6 inputpart1" style="">
                                   <p class="ssq" style="float: left;">Relocation</p>
                                              <label class="switch" style="float:left;margin-left: 20px;">
                                                  <input type="checkbox" name="Relocation" autocomplete="off" <?php if($data6['Relocate']=='Yes'){ echo 'checked';}?>>
                                                  <div class="slider round"></div>
                                                </label>
                               </div>
                              
                             <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                                   <input type="number"  name="HourlyRate" value='<?php echo @$data6['HourlyRate']; ?>' required/>
                               <label>Hourly Rates ($/hr)</label>
                               <span></span> </div>
                             </div>
                               
                             <div class="col-6 inputpart1" style="">
                               <div class="styled-input">
                                   <input type="number"  name="Exp" value='<?php echo @$data6['Experience']; ?>' required/>
                               <label>Experience</label>
                               <span></span> </div>
                            </div>

                           <div class="col-6 inputpart2" style="">
                               <div class="styled-input">
                                   <input type="number"  name="ExptSal" value='<?php echo @$data6['ExpSalary']; ?>' required/>
                               <label>Expected Salary ($)</label>
                               <span></span> </div>
                           </div>  

                           </div>                   

                </form>
        
          
        
        </div>
     
                <div style="overflow: hidden; margin-top: 20px; background: white;">
                    <form action="" method="POST" enctype="multipart/form-data"> 

                        <div class="" style="width: 100%; border: 1px solid gainsboro;">
                            <label for="file-upload" class="" id="FileName" style="display: inline; padding-left: 5px;">
                                Upload Resume
                                <p style="margin: 0px; padding: 0px; float: right;background: gainsboro;">Browse</p>
                            </label>
                                <input id="file-upload" onchange="fileName();javascript:this.form.submit();" style="display: none;" type="file" name="Resume">
                        </div> 
                   
                    </form>
                </div>
    </div>
            
         
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
           <div class="Resume"> 
     <!--////////////-->       
     <!--////Skills Add-->
                <div class="" style="clear: both; overflow: hidden; padding-right: 0px;">
                    
                     <div>
                       <p class="headp">Skills</p>
                       <!--<button class="col-3 submitbtn" id="Done" type="button" name="ResumeDone">Done <i class="fa fa-angle-right"></i></button>-->
                    </div>
                    
                   <!--//fetch skills--> 
                      <?php
                      $command2="SELECT * FROM applicantSkills WHERE Aid=".$_SESSION['Id']."";
                        $result2=$con->query($command2);
                        
                        while($data2=$result2->fetch_assoc())
                        {
                    ?>


                    <div style=" width: 100%; overflow: hidden; margin-bottom: 20px;">
                     <div class="col-11 bb" style="">
                         <div  class="aaa"style=" width:30%;">
                                             <p class="ssq" style="margin-top: 5px;"><?php  echo $data2['Skills'].""; ?></p>
                          </div>
                          <div class="aaa"style="width: 35%;height: auto;">
                                            <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;">Yrs of Exp :<?php  echo $data2['ExpYear'].""; ?></p>
                          </div>
                         
                        <div class="aaa"style="width: 35%;height: auto;">
                                            <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;">Last Used :<?php  echo $data2['LastUsed'].""; ?></p>
                        </div> 
                                   <?php $c=$data2['ExpYear'];
                                        $c=($c/15)*100;
                                   ?>
                    </div> 
                        <div class="col-1" style="overflow: hidden; float: left; text-align:center;">
                            
                            <form method="GET" action="">
                                <input type="hidden" name="DeleteId" value="<?php  echo $data2['Id'];?>">
                                <button type="submit" name="DeleteSkill" title="Delete" style=" background: none; border: none; float: none; margin: auto; padding: 0px;" ><img src="../icons/minus.svg" height="15" width="15"></button>
                            </form>
                        </div>
                         <div class="col-12" style="background: lightgray;height: 20px;margin:0px;padding: 0px;">
                                         <div style="width:<?php echo $c."%"?>;background: #357ebd;height: 20px;margin:0px;padding: 0px;">
                                         </div>
                         </div>


                      
                    </div>    
                         <?php
                     }
                         ?>
                    <!--/////////fetch finish/-->
                    
                        <form action="" method="GET" id="Skill" name="Skill">
                        <div class="" style=" width: 100%; float: left; padding: 1px; height: auto; overflow: hidden;">  
                        
                            
                            <div class="col-6" style="padding-top: 0px;">
                                    <P class="Title">Top Skill</P>    
                                <div class="styled-input" style="float: left; padding: 0px;">
                                <input type="text"  name="SkillTitle" value="<?php echo @$_SESSION['Skill'];?>" required/>
                                <label>Skill</label>
                                <span></span> </div>
                                </div>    

                            
                            <div class="col-3" style="padding-top: 0px;">
                                    <P class="Title">Experience</P>
                                <div class="styled-input" style="float: left;">
                                    <input type="number" id="Experience" onchange="InputToSeekbar()" max="15" min="1" name="SkillExp"  required/>
                                <label>Yrs</label>
                                <span></span> </div>
                                </div> 
                        
                            
                                <div class="col-3" style="padding-top: 0px;">
                                    <P class="Title">Last Used</P>
                                    <select name="SkillLastUsed" style="float: left; border: 1px solid gainsboro; height: 50px; width: 100%;">
                                                <?php 
                                                $x=date("Y");
                                                echo "<option value='$x'>Current</option>" ; 
                                         
                                                for($i=date("Y")-1;$i> date("Y")-50;$i--)
                                                {
                                                echo "<option value='$i'>$i</option>" ; 
                                                }
                                                ?>
                                                                          
                                    </select>
                                </div>
                            <div>
                            <input name="Seekbar" id="Seekbar" onchange="SeekBarToInput()" value="0" type="range" style="width: 100%; display: block;" max="15" min="0">
                        </div>
                           
                            <button class="col-3 submitbtn" style="margin-bottom: 20px;" type="submit" value="Submit" name="Skill">Add Skill <i class="fa fa-angle-right"></i></button>
                         
                            
                        </div>
                                              
                        
                        </form>
                    
                                           
                </div>
                    
                  
                
        <!--////Work Experience-->        
                
                <div class="line" style="margin-top: 40px;"></div>
                <div>
                <p class="headp">Job Experience</p>
        <!--///////////Fetch work experience-->
                    <?php
                            $command5="SELECT * FROM applicantJobExperience WHERE Aid=".$_SESSION[Id]."";
                            $result5=$con->query($command5);
                            while($data5=$result5->fetch_assoc())
                            {
              ?>

                     <div class="col-12 ViewWork bb" style="padding: 10px; margin-top: 20px;">
                               <div class="col-8" style=" float: left;padding: 0px;height:auto;">
                                   <p class="ssq " style="font-size: 16px;margin-top: 5px;"><b><?php  echo $data5['Position'].", ".$data5['Company']; ?></b></p>
                               </div>
                                <div class="col-4" style="overflow: hidden; float: left; text-align:center;">
                            
                                    <form method="GET" action="">
                                        <input type="hidden" name="DeleteId" value="<?php  echo $data5['Id'];?>">
                                        <button type="submit" name="DeleteExp" title="Delete" style=" background: none; border: none; float: right; margin: auto; padding: 0px;" ><img src="../icons/minus.svg" height="15" width="15"></button>
                                    </form>
                                </div>

                                <div class="col-12"style="float: left;padding: 0px;height: auto;margin: 0px;padding: 0px;">
                                           <p class="ssq" style="font-size:13px;margin-top: 5px;"><?php  echo $data5['StartDate']." to ".$data5['EndDate']; ?></p>
                                </div>
                                  <div class="col-12"style="float: left;padding: 0px;height: auto;margin: 0px;padding: 0px;">
                                           <p class="ssq" style="font-size:15px;margin-top: 5px;"><?php  echo $data5['Description'].""; ?></p>
                                </div>
                     </div>
                 <?php
                           }
              ?>
                
        <!--/////////fetch finish/-->
        <form action="" method="GET" id="Experience" name="Experience">    
                <div class="" style="clear: both; margin-top: 30px; padding-top: 30px;">
                        
                       <div class="col-6 inputpart1" style="">
                        <div class="styled-input">
                        <input type="text" name="Company" value="<?php echo @$_SESSION['Company'];?>"  required/>
                        <label>Company/Organisation</label>
                        <span></span> </div>
                       </div>
                       
                       <div class="col-6 inputpart2" style="">
                        <div class="styled-input">
                        <input type="text" name="Position" value="<?php echo @$_SESSION['Position'];?>"  required/>
                        <label>Position</label>
                        <span></span> </div>
                       </div> 
                        
                   <div class="col-6 inputpart1" style="">
                        <div class="input-group styled-input">                             
                             <input type="text" name="ExpStDate" id="date1" class="form-control" value="<?php echo @$_SESSION['StartDate2'];?>" data-select="date" placeholder="Start Date" style="width: 80%;" required>
                             <button class="btn btn-primary" type="button" data-toggle="select" style="float: right; margin-top: 12px; background: none; border: none;"><i  class="fa fa-calendar"></i></button>
                        </div>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                      
                        <div class="input-group styled-input">                             
                             <input type="text" name="ExpEndDate" id="date1"  class="form-control" value="<?php echo @$_SESSION['EndDate2'];?>" data-select="date" placeholder="End Date" style="width: 80%;" required>
                             <button class="btn btn-primary" type="button" data-toggle="select" style="float: right; margin-top: 12px; background: none; border: none;"><i  class="fa fa-calendar"></i></button>
                        </div>
                       
                    </div>
                    
                    <div style="clear: both;">
                    <div class="styled-input wide">
                        <textarea name="ExpDescription" rows="3" value="<?php echo @$_SESSION['Discription2'];?>" required></textarea>
                    <label>Discription</label>
                    <span></span> </div>     
                    </div>
                    
                    <input type="hidden" name="Experience" hidden>
                    
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Experience">Add Work Experiences <i class="fa fa-angle-right"></i></button>
                   
                                
                
                </div>
            </form>
                </div>
                
              <div class="line" style="margin-top: 80px;"></div>

                
                
    <!--////Education Edit-->            
                 <div>
                     <p class="headp" >Educational Detail</p>
                
                    <?php
                       $command4="SELECT * FROM educationDetail WHERE Aid=".$_SESSION['Id']."";
                                    $result4=$con->query($command4);
                                     while( $data4=$result4->fetch_assoc())
                                     {
                       ?>
                 <div class="col-12" style="height:auto;padding: 0px;margin: 0x; margin-bottom: 10px; background: #F5F5F5; padding: 10px; border-radius: 10px;">
                           <div class="col-12 bb ViewWork" style="padding-left: 10px;">
                               <p class="ssq col-8 bb" style="font-size: 16px;margin-top: 5px; display: inline-block;"><b><?php  echo $data4['DegreeTitle']." , ".$data4['Institution']; ?></b></p>
                                   
                               <div class="col-4" style="overflow: hidden; float: right; text-align:center;">
                            
                                    <form method="GET" action="">
                                        <input type="hidden" name="DeleteId" value="<?php  echo $data4['Id'];?>">
                                        <button type="submit" name="DeleteEdu" title="Delete" style=" background: none; border: none; float: right; margin: auto; padding: 0px;" ><img src="../icons/minus.svg" height="15" width="15"></button>
                                    </form>
                                </div>
                           
                           </div>

                           <div class="col-12 bb"style="">
                                       <p class="ssq" style="font-size:13px;margin-top: 5px;"><?php  echo $data4['StartDate']." to ".$data4['EndDate']; ?></p>
                            </div>
                            <div class="col-12 bb"style="">
                                       <p class="ssq" style="font-size:15px;margin-top: 5px;"><?php  echo $data4['Description'].""; ?></p>
                            </div>
                 </div>
                    <?php
                       }
                    ?>
                 <form method="GET" action="" id="Education" name="Education">
                    <div class="" style="clear: both; padding-top: 20px;">
                         
                        <div class="col-6 inputpart1" style="">
                        <div class="styled-input">
                            <input type="text" name="DegreeTitle" value="<?php echo @$_SESSION['DegreeTitle'];?>" required/>
                        <label>Degree Title</label>
                        <span></span> </div>
                        </div>
                        
                        <div class="col-6 inputpart2" style="">
                         <div class="styled-input">
                            <input type="text" name="InstitutionName" value="<?php echo @$_SESSION['Institution'];?>" required/>
                        <label>Institution Name</label>
                        <span></span> </div>
                        </div>
                            
                        <div class="col-6 inputpart1" style="">
                            <div class="input-group styled-input">                             
                                 <input type="text" name="EduStDate" id="date1" class="form-control" value="<?php echo @$_SESSION['StartDate'];?>" data-select="date" placeholder="Start Date" style="width: 80%;" required>
                                 <button class="btn btn-primary" type="button" data-toggle="select" style="float: right; margin-top: 12px; background: none; border: none;"><i  class="fa fa-calendar"></i></button>
                            </div>
                        </div>

                        <div class="col-6 inputpart2" style="">

                            <div class="input-group styled-input">                             
                                 <input type="text" name="EduEndDate" id="date1"  class="form-control"value="<?php echo @$_SESSION['EndDate'];?>" data-select="date" placeholder="End Date" style="width: 80%;" required>
                                 <button class="btn btn-primary" type="button" data-toggle="select" style="float: right; margin-top: 12px; background: none; border: none;"><i  class="fa fa-calendar"></i></button>
                            </div>

                        </div>



                        <div style="clear: both;">
                        <div class="styled-input wide">
                            <textarea name="EduDescription" rows="3" value="<?php echo @$_SESSION['Discription'];?>" required></textarea>
                        <label>Discription</label>
                        <span></span> </div>     
                        </div>
                   
                    </div>
                    
                
                     
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Education">Add Education Detail<i class="fa fa-angle-right"></i></button>
               </form>
                </div>
    
    
                
            </div>
                <!--////Social Links-->
                <div class="SocialLinks">
                    <p class="headp" >Socail Links</p>

                    
                    <form method="GET" action=""  name="Social" novalidate>
                        <div class="" style="clear: both; padding-top: 20px;">
                        
                            <div class="col-6 inputpart1" style="">
                                <div class="styled-input">
                                    <input type="text" name="Tw" value="<?php echo @$data3['Twitter'];?>" required/>
                                <label>Twitter</label>
                                <span></span> </div>
                                </div>

                                <div class="col-6 inputpart2" style="">
                                 <div class="styled-input">
                                    <input type="text" name="G+" value="<?php echo @$data3['GooglePlus'];?>" required/>
                                <label>Google+</label>
                                <span></span> </div>
                                </div>
                            
                            <div class="col-6 inputpart1" style="">
                                <div class="styled-input">
                                    <input type="text" name="Fb" value="<?php echo @$data3['Facebook'];?>" required/>
                                <label>Facebook</label>
                                <span></span> </div>
                                </div>

                                <div class="col-6 inputpart2" style="">
                                 <div class="styled-input">
                                    <input type="text" name="Ln" value="<?php echo @$data3['LinkedIn'];?>" required/>
                                <label>Linked In</label>
                                <span></span> </div>
                                </div>
                        </div>
                        
                         <button class="col-3 submitbtn" type="submit" value="Submit" name="SocialLinks">Add Social Links<i class="fa fa-angle-right"></i></button>

                    </form>
                </div>
                
                <!--//-->
            </div>  
            
           
        </div>
        
        
         <!--//////////////hidden header//-->
        
         <div id=bottommenu  class="HiddenHeader">
             <p class="headp" style="border: none; margin: 10px; margin-left: 100px; color: white; "><?php echo @$SearchTitle;?> | Last Edited(<?php echo @$_SESSION['date']?>)</p>
            <div style="float: right; padding-top: 20px; padding-right: 100px; ">
                <button class="submitbtn" style="float: left; margin-right: 20px; padding: 5px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;"  onclick="editmode()" value="Submit" name="Submit"><i class="fa fa-edit" style="float: none;"></i> Edit Profile</button>
            </div>
        </div>
        
        <div id=bottommenu2  class="HiddenHeader">
            <p class="headp" style="border: none; margin: 10px; margin-left: 100px; color: white; "><?php echo $SearchTitle;?> | Last Edited(<?php echo @$_SESSION['date']?>)</p>
            <div style="float: right; padding-top: 20px; padding-right: 100px; ">
                <button class="submitbtn" style="float: left; margin-right: 20px; padding: 5px; padding-right: 10px; padding-left: 10px; margin-bottom: 20px;" onclick="viewmode()" value="Submit" name="Submit"><i class="fa fa-edit" style="float: none;"></i> Save Changes</button>

            </div>
        </div>
        <!--//////////////-->
        
        </body>
        </html>
      
         <?php

	$valid_formats = array("jpg", "JPG", "PNG", "png", "gif", "GIF", "bmp", "BMP");
        function compress_image($source_url, $destination_url, $quality) {

      $info = getimagesize($source_url);

          if ($info['mime'] == 'image/jpeg'||$info['mime'] == 'image/JPG')
          $image = imagecreatefromjpeg($source_url);

          elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source_url);

          elseif ($info['mime'] == 'image/png'||$info['mime'] == 'image/PNG')
          $image = imagecreatefrompng($source_url);

          imagejpeg($image, $destination_url, $quality);
          return $destination_url;
        }
        
	if(!empty($_FILES['photoimg']))
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
						{
                                                        if( $size<((1024*1024)))
                                                            {
                                                                $actual_image_name = $_SESSION['Email'].".".$ext;
                                                                $tmp = $_FILES['photoimg']['tmp_name'];

                                                                if (file_exists($path.$actual_image_name)) {
                                                                       unlink($path.$actual_image_name);
                                                                    }
                                                                    
                                                                  
                                                                            if(move_uploaded_file($tmp, $path.$actual_image_name))
                                                                                    {

                                                                                            $command="UPDATE applicantprofile SET AImage='$path$actual_image_name' WHERE Id=$Aid" ;

                                                                                            if($con->query($command)===TRUE){
                                                                                            $_SESSION['Logo']=$path.$actual_image_name;
                                                                                    echo '<script type="text/javascript">','myFunction("Profile Picture Updated");','</script>';
                                                                                    echo '<script type="text/javascript">','ref();','</script>';	


                                                                                            }


                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    echo '<script type="text/javascript">','myFunction("Upload Failed");','</script>';

                                                                                }
                                                                    
                                                            }else{
                                                                    echo '<script type="text/javascript">','myFunction("File size should be less then 1 Mb");','</script>';

                                                            }
                                                }
                                        else
                                        {
                                                echo '<script type="text/javascript">','myFunction("Invalid file formats..!");','</script>';
                                        }      
                }
                
            }
                                ?>
        
        
        
        
        <!--////////////////////////////////edit ////////////////////////////////-->
        <!--////////////////////////////////edit ////////////////////////////////-->
        <!--Google places autocomplete-->
        <script>
            var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,options);
    </script>
        
        <!--///Date picker-->
        
      <script src="http://code.jquery.com/jquery-1.12.3.min.js"></script> 
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.js"></script> 
<script src="../js/jquery.dateselect.js"></script>
<script>
jQuery(document).ready(function($) {
			$('.btn-date').on('click', function(e) {
				e.preventDefault();
				$.dateSelect.show({
					element: 'input[name="date2"]'
				});
			});
		});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
        <!--////-->
        
   
        
<div id="snackbar">Some text some message..</div>     
<!-- The actual snackbar -->

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "ApplicantDashboard.php";},3000);
     
}

function myFunction2(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantDashboard.php";},3000);
        }
        
         function ref2(x)
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantDashboard.php";},3000);
            
        }
         
</script>
        <!--///////////////-->
        
        
        <!--/////////////////PHP CODE-->
<?php
if(isset($_POST['ProfileDone']))
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
        $Profession=$_POST['Profession'];
        $Addres=$_POST['Address'];
        $About=$_POST['About'];
        $Searchable=$_POST['Searchable'];
        
        $diff = abs(strtotime($date) - strtotime($Dob));
        $years = floor($diff / (365*60*60*24));

        if (empty ($Dob)) {
            $_SESSION['error']="Invalid Date of Birth";
        }
        elseif ($years<18) {
            $_SESSION['error']="Age should be more or equal to 18yrs $Dob $Searchable";
        }
    elseif(preg_match($phoneregex, $Phone)||empty ($Phone)) 
            {
                $_SESSION['error']="Please enter correct Phone number";
                $_SESSION['Dob']=$Dob;
                
            }
    elseif(!((strlen($Phone)>9)&&(strlen($Phone)<17))) 
            {
                $_SESSION['error']="Please enter correct Phone number";
                $_SESSION['Dob']=$Dob;
                
            }
            elseif(empty ($LastEdu))
            {
                $_SESSION['error']="Invalid Education Detail";
                $_SESSION['Dob']=$Dob;
                $_SESSION['phone']=$Phone;
            }
            elseif(empty ($Profession))
            {
                $_SESSION['error']="Invalid Education Detail";
                $_SESSION['Dob']=$Dob;
                $_SESSION['phone']=$Phone;
                $_SESSION['leducation']=$LastEdu;  
            }
            elseif(empty ($Addres))
            {
             $_SESSION['error']="Address can't be left empty";
                $_SESSION['Dob']=$Dob;
                $_SESSION['phone']=$Phone;
                $_SESSION['leducation']=$LastEdu;
                $_SESSION['profession']=$Profession;  
            }
            elseif(empty ($About))
            {
                $_SESSION['error']="Please fill about yourself section";
                $_SESSION['Dob']=$Dob;
                $_SESSION['phone']=$Phone;
                $_SESSION['leducation']=$LastEdu;
                $_SESSION['address']=$Addres;
                $_SESSION['profession']=$Profession;  

            }
        else{
            if(empty($Searchable))
            {
                $Searchable=0;
                //to forcabley stop search profile on Refresh
                $_SESSION['FSrearchOff']=1;
            }
            else
            {
                $Searchable=1;
                $_SESSION['FSrearchOff']=0;
            }
            
            if($_SESSION['Profile']==0){

                $date = date('Y-m-d H:i:s');
                $command="Insert into applicantprofile(Id,FirstName,LastName,Dob,Email,Phone,LastEducation,Profession,Address,About,UpdateDate,Searchable) values(".$_SESSION['Id'].",'".$_SESSION['FirstName']."','".$_SESSION['LastName']."','$Dob','".$_SESSION['Email']."','$Phone','$LastEdu',$Profession,'$Addres','$About','$date',$Searchable)";
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
                $command="Update applicantprofile set Dob='$Dob',Phone='$Phone',LastEducation='$LastEdu',Profession='$Profession',Address='$Addres',About='$About',UpdateDate='$date' ,Searchable='$Searchable' where Id=".$_SESSION['Id']."" ;
            
                 if($con->query($command)===TRUE){
                     $_SESSION['error']="  ";
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




if(isset($_GET['Skill']))
{
    $SkillTitle=$_GET['SkillTitle'];
    $SkillExp=$_GET['SkillExp'];
    $SkillLastUsed=$_GET['SkillLastUsed'];
    $_SESSION['Skill']="";
    $_SESSION['error']="";
    if(empty($SkillTitle))
    {
        $_SESSION['error']="Skill can't be left empty.";
        echo '<script type="text/javascript">','ref2();','</script>';

    }
    elseif(($SkillExp>16)||($SkillExp<0)){
        $_SESSION['error']="Invalid Skill Experience.";
        $_SESSION['Skill']=$SkillTitle;
        echo '<script type="text/javascript">','ref2();','</script>';

    }
    else{
         $command="Insert into applicantSkills(Aid,Skills,LastUsed,ExpYear) values(".$_SESSION['Id'].",'$SkillTitle','$SkillLastUsed','$SkillExp')";
                                            if($result=$con->query($command))
                                            {
                                                $_SESSION['error']="  ";
                                                echo '<script type="text/javascript">','myFunction("Skills Uploaded...");','</script>';
                                                
                                                 if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                            
                                            }
                                            else{
                                                $_SESSION['error']="  ";
                                                echo '<script type="text/javascript">','myFunction("Unable to upload Skills...");','</script>';
                                            }
        
        
    }
    
}


if(isset($_GET['Experience']))
{
    $date = date('Y-m-d H:i:s');
    $Company=$_GET['Company'];
    $Position=$_GET['Position'];
    $ExpEndDate=$_GET['ExpEndDate'];
    $ExpStDate=$_GET['ExpStDate'];
    $ExpDescription=$_GET['ExpDescription'];
    
    $diff1 = abs(strtotime($date) - strtotime($ExpStDate));
                        $diff2 = abs(strtotime($ExpEndDate) - strtotime($ExpStDate));
                        $days1 = floor($diff1 / (60*60*24));
                        $days2 = floor($diff2 / (60*60*24));
                        
                        if(empty($Company))
                        {
                           $_SESSION['error']="Company Name Should Not Be Empty";
                            echo '<script type="text/javascript">','ref();','</script>';
                         
                        }
                        elseif((ctype_alpha(str_replace(' ', '', $Position)) === false)||empty($Position)){
                            $_SESSION['error']="Position should only contains characters";
                            $_SESSION['Company']=$Company;
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($ExpStDate)||$days1<9) {
                        $_SESSION['error']="Invalid Job Start Date";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($ExpEndDate)||$days2<9) {
                        $_SESSION['error']="Invalid Job End Date";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        $_SESSION['StartDate2']=$ExpStDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($ExpDescription)) {
                        $_SESSION['error']="Invalid Job Description";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        $_SESSION['StartDate2']=$ExpStDate;
                        $_SESSION['EndDate2']=$ExpEndDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                    
                        else
                        {
                              $command="Insert into applicantJobExperience(Aid,Company,Position,StartDate,EndDate,Description,UpdateDate) values('".$_SESSION['Id']."','$Company','$Position','$ExpStDate','$ExpEndDate','$ExpDescription','$date')";
                                    if($result=$con->query($command))
                                    {
                                        $_SESSION['error']="  ";
                                         echo '<script type="text/javascript">','myFunction("Job Experience Uploaded...");','</script>';
                                        if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                        
                                    }
                                    else {
                                        $_SESSION['error']="  ";
                                       echo '<script type="text/javascript">','myFunction("Unable to Upload Job Experience...");','</script>';
                                    }
                        }
    

}

if(isset($_GET['Education']))
{
                        $date = date('Y-m-d H:i:s');
                        $DegreeTitle=$_GET['DegreeTitle'];
                        $Institution=$_GET['InstitutionName'];
                        $StartDate=$_GET['EduStDate'];
                        $EndDate=$_GET['EduEndDate'];
                        $Description=$_GET['EduDescription'];
                                               
                        $diff1 = abs(strtotime($date) - strtotime($StartDate));
                        $diff2 = abs(strtotime($StartDate) - strtotime($EndDate));
                        $years1 = floor($diff1 / (365*60*60*24));
                        $years2 = floor($diff2 / (365*60*60*24));
                        
                        if(empty($DegreeTitle)){
                            $_SESSION['error']="Degree Title should only contains characters";
                            $_SESSION['DegreeTitle']=$DegreeTitle;
                            echo '<script type="text/javascript">','ref2();','</script>';
                        }
                        elseif(empty($Institution)){
                            $_SESSION['error']="Institution Name should not be empty";
                            echo '<script type="text/javascript">','ref2();','</script>';
                        }
                        elseif (empty ($StartDate)||$years1<2||$StartDate>$date) {
                        $_SESSION['error']="Invalid Degree Start Date";
                        $_SESSION['Institution']=$Institution;
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        echo '<script type="text/javascript">','ref2();','</script>';
                        }
                        elseif (empty ($EndDate)||$years2<2||$EndDate>$date) {
                        $_SESSION['error']="Invalid Degree End Date";
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        $_SESSION['Institution']=$Institution;
                        $_SESSION['StartDate']=$StartDate;
                        echo '<script type="text/javascript">','ref2();','</script>';
                        }
                        elseif (empty ($Description)) {
                        $_SESSION['error']="Invalid Degree Description";
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        $_SESSION['Institution']=$Institution;
                        $_SESSION['StartDate']=$StartDate;
                        $_SESSION['EndDate']=$EndDate;
                        echo '<script type="text/javascript">','ref2();','</script>';
                        }
                    
                        else
                        {
                          
                            $command="Insert into educationDetail(Aid,DegreeTitle,Institution,StartDate,EndDate,Description,UpdateDate) values('".$_SESSION['Id']."','$DegreeTitle','$Institution','$StartDate','$EndDate','$Description','$date')";
                                    if($result=$con->query($command))
                                    {                                       
                                        $_SESSION['error']="  ";
                                         echo '<script type="text/javascript">','myFunction("Education Details Uploaded...");','</script>';
                                        
                                         if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                    }
                                    else {
                                        $_SESSION['error']="  ";
                                        echo '<script type="text/javascript">','myFunction("Unable to upload Education Details...");','</script>';
                                    }
                        }
}


 if(!empty($_FILES['Resume']))
                    {         $_SESSION['error']="";
                              $filename=$_FILES['Resume']['name'];
                              $size = $_FILES['Resume']['size'];
                              $date = date('Y-m-d H:i:s');
                              
                        $valid_formats = array("doc", "docx", "pdf", "rtf"); 
                        if (!empty($filename)) {
                            
                                    list($txt, $ext) = explode(".", $filename);
                                                if(in_array($ext,$valid_formats))
                                                {
                                                    if( $size<(2*(1024*1024)))
                                                    {
                                                                $actual_image_name = $_SESSION['Id'].$_SESSION['FirstName'].$_SESSION['LastName'].".".$ext;
                                                                $tmp = $_FILES['Resume']['tmp_name'];

                                                                if (file_exists($path1.$actual_image_name)) {
                                                                       unlink($path1.$actual_image_name);
                                                                       if(move_uploaded_file($tmp, $path1.$actual_image_name))
                                                                                    {
                                                                                        $command="UPDATE resume SET Path='$path1$actual_image_name',Date='$date' WHERE Aid=".$_SESSION['Id']."" ;

                                                                                        if($con->query($command)===TRUE){
                                                                                            
                                                                                            $docObj = new DocxConversion($path1.$actual_image_name);
                                                                                            $docText= $docObj->convertToText();
                                                                                            
                                                                                             $i="Update SearchResume set ResumeText='$docText',UpdateDate='$date' where Id=".$_SESSION['Id'].""; 
                                                                                                if($result=$con->query($i))
                                                                                                { 
                                                                                                    
                                                                                                    $_SESSION['Logo']=$path1.$actual_image_name;
                                                                                                    echo '<script type="text/javascript">','myFunction2("Resume File Updated");','</script>';
                                                                                                    $_SESSION['error']="  ";

                                                                                                }
                                                                                            
                                                                                           
                                                                                            }
                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    echo '<script type="text/javascript">','myFunction2("Upload Failed");','</script>';

                                                                                }
                                                                       
                                                                    }
                                                                else{
                                                                    if(move_uploaded_file($tmp, $path1.$actual_image_name))
                                                                                    {
                                                                                        $command="Insert into resume (Aid,Path,Date) values(".$_SESSION['Id'].",'$path1$actual_image_name','$date')" ;

                                                                                        if($con->query($command)===TRUE){
                                                                                            
                                                                                            $docObj = new DocxConversion($path1.$actual_image_name);
                                                                                            $docText= $docObj->convertToText();
                                                                                            
                                                                                             $i="Insert into SearchResume (Id,ResumeText,UpdateDate) values(".$_SESSION['Id'].",'$docText','$date')"; 
                                                                                                if($result=$con->query($i))
                                                                                                { 
                                                                                                    $_SESSION['PassErr']="";
                                                                                                    $_SESSION['Logo']=$path1.$actual_image_name;
                                                                                                    echo '<script type="text/javascript">','myFunction2("Resume Uploaded");','</script>';
                                                                                                    $_SESSION['error']="  ";
                                                                                                }
                                                                                        }
                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    echo '<script type="text/javascript">','myFunction2("Upload Failed");','</script>';

                                                                                }

                                                                    
                                                                }
                                                    }
                                                    else{
                                                        $_SESSION['error']="File size should be less then 2Mb..!";
                                                        echo '<script type="text/javascript">','myFunction2("File Size Exceeded");','</script>';  
                                                    }
                                                }
                                                else{
                                                    $_SESSION['error']="Invalid file format. Valid formats are .pdf, .doc, .docx, .rtf ";
                                                  echo '<script type="text/javascript">','myFunction2("Invalid File Format");','</script>';  
                                                }
                                                        
                                                        
                        }
                    else{ 
                            $_SESSION['error']="Please select a file..!";
                                echo '<script type="text/javascript">','myFunction("Please select a file..!");','</script>';

                    }
                        
}

if(isset($_GET['JobPreference']))
{
                        $date = date('Y-m-d H:i:s');
                        $DesiredJob=$_GET['DesiredJob'];
                        $PrefLocation=$_GET['PrefLocation'];
                        $Relocation=$_GET['Relocation'];
                        $HourlyRate=$_GET['HourlyRate'];
                        $Exp=$_GET['Exp'];
                        $ExptSal=$_GET['ExptSal'];
                        $_SESSION['error']="";
                        
                        if(empty($DesiredJob)){
                            
                            $_SESSION['error']="Desired Job Field is Empty.";
                        }
                        elseif(empty ($PrefLocation)){
                            $_SESSION['error']="Enter Your Prefered location.";
                        }
                        elseif(empty ($Exp)){
                            $_SESSION['error']="Enter your years of Experience.";
                        }
                        elseif(empty ($ExptSal)){
                            $_SESSION['error']="Enter expected Salary.";
                        }
                        elseif(empty ($HourlyRate)){
                            $_SESSION['error']="Enter Hourly Rate.";
                        }
                        else{
                            
                            if(empty($Relocation))
                            {
                                $Relocation="No";
                            }
                            else
                            {
                                $Relocation="Yes";
                            }
                            
                            if($data6['JobCategory']!=NULL)
                            {
                                 $command="Update applicantJobCategroy set JobCategory='$DesiredJob',Experience='$Exp',Relocate='$Relocation',PrefLocation='$PrefLocation',ExpSalary='$ExptSal',HourlyRate='$HourlyRate',UpdateDate='$date' where Id=".$_SESSION['Id']."";
                                    if($result=$con->query($command))
                                    {                                       
                                        $_SESSION['error']="  ";
                                         echo '<script type="text/javascript">','myFunction("Job Preference Updated");','</script>';
                                    }
                                    else
                                    {
                                     $_SESSION['error']="  ";
                                        echo '<script type="text/javascript">','myFunction("Unable to Save Preferences");','</script>';
                                       
                                    }
                                
                            }else{
                                 $command="Insert into applicantJobCategroy(Id,JobCategory,Experience,Relocate,PrefLocation,HourlyRate,ExpSalary,UpdateDate) values(".$_SESSION['Id'].",'$DesiredJob','$Exp','$Relocation','$PrefLocation',$HourlyRate,'$ExptSal','$date')";
                                    if($result=$con->query($command))
                                    {                                       
                                        $_SESSION['error']="  ";
                                         echo '<script type="text/javascript">','myFunction("Job Preference Saved");','</script>';
                                        
                                         if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                    }
                                    else {
                                        $_SESSION['error']="  ";
                                        echo '<script type="text/javascript">','myFunction("Unable to Save Preference22");','</script>';
                                    }
                            
                                
                            }
                           
                        }
}


 if(isset($_GET['SocialLinks']))
                    {
                        $date = date('Y-m-d H:i:s');
                        $faceboook=$_GET['Fb'];
                        $twitter=$_GET['Tw'];
                        $linkedIn=$_GET['Ln'];
                        $GooglePlus=$_GET['G+'];
                        
                        $command2="Select * from applicantSocialLinks where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command2);
                             if($data=$rs->fetch_assoc()){

                                  $command2="Update applicantSocialLinks set Facebook='$faceboook',Twitter='$twitter',LinkedIn='$linkedIn',GooglePlus='$GooglePlus',UpdateDate='$date' where Id=".$_SESSION['Id']."" ;
                                  if($con->query($command2)===TRUE){
                                      $_SESSION['error']="  ";
                                      echo '<script type="text/javascript">','myFunction("Social Links Updated...");','</script>';
                                  }
                             }
                             else{
                                    $command="Insert into applicantSocialLinks(Id,Facebook,Twitter,LinkedIn,GooglePlus,UpdateDate) values('".$_SESSION['Id']."','$faceboook','$twitter','$linkedIn','$GooglePlus','$date')";
                                    if($result=$con->query($command))
                                    {
                                        $_SESSION['error']="  ";
                                         echo '<script type="text/javascript">','myFunction("Social Links Uploaded...");','</script>';
                                    
                                        if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                    }
                                    else {
                                        $_SESSION['error']="  ";
                                        echo '<script type="text/javascript">','myFunction("Unable to Upload Social Links...");','</script>';
                                    }
                             }
                        
                    }

if(isset($_GET['DeleteSkill']))
    {
        $Id=$_GET['DeleteId'];
        $command="Delete from applicantSkills where Id=$Id";

         if($result=$con->query($command))
        {
             $_SESSION['error']="  ";
            echo '<script type="text/javascript">','myFunction("Skill Detail Deleted..");','</script>';
        }
    }
                    
if(isset($_GET['DeleteExp']))
{
    $Id=$_GET['DeleteId'];
    $command="Delete from applicantJobExperience where Id=$Id";

     if($result=$con->query($command))
    {
         $_SESSION['error']="  ";
        echo '<script type="text/javascript">','myFunction("Experience Detail Deleted..");','</script>';
    }
}

if(isset($_GET['DeleteEdu']))
{
    $Id=$_GET['DeleteId'];
    $command="Delete from educationDetail where Id=$Id";

     if($result=$con->query($command))
    {
         $_SESSION['error']="  ";
        echo '<script type="text/javascript">','myFunction("Education Detail Deleted..");','</script>';
    }
}
?>
        
        
        
        
        <!--////////////////////////////////edit ////////////////////////////////-->
        <!--////////////////////////////////edit ////////////////////////////////-->
        
        
        
        <?php
 include './footer.html';
 
            }
 ?>
