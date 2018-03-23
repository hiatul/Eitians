<?php
include('../Connection/connect.php');
session_start();
$session_id='1'; // Session_id
$t_width = 100;	// Maximum thumbnail width
$t_height = 100;	// Maximum thumbnail height
$new_name = $_SESSION['OEmail'].$_SESSION['Rid'].".jpg"; // Thumbnail image name
$path = "../Recruiter_pic/";
if($connection==1)
{


    if (file_exists($path.$new_name)) 
                        {
                             unlink($path.$new_name);
                    }
                $x1=$_GET['x1'];
                $y1=$_GET['y1'];
                $width=$_GET['width'];
                $height=$_GET['height'];
                $img=$_GET['img'];
                
                $ratio = ($t_width/$width); 
		$nw = ceil($width * $ratio);
		$nh = ceil($height * $ratio);
		$nimg = imagecreatetruecolor($nw,$nh);
		$im_src = imagecreatefromjpeg($path.$img);
                
		imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$width,$height);
		imagejpeg($nimg,$path.$new_name,90);
		$command="UPDATE recruitersignup SET Logo='$path$new_name' WHERE Rid=".$_SESSION['Rid']."" ;
                if($con->query($command)===TRUE){
                    $_SESSION['Logo']=$path.$new_name;
                }
		exit;
	
}	
	?>