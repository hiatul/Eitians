<?php
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    $_SESSION['Title']="";
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
    }
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
    
   $_SESSION['Title']="";
    $Rid=$_GET['Rid'];
    $Jid=$_GET['Jid'];
    $path = "../DirectResume/";
    $resumename="";
        
   
  
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_SingleJob.css">
    <link rel="stylesheet" type="text/css" href="../css/Applicant_SingleJob_Apply.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>

</style>
<script type="text/javascript">

 function fileName()
        {
            var x=document.getElementById("file-upload").value;
            document.getElementById("FileName").innerHTML=x+"<p style=\"margin: 0px; padding: 0px; float: right;background: grey; color: white;\">Browse</p>";
        }
</script>
</head>
<body>
      <?php 
   if(($_SESSION['LoginStatus']=="0")&&($_SESSION['RecLoginStatus']=="0"))
   {
    include './header.php';
   }
   elseif($_SESSION['RecLoginStatus']=="1"){
    include './RecuriterHeader.php';   
   }
   else
   {
    include './ApplicantHeader.php';
   }
 
   ?>
  

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

                                       
                                               <?php $_SESSION['Title']=$row['Title'];?>
                        
                        
                               <div class="col-8" style="height: auto;padding: 0px;">
                                        <div style="padding: 0;margin: 0;height:auto;">
                                        <p style="font-size: 28px;font-family: global6;padding: 0px;margin: 0px;"><?php echo $_SESSION['Title'];?></p>
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
                                                <p class="smallheader"><i class="fa fa-calendar-o" style="color: #357ebd;"></i> <?php echo $row['PostDate']." ";?></p>
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
                            
                                <div class="col-10 boxshad" style="padding: 0px;">
                            <div style="clear: both;padding: 18px;">
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
                                <p class="ddtxt">Apply Before:</p>
                            </div>
                            <div style="width:50%;height: auto;float: left;">
                                <p class="ddtxt"><i class="fa fa-calendar" style="color: #357ebd;"></i> <?php echo $row['Deadline']." ";?></p>
                            </div>
                            </div>
                            
                            <div class="col-12 dd"style="border: none;" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Expected Salary:</p>
                            </div>
                            <div style="width:50%;height: auto;float: left;">
                                <p class="ddtxt"><i class="fa fa-dollar" style="color: #357ebd;"></i> <?php echo $row['Salary']." ";?></p>
                            </div>
                            </div>
                            
                            </div>
                            
                            <div style="clear: both; overflow: hidden; padding: 18px; background: gainsboro;">
                                                   
                            <p style=" clear: both; float: none; margin: auto;">If you are interested in this job, feel free to submit your info to the employer.</p>
                       <form method="POST" enctype="multipart/form-data" action="">
                           <p style="color: red;"><?php echo $_SESSION['error'];?></p>
                           <input type="hidden" name="Rid" value="<?php echo $Rid;?>">
                           <input type="hidden" name="Jid" value="<?php echo $Jid;?>">
                            <p class="message_p">Your Name*</p>
                            <input type="text" name="name" class="inp" value="<?php echo @$_SESSION['DName'];?>" required>
                            
                            <p class="message_p">Message*</p>
                            <textarea type="text" name="message"  class="inp" required>I'm interested on the '<?php echo $row['Title'];?>' job posted at www.emolimits.com</textarea>
                            
                            <p class="message_p">Phone*</p>
                            <input type="number" name="phone" class="inp" value="<?php echo @$_SESSION['DPhone'];?>" required>
                            
                            <p class="message_p">Email*</p>
                            <input type="text" name="email" class="inp" value="<?php echo @$_SESSION['DEmail'];?>" required>
                            
                            <div class="" style="width: 100%; border-radius: 4px; margin-top: 20px; background: white;">
                            <label for="file-upload" class="" id="FileName" style="display: inline; padding-left: 5px; border-right: 4xp; font-weight: bold; margin-bottom: 20px;">
                                Upload Resume
                                <p style="margin: 0px; padding: 0px; float: right;background: grey; color: white;">Browse</p>
                            </label>
                                <input id="file-upload" onchange="fileName()" style="display: none;" type="file" name="Resume">
                        </div>
                           
                            <button type="submit" name="ApplyDirect" class="btn">Submit</button>
                       </form>  
                                
                            <p style=" clear: both; float: none; color: black; margin-top: 20px; margin-bottom: 0px;">*If already registered.</p>

                            
                            </div>
                                                       
                            
                        </div> 
                         <form method="GET" action="Applicant_SingleJOb_Apply.php">
                                          <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                          <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                           <button class="col-10 submitbtn" type="submit" value="Submit" name="ApplyNow">Apply Now <i class="fa fa-angle-right"></i></button>
                              </form>
        
                                
                                
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
                            <div style="width:50%;height: auto;float: left;">
                                <p class="ddtxt"><?php echo $data['CompanyName']." ";?></p>
                            </div>
                            </div>
                            
                            
                            <div class="col-12 dd" >
                            <div style="width:50%;height: 30px;float: left;">
                                <p class="ddtxt">Industry:</p>
                            </div>
                            <div style="width:50%;height: auto;float: left;">
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
    
        

<div id="snackbar">Some text some message..</div>     
<!-- The actual snackbar -->

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "home.php";},3000);
     
}

function myFunction2(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "Applicant_SingleJOb_Apply.php";},3000);
        }
        
         function ref2(x)
        {
            refresh = setTimeout(function(){window.location.href = "Applicant_SingleJOb_Apply.php";},3000);
            
        }
         
</script>
    

<?php

if(isset($_POST['ApplyDirect']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];
    $message=str_replace("'","''",$message);
    $link="";
    $_SESSION['error']="";
    
    $_SESSION['DName']="";
    $_SESSION['DEmail']="";
    $_SESSION['DPhone']="";
    
    
        if(empty($name))
        {
            $_SESSION['error']="Please enter your name";
        }
    elseif(!((strlen($phone)>9)&&(strlen($phone)<17))) 
            {
                $_SESSION['error']="Please enter correct Phone number";
                $_SESSION['DName']=$name;
                
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)||empty($email))
        {
                        $_SESSION['DName']=$name;
                        $_SESSION['DPhone']=$phone;
                        $_SESSION['error']="Please enter correct Email address";
        }
    
    else{
         $_SESSION['error']="";
                $_SESSION['DName']=$name;
                $_SESSION['DEmail']=$email;
                $_SESSION['DPhone']=$phone;
                              $filename=$_FILES['Resume']['name'];
                              $size = $_FILES['Resume']['size'];
                              $date = date('Y-m-d H:i:s');
                              
                        $valid_formats = array("doc", "docx", "pdf", "rtf"); 
                        if (!empty($filename)) {
                            
                                    list($txt, $ext) = explode(".", $filename);
                                                if(in_array($ext,$valid_formats))
                                                {
                                                    echo "1";
                                                    if( $size<(2*(1024*1024)))
                                                    {
                                                        echo "2";
                                                        $command2="SELECT * FROM Directresume";
                                                        $result2=$con->query($command2);
                                                        $resumename=$result2->num_rows+1;
                                                        echo "3";
                                                                $actual_image_name =$resumename.".".$ext;
                                                                $tmp = $_FILES['Resume']['tmp_name'];
                                                                echo "4";
                                                                
                                                                    if(move_uploaded_file($tmp, $path.$actual_image_name))
                                                                                    {
                                                                                    echo "5".$resumename;
                                                                                    $command="Insert into Directresume (Jid,Rid,Name,Email,Message,Phone,Path,Date) values($Jid,$Rid,'$name','$email','$message','$phone','$path$actual_image_name','$date')" ;
                                                                                   // echo "Insert into Directresume (Jid,Rid,Name,Email,Message,Phone,Path,Date) values($Jid,$Rid,'$name','$email','$message','$phone','$path$actual_image_name','$date')" ;

                                                                                        if($con->query($command)===TRUE){
                                                                                            $_SESSION['Logo']=$path.$actual_image_name;
                                                                                            
                                                                                             $headers = 'MIME-Version: 1.0' . "\r\n";
                                                                                            $headers .= 'Content-type:text/html;charset=iso-8859-1' . "\r\n";
                                                                                            $headers .= "From: Enolimits.com\r\n";
                                                                                            $subject2="Job Applied Success";
                                                                                            $message3="<h2>Dear $name,</h3><br><h3>This is a conformation mail that you have sucessfully Applied for the Job Post ";
                                                                                            $message3.=$_SESSION['Title'];
                                                                                            $message3.=".<br>Please Do not respond to this mail.</h3>";
                                                                                            mail($email,$subject2,$message3,$headers);  

                                                                                            $command2="SELECT * FROM recruitersignup where Rid=$Rid";
                                                                                            $result2=$con->query($command2);
                                                                                            if($Rdata=$result2->fetch_assoc()){
                                                                                                
                                                                                            $Remail=$Rdata['OEmail'];
                                                                                            $Rname=$Rdata['FirstName']." ".$Rdata['LastName'];
                                                                                            $subject3="New Applicant Applied Directly";
                                                                                            $message4="<h2>Dear $Rname,</h3><br><h3>$message</h3>";
                                                                                            mail($Remail,$subject3,$message4,$headers);
                                                                                            
                                                                                            echo '<script type="text/javascript">','myFunction("Information Sent Sucessfully");','</script>';
                                                                                            }
                                                                                        }
                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    $_SESSION['error']="Opps Upload Failed Try again...!";
                                                                                    echo '<script type="text/javascript">','myFunction2("Upload Failed");','</script>';

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
                                echo '<script type="text/javascript">','myFunction2("Please select a file..!");','</script>';

                    }
    }   
}


 if(isset($_GET['ApplyNow']))
    {
        if($_SESSION['LoginStatus']=="0")
        {
            $_SESSION['PassErr']="Please Login to Apply for a Job";
            echo '<script>document.location.replace("ApplicantLogin.php");</script>';        

        }  
        elseif($_SESSION['ResumeUploadCount']=="0")
        {
             $_SESSION['error']="Please Upload Your Resume to Apply for a Job";
            header('location:ApplicantDashboard.php');
            echo '<script>document.location.replace("ApplicantDashboard.php");</script>';        

            
        }
        elseif($_SESSION['ResumeUploadCount']!="0")
        {
            include './../Connection/connect.php';
            
            if($connection==1){
            $date = date('Y-m-d H:i:s');
            $Id=$_SESSION['Id'];
            $Rid=$_GET['Rid'];
            $Jid=$_GET['Jid'];
            $command2="Select Aid,Jid from applicantapplied where Jid=$Jid AND Aid=$Id";
            $result=$con->query($command2);
            
                if($result->num_rows == 0)
                {    
                       
                          $command7="SELECT * FROM resume WHERE Aid=".$_SESSION['Id']."";
                                          $result7=$con->query($command7);
                                           if($data7=$result7->fetch_assoc()){
                                               
                                               
                        $command="Insert into applicantapplied(Aid,Rid,Jid,ApplyDate,ResumePath) values(".$_SESSION['Id'].",$Rid,$Jid,'$date','".$data7['Path']."')";
                            if($result=$con->query($command)=="TRUE")
                            {
                                 $_SESSION['error']="";
                                 echo '<script type="text/javascript">','myFunction("Applied Sucessfully...");','</script>';
                            //echo '<script type="text/javascript">','ref();','</script>';
                                 
                            }
                            else {
                               
                            }
                      
                
                        }
//                        else{
//                            $_SESSION['error']="Please Upload Resume And Complete Your Profile";
//                            header('location:ApplicantLogin.php');
//                        }
                
                }
                else{
                   echo '<script type="text/javascript">','myFunction("Already Applied ...");','</script>';
                }
                
                echo $error;
            }
    }
    
                }
    

?>



 <?php
 include './footer.html';
 ?>










   
</body>
</html>