<?php
date_default_timezone_set('Asia/Kolkata');

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
//   echo $_SESSION['RecLoginStatus'];
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
        header('location:home.php');
    }
     elseif($_SESSION['RecLoginStatus']=="0")
   {
     header('location:home.php');
   }
else{
$error="";

$_SESSION['JobTitle']="";
$_SESSION['Location']="";
$_SESSION['JobCat']="";

$_SESSION['JobType']="";
$_SESSION['JobExp']="";
$_SESSION['ExpSal']="";
$_SESSION['Tags']="";
$_SESSION['jobdesc']="";
$_SESSION['Deadline']="";
$_SESSION['Shift']="";
$_SESSION['JobSpec']="";
$_SESSION['TechGuide']="";



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
   

      <!--Google Loation autocomplete-->   
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyCDC1VIuedy_5zdEluB3HNiqESWVkSp9Jk"></script>

 
    
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
   
    <style>

</style>
<script type="text/javascript">
    function chnng()
    {
        document.getElementById("PostJob").style.backgroundColor="#357ebd";
        document.getElementById("PostJob").style.borderLeft="6px solid gray";
         document.getElementById("PostPara").style.color="white";
         document.getElementById("Posticon").style.color="white";
        
    }
    
  
   
</script>
</head>
<body onload="chnng()">
    
    <?php include './RecuriterHeader.php';?>
  
        
                     <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                                <div class="col-12" style="  padding: 0;">
                                            <ul class="breadcrumb">
                                                 <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                                <li><a href="Recuriter_PostJob.php" style="color: white;">Post Job</a></li>
                                            </ul>
                                    <p class="para"style="color: white;font-size: 30px;" >Post Job</p>
                                </div>

             
                     </div>

    
     <div class="col-12" style="height: auto;padding-bottom: 50px;" >
                       
                       
                           <div class="col-3" style="padding: 0px;">
                           <?php
                           include '../webpage/Recuriter_Dashboard_Menu_Logo_Name.php';
                           ?>
                           
                            <?php
                           include '../webpage/Recuriter_Dashboard_Menu.php';
                           ?>
                           </div>
                           
                              
                 <div class="col-8 content"  style="">
                <div>
                <p class="headp">Post  Job</p>
               
                </div>
                <form action="" method="POST">
                    <div class="" style="clear: both;">
                            <h4 style="color: red; font-family: global6;"><?php echo $error?></h4>
                    <div class="col-6 inputpart1" style="">
                        <p class="text">Job Title *</p>
                        <input class="textinput" type="text" name="JobTitle" value=<?php echo @$_SESSION['JobTitle']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Location *</p>
                        <input type="text" name="Location" class="textinput" id="autocomplete"  value=<?php echo @$_SESSION['Location']; ?>>
                    </div>
                        
                     <div class="col-6 inputpart1" style="">
                        <p class="text">Job Category *</p>
                        <select  class="textinput"style="width:100%; color: #000;" name="JobCat" value="">
                                            <option value="0">Select Job Category</option>
                                            <option value="Transporation">Transporation</option>
                                            <option value="Restaurant, Food, Hotels">Restaurant, Food, Hotels</option>
                                            <option value="Art, Design & Multimedia">Art, Design & Multimedia</option>
                                            <option value="Healthcare & Medicine">Healthcare & Medicine</option>
                                            <option value="Laravel">Laravel</option>
                                            <option value="Software">Software</option>
                                            <option value="Information Technology">Information Technology</option>
                                            <option value="Accounting & Finance">Accounting & Finance</option>
                                            <option value="Education & Academia">Education & Academia</option>
                                            <option value="Construction, Engineering">Construction, Engineering</option>
                                            <option value="Software & Development">Software & Development</option>              
                                </select>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Job Type *</p>
                        <select class="textinput"style="width:100%; color: #000;" name="JobType" value="F">
                                   <option value="0">Select Job Type</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Remote">Remote</option>
                                    <option value="Freelancer">Freelancer</option>                
                                </select>
                    </div>
                        
                    <div class="col-6 inputpart1" style="">
                        <p class="text">Job Experience*</p>
                        <select  class="textinput"style="width:100%; color: #000;" name="JobExp" value=<?php echo @$_SESSION['JobExp']; ?>>
                            <option value="0">Select Job Experience</option>
                                    <option value="0 year">0 year</option>
                                    <option value="1 year">1 year</option>
                                           <?php
                                           for($x=2;$x<6;$x++)
                                            {
                                               ?><option value="<?php echo $x." Years";?>">
                                                   <?php
                                                   
                                                   echo $x." Years";
                                            }
                                          ?></option>
                                    <option>> 6 Years</option>  
                                </select>
                    </div> 
                      
            
                    
                      <div class="col-6 inputpart2" style="">
                        <p class="text">Expected Salary *</p>
                        <select  class="textinput"style="width:100%; color: #000;" name="ExpSal" value=<?php echo @$_SESSION['ExpSal']; ?>>
                                     <option>Select Expected Salary</option>
                                    
                                           <?php
                                           for($x=10000;$x<60000;$x=$x+10000)
                                            {
                                               ?><option value="<?php echo $x;?>">
                                                   <?php
                                                   
                                                   echo $x." +";
                                            }
                                          ?></option>
                                    <option>100,000 +</option>  
                                    <option>Negotiable</option>                
                                </select>
                    </div>
                            
                         <div class="col-6 inputpart1" style="">
                        <p class="text">Job Shift*</p>
                        <select  class="textinput"style="width:100%; color: #000;" name="Shift" value=<?php echo @$_SESSION['Shift']; ?>>
                            <option value="0">Select Job Experience</option>
                                    <option value="Morning">Morning</option>
                                    <option value="Night">Night</option>
                                    
                                </select>
                    </div> 
                      
            
                    
                      <div class="col-6 inputpart2" style="">
                        <p class="text">Job Deadline *</p>
                        <input class="textinput" type="date" name="Deadline" value=<?php echo @$_SESSION['Deadline']; ?>>
                    </div>
                            
                        
                        <div class="col-12 inputpart1" style="">
                        <p class="text">Tags</p>
                        <input class="textinput" type="text" name="Tags" value=<?php echo @$_SESSION['Tags']; ?>>
                        </div>
                        
                        <div class="col-12 inputpart1" style="">
                        <p class="text">Job Description</p>
                        <textarea class="textinput textarea" type="textarea" style="height: 120px;padding-top: 0px;margin-top: 0px;"   name="jobdesc"  value=<?php echo @$_SESSION['jobdesc']; ?>></textarea>
                        </div>   
                           
                         <div class="col-12 inputpart1" style="">
                        <p class="text">Job Specification</p>
                        <textarea class="textinput textarea" type="" style="height: 120px;padding-top: 0px;margin-top: 0px;"  name="JobSpec"  value=<?php echo @$_SESSION['JobSpec']; ?>></textarea>
                        </div>      
                        
                          <div class="col-12 inputpart1" style="">
                        <p class="text">Technical Guidance</p>
                        <textarea class="textinput textarea" type="text" style="height: 120px;padding-top: 0px;margin-top: 0px;"  name="TechGuide"  value=<?php echo @$_SESSION['TechGuide']; ?>></textarea>
                        </div>     
                            
                  <button class="col-3 submitbtn" type="submit" value="Submit" name="postjob">Post Job <i class="fa fa-angle-right"></i></button>
                   
                                
                
                

            </div>
                    </form>
            </div>
                           
           </div>
                  
    
    <!--Google places autocomplete-->
        <script>
            var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,options);
    </script>

             <!-- The actual snackbar -->
<div id="snackbar">Some text some message..</div>

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "Recuriter_PostJob.php";},3000);
     
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard_Active_Job.php";},3000);
        }
        
       
</script>  
    
    
<?php
if(isset($_POST['postjob']))
{
  include './../Connection/connect.php';
    if($connection==1)
    {
        
        
        $Table="";
        $JobTitle=$_POST['JobTitle'];
        $Location=$_POST['Location'];
        $JobCat=$_REQUEST['JobCat'];
        $JobType=$_REQUEST['JobType'];
        $JobExp=$_REQUEST['JobExp'];
         $ExpSal=$_REQUEST['ExpSal'];
         $Tags=$_POST['Tags'];
         $jobdesc=$_POST['jobdesc'];
         $Deadline=$_POST['Deadline'];
         $Shift=$_POST['Shift'];
         $JobSpec=$_POST['JobSpec'];
          $TechGuide=$_POST['TechGuide'];
         $Rid=$_SESSION["Rid"];
          $date = date('Y-m-d H:i:s');
           $Flag=1;
      
        
        if(empty($JobTitle)){
            $error="Job Title should only contains characters";
            }
        elseif (empty ($Location)) {
            $error="Location should only contains characters";
            $_SESSION['JobTitle']=$JobTitle;
            }
        elseif(isset($_REQUEST['JobCat']) && $_REQUEST['JobCat'] == '0')
          { 
              $error= 'Please Fill all fields.'; 
               $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
              
          } 
          elseif(isset($_REQUEST['JobType']) && $_REQUEST['JobType'] == '0')
          { 
              $error= 'Please Fill all fields.'; 
               $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 
          } 
          elseif(isset($_REQUEST['JobExp']) && $_REQUEST['JobExp'] == '0')
          { 
              $error= 'Please Fill all fields.'; 
              $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
          } 
          elseif(isset($_REQUEST['ExpSal']) && $_REQUEST['ExpSal'] == '0')
          { 
              $error= 'Please Fill all fields.'; 
              $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
          } 
           elseif(isset($_REQUEST['Shift']) && $_REQUEST['Shift'] == '0')
          { 
              $error= 'Please Fill all fields.'; 
              $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
          } 
          elseif(empty ($_POST['Deadline']))
          { 
              $error= 'Please Fill all fields.'; 
              $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
                      $_SESSION['Shift']=$_REQUEST['Shift'];
          } 
          elseif (empty ($Tags)) {
            $error='Please Fill all fields.';
       $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
                $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
                      $_SESSION['Deadline']=$_POST['Deadline'];
                      $_SESSION['Shift']=$_REQUEST['Shift'];
            }
            elseif (empty ($jobdesc)) {
            $error='Please Fill all fields.';
           $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
               $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
                     $_SESSION['Deadline']=$_POST['Deadline'];
                      $_SESSION['Shift']=$_REQUEST['Shift'];
                       $_SESSION['Tags']=$_POST['Tags'];
                       
            }
             elseif (empty ($JobSpec)) {
            $error='Please Fill all fields.';
           $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
               $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
                     $_SESSION['Deadline']=$_POST['Deadline'];
                      $_SESSION['Shift']=$_REQUEST['Shift'];
                       $_SESSION['Tags']=$_POST['Tags'];
                       $_SESSION['jobdesc']=$_POST['jobdesc'];
                       
            }
             elseif (empty ($TechGuide)) {
            $error='Please Fill all fields.';
           $_SESSION['JobTitle']=$_POST['JobTitle'];
               $_SESSION['Location']=$_POST['Location'];
               $_SESSION['JobCat']=$_REQUEST['JobCat'];
                 $_SESSION['JobType']=$_REQUEST['JobType'];
                    $_SESSION['JobExp']=$_REQUEST['JobExp'];
                     $_SESSION['ExpSal']=$_REQUEST['ExpSal'];
                     $_SESSION['Deadline']=$_POST['Deadline'];
                      $_SESSION['Shift']=$_REQUEST['Shift'];
                       $_SESSION['Tags']=$_POST['Tags'];
                        $_SESSION['jobdesc']=$_POST['jobdesc'];
                         $_SESSION['JobSpec']=$_POST['JobSpec'];
                       
            }
        else{        
           $command="Insert into jobpost(Title,Location,Category,Type,Experience,Salary,Tags,Description,Rid,Flag,Deadline,Shift,JobSpec,TechGuide,PostDate) values('$JobTitle','$Location','$JobCat','$JobType','$JobExp','$ExpSal','$Tags','$jobdesc',$Rid,$Flag,'$Deadline','$Shift','$JobSpec','$TechGuide','$date')";
            if($result=$con->query($command))
            {
                  echo '<script type="text/javascript">','myFunction("Job has been Posted...");','</script>';
                                  echo '<script type="text/javascript">','ref();','</script>';
            }
            else {
               
            }
        }

    }
        
}

?>
    
 <?php
 include './footer.html';
}
 ?>




   
</body>
</html>