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
    $Rid=$_GET['Rid'];
    $Jid=$_GET['Jid'];
    $Id=$_GET['Id'];
      $Title=$_GET['Title'];
    $path1="../ApplicantResume/";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Active_job.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantDashStyle.css">
    <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Resume.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
              .pagination{
        
        float: right;
        padding-top: 20px;
        }
        
        .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: #357ebd;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

        </style>
<script type="text/javascript">
    function chnng()
    {
        document.getElementById("Resume").style.backgroundColor="#357ebd";
        document.getElementById("Resume").style.borderLeft="6px solid gray";
         document.getElementById("ResPara").style.color="white";
         document.getElementById("Resicon").style.color="white";
        
    }
</script>
</head>
<body onload="chnng()">
     <?php include './RecuriterHeader.php';?>
   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                    <div class="col-12" style="  padding: 0;padding-bottom: 10px;">
                                <ul class="breadcrumb">
                                    <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                    <li><a href="Recuriter_Resume.php"style="color: white;">Resume</a></li>
                                    
                                </ul>
                     </div>
              <p class="para"style="color: white;font-size: 40px;padding-bottom: 10px;" ></p>
                    
             
          </div>
    
    
                            <?php
                                         if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                    
                                   
                                 include './../Connection/connect.php';
                                 if($connection==1)
                                    {    $command="SELECT * FROM applicantprofile WHERE Id=$Id";
                                          $result=$con->query($command);
                                           $data=$result->fetch_assoc();
                                           
                                            $command2="SELECT * FROM applicantSkills WHERE Aid=$Id";
                                          $result2=$con->query($command2);
                                           $data2=$result2->fetch_assoc();
                                            
                                            $command3="SELECT * FROM applicantSocialLinks WHERE Id=$Id";
                                          $result3=$con->query($command3);
                                           $data3=$result3->fetch_assoc();
                                           
                                            $command4="SELECT * FROM educationDetail WHERE Id=$Id";
                                          $result4=$con->query($command4);
                                           $data4=$result4->fetch_assoc();
                                           
                                              $command5="SELECT * FROM applicantJobExperience WHERE Id=$Id";
                                          $result5=$con->query($command5);
                                           $data5=$result5->fetch_assoc();
                                           
                                           $command6="SELECT * FROM applicantJobCategroy WHERE Id=$Id";
                                          $result6=$con->query($command6);
                                           $data6=$result6->fetch_assoc();
                                            $rc6=$result6->num_rows;
                                            
                                            $command7="SELECT * FROM resume WHERE Aid=$Id";
                                          $result7=$con->query($command7);
                                           $data7=$result7->fetch_assoc();   
                                           
                                            
                            ?>
    
                   <div class="col-12" style="height: auto;padding-bottom: 0px;" >
                       
                       <div class="col-3" style="height: 250px;background: #f1f1f1;box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);">
                           <div class="col-12" style=" height: 220px;padding: 0;"> 
                               <img src='<?php echo $data['AImage'];?>' style="height: 100%; width: 100%;padding: 10px;">
                            </div>
                       </div>
                       <div class="col-8" style="height: 250px;margin: 0px;">
                           <div class="col-12"style="padding: 0px;margin: 0px;border-bottom: 1px solid lightgray;">
                                        <p class="para" style="padding: 0px;margin: 0px;margin-left: 10px;font-size: 25px;"><?php echo $data['FirstName']." ".$data['LastName'];?></p>
                                        <p class="para" style="padding: 0px;margin-top: 10px;font-size: 18px; margin-left: 10px;"><?php echo $data['Profession']." ";?></p>
                           </div>
                           <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                        <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                                        <div style="width: 30%;float: left;padding: 0px;height: 40px;">
                                                            <p class="para" style="font-size: 15px;">E-Mail :</p>
                                                        </div>
                                                        <div style="width: 50%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para"style="font-size: 15px;"><?php echo $data['Email']." "?></p>
                                                        </div>
                                        </div>
                                         <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                                        <div style="width: 30%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;">Phone :</p>
                                                        </div>
                                                        <div style="width: 50%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;"><?php echo $data['Phone']." "?></p>
                                                        </div>
                                        </div>
                                         <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                                        <div style="width: 30%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;">Address :</p>
                                                        </div>
                                                        <div style="width: 50%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;"><?php echo $data['Address']." "?></p>
                                                        </div>
                                        </div>
                                         <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                                        <div style="width: 30%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;">Date of Birth :</p>
                                                        </div>
                                                        <div style="width: 50%;float: left;padding: 0px;height: 40px;">
                                                                     <p class="para" style="font-size: 15px;"><?php echo $data['Dob']." "?></p>
                                                        </div>
                                        </div>
                           </div>
                           
                       </div>
                       
                   </div>
               <div class="col-12" style="height: auto;padding-top: 0px;" >
                       
                      
                       <div class="col-12" style="height: auto;padding: 0px;margin: 0x;">
                            <p class="profile">About Me</p>
                            <p class="para" style="font-size: 15px; padding: 0px;margin: 0px;margin-top: 5px;"><?php echo $data['About']." "?></p>
                             
                       </div>
                   
                      <div class="col-12" style="height: auto;padding: 0px;margin: 0x;">
                            <p class="profile">Job Preferences</p>
                            
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
                             
                       </div>
                             
                               
       
                   
                        <div class="col-12" style="height: auto;padding: 0px;margin: 0x;">
                            <p class="profile">Educational Information</p>
                               
                                        <?php
                                                 if(!isset($_SESSION)) 
                                            { 
                                                session_start(); 
                                            } 
                                        include './../Connection/connect.php';
                                         if($connection==1)
                                            {     $command4="SELECT * FROM educationDetail WHERE Aid=$Id";
                                                  $result4=$con->query($command4);
                                                   while($data4=$result4->fetch_assoc())
                                                   {
                                     ?>
                                               <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                                    <div class="col-3"style="float: left;padding: 0px;height: 70px;margin: 0px;">
                                                                                            <div style="width: 25%;float: left;padding: 0px;height: 60px;">
                                                                                                <i class="fa fa-graduation-cap fa-3x" style="color: gray;"></i>
                                                                                            </div>
                                                                                             <div style="width: 75%;float: left;padding: 0px;height: 60px;margin: 0px;padding: 0px;">
                                                                                                <p class="para" style="font-size: 20px;margin: 0px;padding: 0px;margin-top: 2px;margin-left: 5px;"><?php echo $data4['Institution']." "?></p>
                                                                                                 <p class="para" style="font-size: 12px; padding: 0px;margin-left: 5px;"><?php echo $data4['StartDate']." to ".$data4['EndDate']?></p>
                                                                                             </div>
                                                                           </div>
                                                    <div class="col-9" style="float: left;padding: 0px;height: auto;margin: 0px;">
                                                                                        <p class="para"style="font-size: 20px;margin: 0px; padding: 0px;"><?php echo $data4['DegreeTitle']." "?></p>
                                                                                          <p class="para" style="font-size: 14px;padding: 0px;"><?php echo $data4['Description']." "?></p>
                                                                           </div>
                                                  </div>
                               
                                      <?php 
                                    } }
                                    ?>
                            
                       </div>
                                    
                   
                          
                   
                       <div class="col-12" style="height: auto;padding: 0px;margin: 0x;">
                            <p class="profile">Work Experience</p>
                            
                            <?php
                                         if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                    
                                   
                                 include './../Connection/connect.php';
                                 if($connection==1)
                                    {    
                                           
                                              $command5="SELECT * FROM applicantJobExperience WHERE Aid=$Id";
                                          $result5=$con->query($command5);
                                           while($data5=$result5->fetch_assoc())
                                                   {
                                            
                            ?>
                            <div class="col-12" style="padding: 0px;margin: 0px;height: auto;">
                                <div  class="col-3"style="margin: 0px;float: left;padding: 0px;height: 70px;">
                                                                               <div style="width: 25%;float: left;padding: 0px;height: 60px;">
                                                                                                <i class="fa fa-briefcase fa-3x" style="color: gray;"></i>
                                                                                            </div>
                                                                               <div style=" width: 75%;float: left;padding: 0px;height: 60px;margin: 0px;padding: 0px;">
                                                                                                <p class="para" style="font-size: 20px;margin: 0px;padding: 0px;margin-top: 2px;margin-left: 5px;"><?php echo $data5['Company']." "?></p>
                                                                                                 <p class="para" style="font-size: 12px;padding: 0px;margin-left: 5px;"><?php echo $data5['StartDate']." to ".$data5['EndDate']?></p>
                                                                                             </div>
                                                                           </div>
                                <div class="col-9" style="margin: 0px;float: left;padding: 0px;height: auto;">
                                                                                      <p class="para"style="font-size: 20px;margin: 0px; padding: 0px;"><?php echo $data5['Position']." "?></p>
                                                                                          <p class="para" style="font-size: 14px;padding: 0px;"><?php echo $data5['Description']." "?></p>
                                                                           </div>
                                                  </div>
                             <?php 
                                    } }
                                    ?>
                       </div>
                   
                          
                   
                                
                   
                                                    <div class="col-12" style="height:auto;padding: 0px;margin: 0x;">
                                                                                                                   <div class="col-12" style="height:auto;padding: 0px;margin: 0x;margin-top: 10px;border-bottom: 1px solid lightgray;margin-top: 20px; padding-bottom: 20px;">
                                                                                                 <div style="padding-bottom: 5px;">
                                                                                                     <p class="profile"style="font-family: global6;font-size: 25px;margin: 0px;"> Skills</p>
                                                                                                </div>
                                                                                                    
                                                                                         
                                                                                            
                                                                                            <div class="col-12 bb" style="">
                                                                                                            <div  class="aaa"style=" width:35%;">
                                                                                                                        <p class="ssq" style="margin-top: 5px;">Top Skills</p>
                                                                                                            </div>
                                                                                                     <div  class="aaa"style="width: 65%;height: auto;">
                                                                                                                       <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;">Experience</p>
                                                                                                            </div>
                                                                                                 </div>
                                                                                           
                                                                                               <?php
                                                                                                $command2="SELECT * FROM applicantSkills WHERE Aid=$Id";
                                                                                                $result2=$con->query($command2);
                                                                                                   while($data2=$result2->fetch_assoc())
                                                                                                   {
                                                                                               ?>
                                                                                            
                                                                                                   
                                                                                                <div class="col-12 bb" style="margin-bottom: 10px;">
                                                                                                    <div  class="aaa"style=" width:35%;">
                                                                                                                        <p class="ssq" style="margin-top: 5px;"><?php  echo $data2['Skills'].""; ?></p>
                                                                                                            </div>
                                                                                                            <div class="aaa"style="width: 65%;height: auto;">
                                                                                                                       <p class="ssq" style="text-align: right;margin-top: 5px;padding-right: 5px;"><?php  echo $data2['ExpYear'].""; ?></p>
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
                                                                                           }  
                                                                                                    ?>

                                                                                            

                                                                                        </div>
                       </div>
                  
                   
                   <?php
                                         if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                    
                                   
                                 include './../Connection/connect.php';
                                 if($connection==1)
                                    {   
                                            
                                            $command3="SELECT * FROM applicantSocialLinks WHERE Id=$Id";
                                          $result3=$con->query($command3);
                                           $data3=$result3->fetch_assoc();
                                           
                                            
                                           
                                            
                            ?>
    
                   
                       <div class="col-12" style="height: auto;padding: 0px;margin: 0x;margin-top: 10px;">
                                    <p class="profile" style="padding: 0px;margin: 0px;margin-bottom: 10px;">Social Links</p>
                                     
                                                                                                          <?php
                                                                                                                            if($data3['Twitter']==NULL)
                                                                                                                            {
                                                                                                                        
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                        
                                                                                                        <div class="col-12 bb">
                                                                                                                        
                                                                                                                       
                                                                                                                         <div style="width: 4%;float: left;padding: 0px;height: 30px;">
                                                                                                                                     <i class="fa fa-twitter" style=""></i>
                                                                                                                          </div>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['Twitter']; ?></p>
                                                                                                                          </div>
                                                                                                                       
                                                                                                        </div>
                                                                                                             <?php
                                                                                                                            }
                                                                                                                              if($data3['GooglePlus']==NULL)
                                                                                                                            {
                                                                                                                         
                                                                                                                         
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                       <div class="col-12 bb" >
                                                                                                                        
                                                                                                                      
                                                                                                                         <div style="width: 4%;float: left;padding: 0px;height: 30px;">
                                                                                                                                   <i class="fa fa-google-plus" style=""></i>
                                                                                                                          </div>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['GooglePlus']; ?></p>
                                                                                                                          </div>
                                                                                                                          
                                                                                                        </div>
                                                                                                          <?php
                                                                                                                            }
                                                                                                                               if($data3['Facebook']==NULL)
                                                                                                                            {
                                                                                                                            }
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                          <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////!-->
                                                                                              
                                                                                                  <div class="col-12 bb" style="margin-top: 10px;" >
                                                                                                        
                                                                                                             
                                                                                                                           <div style="width: 4%;float: left;padding: 0px;height: 30px;">
                                                                                                                                    <i class="fa fa-facebook" style=""></i>
                                                                                                                               </div>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['Facebook']; ?></p>
                                                                                                                          </div>
                                                                                                                          
                                                                                                        </div>
                                                                                                                     <?php
                                                                                                                            }
                                                                                                                             if($data3['LinkedIn']==NULL)
                                                                                                                            {
                                                                                                                         
                                                                                                                         
                                                                                                                            } 
                                                                                                                            else
                                                                                                                            {
                                                                                                                        ?>
                                                                                                       <div class="col-12 bb ">
                                                                                                        
                                                                                                                           <div style="width: 4%;float: left;padding: 0px;height: 30px;">
                                                                                                                                 <i class="fa fa-linkedin" style=""></i>
                                                                                                                          </div>
                                                                                                                           <div class="icc"style="">
                                                                                                                                     <p class="ssq" style="margin-top: 5px;"><?php  echo $data3['LinkedIn']; ?></p>
                                                                                                                          </div>
                                                                                                                         
                                                                                                        </div>
                                                                                                                <?php
                                                                                                                            }
                                                                                                                        ?>
                                    
                                    
                                    
                                    
                       </div>
                   
                   
                   
                   
                   
                   
                   
                   
                       <?php 
                                    } }
                       ?>
                   </div>
    
                  
    
                                       


 <?php
 include './footer.html';
 ?>










   
</body>
</html>