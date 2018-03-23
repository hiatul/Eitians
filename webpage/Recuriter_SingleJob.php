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
    
           
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_SingleJob.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
      <?php include './RecuriterHeader.php';?>
   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 5px; height:120px; ">
                                <div class="col-12" style="  padding: 0;">
                                            <ul class="breadcrumb">
                                                      <li><a href="home.php">Home</a></li>
                                            </ul>
                                    <p class="para"style="color: white;font-size: 30px;margin: 0px;" >Apply for Jobs</p>
                                </div>

             
                     </div>
                
                    <div class="col-12" style="height: auto;padding-top: 0px;padding-top: 10px;">
                      <?php          
                       if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                         
                                include './../Connection/connect.php';

                              if($connection==1)
                                       {      $command="Select Title,Location,Category,Type,Experience,Salary,Tags,Description,Deadline,Shift,JobSpec,TechGuide,Rid,Jid,DATE(PostDate) AS PostDate from  jobpost WHERE Jid=$Jid and Rid=$Rid";
                                               $result=$con->query($command);
                                                 $row=$result->num_rows;
                                         if( $row>0)
                                        {     
                                               while($row =$result->fetch_assoc())
                                               {  ?>

                                       

                        
                        
                               <div class="col-8" style="height: auto;padding: 0px;">
                                        <div style="padding: 0;margin: 0;height:auto;">
                                        <p style="font-size: 28px;font-family: global6;padding: 0px;margin: 0px;"><?php echo $row['Title']; ?></p>
                                        </div>
                                   
                                    <div class="col-9" style="padding: 0px; height: auto;margin-top: 5px; ">
                                       
                                      <div class="col-2" style="padding: 0px;">
                                          <p class="smallheader"><i class="fa fa-location-arrow" style="color: #357ebd;"></i> <?php echo $row['Location']." ";?></p>
                                        </div>
                                    
                                          <div class="col-2" style="padding: 0px;">
                                              <p class="smallheader"><i class="fa fa-dollar" style="color: #357ebd;"></i> <?php echo $row['Salary']." ";?></p>
                                         </div>
                                        
                                      <div class="col-2" style="padding: 0px;">
                                                <p class="smallheader"><i class="fa fa-clock-o" style="color: #357ebd;"></i> <?php echo $row['Type']." ";?></p>
                                         </div>
                                        <div class="col-2" style="padding: 0px;">
                                                <p class="smallheader"><i class="fa fa-calendar-o" style="color: #357ebd;"></i> <?php echo $row['Deadline']." ";?></p>
                                         </div>
                                        </div>

                                     
                                       <div class="col-12" style="height: auto; padding: 0px;margin-top: 20px;">
                                           <p  class="headin"style="font-size: 20px;">Job Description</p>
                                           <p style="font-family: global6;font-size:12px;">
                                               <?php echo $row['Description']." ";?>
                                               
                                           </p>
                                       </div>
                                       
                                      
                                         <div class="col-12" style="height: auto; padding: 0px;">
                                             <p class="headin"style="font-size:20px;">
                                               Job Specification
                                           </p>
                                           <p style="font-family: global6;font-size:12px;">
                                                 <?php echo $row['JobSpec']." ";?>
                                               
                                           </p>
                                       </div>
                                       
                                       
                                       
                                         <div class="col-12" style="height: auto; padding: 0px;">
                                             <p  class="headin">
                                               Technical Guidance
                                           </p>
                                             
                                           <p style="font-family: global6;font-size:12px;">
                                                <?php echo $row['TechGuide']." ";?>
                                               
                                           </p>
                                       </div>
                                    
                               </div>
                        
                            <div class="col-4" style="height: auto;padding: 0px;margin-top: 30px;">
                             <form method="GET" action="Recuriter_Dashboard_Active_Job.php" style="padding: 0px;margin: 0px;">
                                              <button  class="col-10 submitbtn" type="submit" value="DeleteJob" name="DeleteJob">Delete Job <i class="fa fa-angle-right"></i></button>
                                              <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                               <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                              </form>
                            
                        <div class="col-10 boxshad">
                            
                            <p  class="headin"style="font-size: 18px;">Job Details</p>
                       
                            <div class="col-12 dd">
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Job Experience:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><i class="fa fa-clock-o"style="color: #357ebd;"></i> <?php echo $row['Experience']." ";?></p>
                            </div>
                            </div>
                            
                            
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Job Shift:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><i class="fa fa-clock-o" style="color: #357ebd;"></i> <?php echo $row['Shift']." ";?></p>
                            </div>
                            </div>
                            
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Posted On:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><i class="fa fa-calendar" style="color: #357ebd;"></i> <?php echo $row['PostDate']." ";?></p>
                            </div>
                            </div>
                            
                            <div class="col-12 dd"style="border: none;" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Expected Salary:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><i class="fa fa-dollar" style="color: #357ebd;"></i> <?php echo $row['Salary']." ";?></p>
                            </div>
                            </div>
                            
                            
                            
                            
                            
                        </div>

                        <div class="col-10 boxshad" style=" margin-top: 40px;float: right;">
                            
                            <?php
                            
                             if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                         
                                include './../Connection/connect.php';

                              if($connection==1)
                                       {    $command11="SELECT * FROM recruitercompany WHERE Rid=$Rid";
                                            $result1=$con->query($command11);
                                            if($data=$result1->fetch_assoc())
                                            
                                            {    /////for logo //////
                                                $commandl="Select Logo from  recruitersignup WHERE Rid=$Rid";
                                                $resultl=$con->query($commandl);
                                                $datal=$resultl->fetch_assoc();
                                            }
                                       }
                            ?>
                            
                            <div class="col-12" style=" height: 150px;padding: 0;"> 
                                <img src='<?php echo $datal['Logo']; ?>' style="height: 100%; width: 100%;padding: 10px;">
                            </div>
                            <div style="text-align: center;">
                                <p class="headin"style="font-size: 18px;">Company Details</p>
                            </div>
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Name:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><?php echo $data['CompanyName']." ";?></p>
                            </div>
                            </div>
                            
                            
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Industry:</p>
                            </div>
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt"><?php echo $data['Industry']." ";?></p>
                            </div>
                            </div>
                            
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Phone:</p>
                            </div>
                            <div style="width:50%;height: auto;float: left;">
                                <p class="ddtxt"><?php echo $data['Phone']." ";?></p>
                            </div>
                            </div>
                            
                           
                            <div class="col-12 dd" style="border: none;">
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Address:</p>
                            </div>
                            <div style="width:50%;height: auto;float: left;">
                                <p class="ddtxt"><?php echo $data['Address']." ";?></p>
                            </div>
                            
                        </div>
                            </div>

                    </div>
                        <?php
                                        } }
                        }
                        ?>
                    </div>

             <!-- The actual snackbar -->
<div id="snackbar">Some text some message..</div>

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "Recuriter_SingleJob.php";},3000);
     
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard_Active_Job.php";},3000);
        }
        
       
</script>
                        
                        
    
<?php

if(isset($_GET['DeleteJob']))
      {   
             include './../Connection/connect.php';
             if($connection==1)
               {                 
               $command="DELETE FROM jobpost WHERE Jid=$Jid and Rid=$Rid";
               $result=$con->query($command);
               echo '<script type="text/javascript">','myFunction("Job has been Deleted...");','</script>';
                                  echo '<script type="text/javascript">','ref();','</script>';
                    }
        }               

?>


 <?php
 include './footer.html';
 ?>










   
</body>
</html>