<?php  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
  $_SESSION['RecLoginStatus']="0" ;
  $PassErr ="";
  include '../Connection/connect.php';
if (isset($_POST['Login'])) 
{
          $email=$_POST["OEmail"];
          $pass=$_POST["Password"];
          
       if (empty($_POST["OEmail"])) 
           {
           
            $_SESSION['RecPassErr'] = "E-mail is required";
            header('location:Recuriter_Login.php');
            
          } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
// check if e-mail address is well-formed
              $_SESSION['RecPassErr'] = "Invalid e-mail format"; 
               header('location:Recuriter_Login.php');
              
          }elseif(empty($_POST["Password"])) 
              {
                $_SESSION['RecEmailValue']=$email;
                $_SESSION['RecPassErr'] = "Password is required";
                 header('location:Recuriter_Login.php');
              } 
              else{
                    $command="Select * from recruitersignup WHERE OEmail='$email' and Password='$pass'and Verify=1";
                   $m=$con->query($command);
                   if(($data=$m->fetch_assoc()))
                     {
                       session_unset();
                            
                                  $_SESSION['FirstName']=$data['FirstName']; 
                                  $_SESSION['LastName']=$data['LastName']; 
                                  $_SESSION['PEmail']=$data['PEmail']; 
                                  $_SESSION['OEmail']=$data['OEmail']; 
                                  $_SESSION['Mobile']=$data['Mobile'];
                                  $_SESSION['CompanyName']=$data['CompanyName'];
                                  $_SESSION['Rid']=$data['Rid'];
                                  $_SESSION['Logo']=$data['Logo'];
                                  $_SESSION['RecLoginStatus']="1";      
                                  $_SESSION['RecProfile']=$data['Profile'];

                                  if($data['Profile']==0)
                                  {
                                       header('location:Recuriter_Dashboard_Edit_profile.php');
                                  }
                                  else {
                                  header('location:Recuriter_Dashboard.php');
                                 // exit;
                                 }
                   }
                   
                   else{
                        $_SESSION['RecPassErr'] = "Invalid user"; 
                        header('location:Recuriter_Login.php');
                    }
          }
}
?>
