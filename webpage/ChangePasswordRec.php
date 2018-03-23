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
        $Email= $_SESSION['OEmail'];
        
        $commandss="Select * from  recruitersignup where OEmail='$Email'";
                        $m2=$con->query($commandss);
                            
        
        if (strlen($Password) <= '8') {
            $_SESSION['PassErr'] ="Your password must contain At Least 8 characters!";
                      header('location:Recuriter_settings.php');

        }
        elseif(!preg_match("#[0-9]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                      header('location:Recuriter_settings.php');

            
        }
        elseif(!preg_match("#[A-Z]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                        header('location:Recuriter_settings.php');

        }
        elseif(!preg_match("#[a-z]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                    header('location:Recuriter_settings.php');

        }
        
        else
        {
            
                    if($data2=$m2->fetch_assoc())
                        {
                                    if($data2['Password']!=$OPassword)
                                    {
                                        $_SESSION['PassErr'] ="Old Password did not match.";
                                       header('location:Recuriter_settings.php');
                                    }
                                    
                                    else
                                    {
                                                       $command="Update recruitersignup set Password='$Password' where OEmail='$Email'";
                                                    if($con->query($command)=="TRUE")
                                                    {
                                                        session_destroy();
                                                        header('location:home.php');   
                                                    }
                                    }
                                    
                        }
                    else
                    {
                            header('location:Recuriter_settings.php');
                    }
            
        }
    }
    

?>
