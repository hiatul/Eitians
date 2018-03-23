<?php
$connection=0;
$Type1="authentication";
$Type2="resetpassword";
//$con=new mysqli("localhost","root","","enolimits");        
$con=new mysqli("telpherpoint.ipagemysql.com","n_v_v_1234","12345","enolimits");
if($con->connect_error)
    {
    die("Connection failed:" . $con->connect_error);
    }else{
        $connection=1;
    }
?>