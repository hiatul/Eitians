<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if(isset($_POST['Logout']))
    {
        session_destroy();
        $_SESSION['LoginStatus']="0";
        header('location:home.php');
        exit;
    }
?>

