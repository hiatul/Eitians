<?php  
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
  $_SESSION['LoginStatus']="0" ;
  $PassErr ="";
  include '../Connection/connect.php';
if (isset($_POST['login'])) 
{
          $email=$_POST["USERNAME"];
          $pass=$_POST["PASSWORD"];
          
       if (empty($_POST["USERNAME"])) 
           {
           
            $_SESSION['PassErr'] = "E-mail is required";
            header('location:ApplicantLogin.php');
            
          } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
// check if e-mail address is well-formed
              $_SESSION['PassErr'] = "Invalid e-mail format"; 
              header('location:ApplicantLogin.php');
              
          }elseif(empty($_POST["PASSWORD"])) 
              {
                $_SESSION['EmailValue']=$email;
                $_SESSION['PassErr'] = "Password is required";
                header('location:ApplicantLogin.php');
              } 
              else{
                    $command="Select * from applicant WHERE Email='$email' and Password='$pass' and Flag=1";
                   $m=$con->query($command);
                   if(($data=$m->fetch_assoc()))
                     {
                       session_unset();

                                  $_SESSION['FirstName']=$data['FirstName']; 
                                  $_SESSION['LastName']=$data['LastName']; 
                                  $_SESSION['Email']=$data['Email']; 
                                  $_SESSION['Id']=$data['Id'];
                                  $_SESSION['LoginStatus']="1";        
                                  $_SESSION['Profile']=$data['Profile'];
                                  $_SESSION['Resume']=$data['Resume'];

                                  if($_SESSION['Profile']==0){
                                  header('location:ApplicantDashboard.php');
                                  }
                                  elseif ($_SESSION['Resume']==0) {
                                  header('location:ApplicantDashboard.php');
                              }else {
                                    header('location:ApplicantDashboard.php');
                                    }
                                 // exit;
                    }
                    else{
                        $_SESSION['PassErr'] = "Invalid user"; 
                        header('location:ApplicantLogin.php');
                    }
                }
}
?>
