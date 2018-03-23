<?php
include '../Connection/connect.php';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
    }
    

    if(isset($_POST['PasswordSend']))
    {
        
        $OPassword=$_POST['OPassword'];
        $Password=$_POST['NPassword'];
        $Email= $_SESSION['Email'];
        
        $commandss="Select * from applicant where Email='$Email'";
                        $m2=$con->query($commandss);
                            
        
        if (strlen($Password) <= '8') {
            $_SESSION['PassErr1'] ="Your password must contain At Least 8 characters!";
                      header('location:Applicant_settings.php');

        }
        elseif(!preg_match("#[0-9]+#",$Password)) {
            $_SESSION['PassErr1'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                      header('location:Applicant_settings.php');

            
        }
        elseif(!preg_match("#[A-Z]+#",$Password)) {
            $_SESSION['PassErr1'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                        header('location:Applicant_settings.php');

        }
        elseif(!preg_match("#[a-z]+#",$Password)) {
            $_SESSION['PassErr1'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                      header('location:Applicant_settings.php');

        }
        
        else
        {
            
                    if($data2=$m2->fetch_assoc())
                        {
                                    if($data2['Password']!=$OPassword)
                                    {
                                        $_SESSION['PassErr'] ="Old Password did not match.";
                                        header('location:Applicant_Settings.php');
                                    }
                                    
                                    else
                                    {
                                                    $command="Update applicant set Password='$Password' where Email='$Email'";
                                                    if($con->query($command)=="TRUE")
                                                    {
                                                        session_destroy();
                                                        header('location:home.php');   
                                                    }
                                    }
                                    
                        }
                    
            
        }
    }
    

?>
