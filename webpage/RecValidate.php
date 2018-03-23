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
                    $command2="Update recruitersignup set Verify='1' where OEmail='$Email'";
                    if($con->query($command2)=="TRUE")
                    {
                        $command3="Select FirstName,LastName from recruitersignup where OEmail='$Email'";
                        $m2=$con->query($command3);
                            if($data2=$m2->fetch_assoc())
                            {
                                session_unset();
                                
                                $_SESSION['FirstName']=$data2['FirstName'];
                                $_SESSION['LastName']=$data2['LastName'];
                                $_SESSION['Email']=$Email;
                                
                                
                                
                                $command4="delete from tokens where Email='$Email' and Type='authentication'";
                                if($con->query($command4))
                                {         $_SESSION['RecPassErr']="Registered Sucessfully, Login to continue";
                                        header('location:Recuriter_Login.php');
                                }   
                                
                                
                            }
                        
                    }
                    
                }
        }
}
