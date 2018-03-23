<?php
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    $_SESSION['LoginStatus']="0";
include '../Connection/connect.php';
if($connection==1)
{
    $code2=$_GET['data'];
    $command="Select Value,Email from tokens where Type='$Type1'";
    $m=$con->query($command);
        while(($data=$m->fetch_assoc()))
        {
                   $code=$data['Value'];
            
                if ($code2==$code)
                {
                    $Email=$data['Email'];
                    $command2="Update applicant set Flag='1' where Email='$Email'";
                    if($con->query($command2)=="TRUE")
                    {
                        $command3="Select Id,FirstName,LastName from applicant where Email='$Email'";
                        $m2=$con->query($command3);
                            if($data2=$m2->fetch_assoc())
                            {
                                session_unset();
                                
                                $_SESSION['FirstName']=$data2['FirstName'];
                                $_SESSION['LastName']=$data2['LastName'];
                                $_SESSION['Email']=$Email;
                                $_SESSION['Id']=$data2['Id'];
                                $_SESSION['LoginStatus']="1";
                                $_SESSION['Profile']=$data['Profile'];
                                $_SESSION['Resume']=$data['Resume'];

                                  if($_SESSION['Profile']==0){
                                  header('location:ApplicantEditProfile.php');
                                  }
                                  elseif ($_SESSION['Resume']==0) {
                                  header('location:ApplicantBuildResume.php');
                              }
                                
                                $command4="delete from tokens where Email='$Email' and Type='authentication'";
                                if($con->query($command4))
                                {         $_SESSION['PassErr']="Registered Sucessfully, Login to continue";
                                        header('location:ApplicantLogin.php');
                                }   
                                
                                
                            }
                        
                    }
                    
                }
        }
}
