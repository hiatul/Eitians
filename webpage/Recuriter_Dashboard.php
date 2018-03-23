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
   
    $Rid=$_SESSION["Rid"];
    include './../Connection/connect.php';
     $Count;
     $Res;
     $path = "../Recruiter_pic/";
    if($connection==1)
            {       
              $command="SELECT * FROM jobpost WHERE Rid=$Rid";
              $result=$con->query($command);
               $Count=$result->num_rows;
           
                  $command22="SELECT * FROM applicantapplied WHERE Rid=$Rid";
                   $result22=$con->query($command22);
                  $Res=$result22->num_rows;
              
              
              
                  
                }
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
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
    <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
       
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>


<script type="text/javascript">
    function chnng()
    {
        document.getElementById("Dashboard").style.backgroundColor="#357ebd";
        document.getElementById("Dashboard").style.borderLeft="6px solid gray";
         document.getElementById("DashPara").style.color="white";
         document.getElementById("Dashicon").style.color="white";
        
    }
</script>
</head>
  
<body onload="chnng()">
     
    <div id="profile_pic_modal" style="margin:0 auto; width:100%; position: absolute; z-index: 99; background: rgba(0,0,0,0.9);float: none; align-content: center;">
<?php echo $image; ?>
        
<!--<div id="thumbs" style=" width:600px"></div>                      -->
</div>
    
    
   
    <?php include './RecuriterHeader.php';?>
   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 10px; height:auto; ">
                    <div class="col-6" style="  padding: 0;height: 150px;">
                                <ul class="breadcrumb">
                                          
                                          <li><a href="Recuriter_Dashboard.php"style="color: white;">Dashboard</a></li>
                                          
                                </ul>
                            <p class="para"style="color: white;font-size: 40px;padding: 0px;padding-bottom: 10px;margin: 0px;margin-top: 20px;" > <?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
             
                     </div>
               <div class="col-6" style="  padding: 0;height: auto;">
                   <div  style="width: 120px;float: left;border-radius: 60%;height: 120px;margin: 0px;padding: 0px;background:#f1f1f1;border:8px solid white ; margin-top: 8px;">
                      
                       <p style="color:#357ebd;font-family: global6;font-size: 25px;padding: 0px;margin: 0px;text-align: center;margin-top: 8px;"><b><?php echo $Count;?></b></p>
                       <p style="color:#357ebd;font-family: global6;font-size: 15px;padding: 0px;margin: 0px;text-align: center;margin-top: 5px;">
                       Job Posted
                       </p>
                       
                   </div>
                   
                   <div style="margin-left:20px; width: 120px; float: left;border-radius: 60%;height: 120px;padding: 0px;background: white;border:8px solid #f1f1f1; margin-top: 8px;">
<!--                       <img src="../icons/pppp.svg" height="45" width="45" style="margin-left: 40px;margin-top: 10px;">-->
                       <p style="color:#357ebd;font-family: global6;font-size: 25px;padding: 0px;margin: 0px;text-align: center;margin-top: 8px;"><b><?php echo $Res;?></b></p>
                       <p style="color:#357ebd;font-family: global6;font-size: 15px;padding: 0px;margin: 0px;text-align: center;margin-top: 5px;">New Resume</p>
                       
                   </div>
                       
              </div>
                 
                  
              </div>
             
          
    
                   <div class="col-12" style="height: auto;" >
<!--                       <div class="col-10" style="float: none;margin: auto;height: auto;padding: 0px;margin-top: 50px;">-->


<div class="col-3" style="padding: 0px;">
                            <?php
//                           include '../webpage/Recuriter_Dashboard_Menu_Logo_Name.php';
                            $command2="SELECT * FROM recruitercompany WHERE Rid=".$_SESSION['Rid']."";
                                              $result11=$con->query($command2);
                                              if($data11=$result11->fetch_assoc()){}
                           ?>
                            
                            
                            <!--///////testing////////////////////////////-->
                            
                            <div class="col-12" style="padding: 0px; border-radius:2px;margin-bottom: 20px;border: 1px solid lightgray;">
                               <div class="col-12 sidebar1" style=" height: 200px;padding: 0px;">
                                   <img src='<?php echo $_SESSION['Logo']; ?>' style="height: 80%; width: 80%;margin-top: 5%;margin-left: 10.5%;">
                                        
                                   <div  title="Update Company Logo"class="fu" style="background: white;height: 30px;width: 30px;position: relative;float: right;margin-right:10px;margin-top:-20px;border-radius:50%;">
                                       <form id="cropimage" enctype="multipart/form-data" method="post">
                                           <label for="upload" class="" style="background: white;">
                                               <img class="cursor" src="../icons/picture.svg" height="25" width="25">
                                           </label>
                                       <input id="upload" class="fu__input cursor" name="photoimg" type="file"  onchange="javascript:this.form.submit();">                                       
                                       </form>
                                    </div>
                                            
                                   
                                </div>
                               <div class="col-12 sidebar1" style="height: 50px; border-bottom: none;">
                                   <p class="para" style="text-align: center;padding: 0px;"><?php echo $data11['CompanyName']; ?></p>
                               </div>
                              
                           </div>
                            
                            <!--//////////////////////////////////////////////-->
                            
                           <?php
                           include '../webpage/Recuriter_Dashboard_Menu.php';
                           ?>
                        </div>
      
                           <div class="col-8 content" style="padding-top: 0px;margin-top: 0px;">
                               
                               <p class="profile">Profile Details</p>
                               
                               <?php
                               if($_SESSION['RecProfile']==1)
                                    {   

                                          include './../Connection/connect.php';
                                           if($connection==1)
                                                {
                                                  $command="SELECT * FROM recruitercompany WHERE Rid=$Rid";
                                                  $result=$con->query($command);
                                                    if($data=$result->fetch_assoc())
                                                     { 
                                                     
                                                      ?>
                                             
                               
                                <div class="col-12" style="height: auto; padding: 0px; margin-top:20px;">
                               
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Company Name:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['CompanyName']." ";?></p>
                                             </div>
                                        </div>
                                    
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Industry Type:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Industry']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Established In:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Established']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Phone:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Phone']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">No. of Employees:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Employees']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Located:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Located']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 5px;">
                                            <div class="detailCol1" >
                                                <p class="para">Address:</p>
                                             </div>
                                            <div class="detailCol2">
                                                <p class="para"><?php echo $data['Address']." ";?></p>
                                             </div>
                                        </div>
                                    
                                        
                                   
                                    
                                   
                               </div>
                                    
                                
                                    <?php
                                       }
                                                }
                                    }
                               
                               ?>
                                </div>
                           </div>
                           
                       <!--</div>-->
                        
                        
                   
                    
                           
                           
                                           
                    
<!-- The actual snackbar -->
<div id="snackbar">Some text some message..</div>

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    
     
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard.php";},3000);
        }
        
       
</script>

 <?php
 include './footer.html';
 ?>

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
                                                                $actual_image_name = $_SESSION['OEmail'].".".$ext;
                                                                $tmp = $_FILES['photoimg']['tmp_name'];

                                                                if (file_exists($path.$actual_image_name)) {
                                                                       unlink($path.$actual_image_name);
                                                                    }
                                                                    
                                                                  
                                                                            if(move_uploaded_file($tmp, $path.$actual_image_name))
                                                                                    {

                                                                                            $command="UPDATE recruitersignup SET Logo='$path$actual_image_name' WHERE Rid=".$_SESSION['Rid']."" ;

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

</body>
</html>