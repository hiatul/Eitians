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
        $Email=$_SESSION['RPEmail'];
        $Password=$_POST['Password'];
        $CPassword=$_POST['CPassword'];
        
        if (strlen($Password) <= '8') {
            $_SESSION['PassErr'] ="Your password must contain At Least 8 characters!";
                        header('location:RecSetNewPassword.php');

        }
        elseif(!preg_match("#[0-9]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                        header('location:RecSetNewPassword.php');

            
        }
        elseif(!preg_match("#[A-Z]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                        header('location:RecSetNewPassword.php');

        }
        elseif(!preg_match("#[a-z]+#",$Password)) {
            $_SESSION['PassErr'] ="Your password must contain Number,Capital Letter and Lowercase Letter";
                       header('location:RecSetNewPassword.php');

        }
        elseif(!($CPassword==$Password))
        {
            $_SESSION['PassErr'] ="Confirm Password did not match.";
            header('location:RecSetNewPassword.php');
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
    

?>
