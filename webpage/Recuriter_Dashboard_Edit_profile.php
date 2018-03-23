<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
     if($_SESSION['RecLoginStatus']=="0")
   {
     header('location:home.php');
   }
   $error="";
$_SESSION['Cname']="";
$_SESSION['Industry']="";
$_SESSION['Employee']="";
$_SESSION['Phone']="";
$_SESSION['date']="";  
$_SESSION['Located']="";    
$_SESSION['Address']="";  
$_SESSION['Acompany']="";
if($_SESSION['RecProfile']==1)
{   $Rid=$_SESSION["Rid"];
         
      include './../Connection/connect.php';
       if($connection==1)
            {
              $command="SELECT * FROM recruitercompany WHERE Rid=$Rid";
              $result=$con->query($command);
                if($data=$result->fetch_assoc())
                 { 
                    $_SESSION['Cname']=$data['CompanyName'];
                    $_SESSION['Industry']=$data['Industry'];
                    $_SESSION['Employee']=$data['Employees'];
                    $_SESSION['Phone']=$data['Phone'];
                    $_SESSION['date']=$data['Established'];
                    $_SESSION['Located']=$data['Located'];
                    $_SESSION['Address']=$data['Address'];
                    $_SESSION['Acompany']=$data['ACompany'];
                    
                 }
            }
}


   
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Edit_profile.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
       <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
       <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">
   

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
   
    <style>

</style>
<script type="text/javascript">
    function chnng()
    {
        document.getElementById("Edit").style.backgroundColor="#357ebd";
        document.getElementById("Edit").style.borderLeft="6px solid gray";
         document.getElementById("EditPara").style.color="white";
         document.getElementById("Editicon").style.color="white";
        
    }
    
    function fileName()
        {
            var x=document.getElementById("file-upload").value;
            document.getElementById("FileName").innerHTML=x+"<p>Browse</p>";
        }
        
</script>
</head>
<body onload="chnng()">
   <?php include './RecuriterHeader.php';?>
    
    
                     <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                                <div class="col-12" style="  padding: 0;">
                                            <ul class="breadcrumb">
                                                      <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                                      <li><a href="Recuriter_Dashboard_Edit_profile.php"style="color: white;">Edit Profile</a></li>
                                            </ul>
                                 
                                </div>

             
                     </div>

    
     <div class="col-12" style="height: auto;padding-bottom: 50px;" >
                       
                       
                           <div class="col-3" style="padding: 0px;">
                           <?php
                           include '../webpage/Recuriter_Dashboard_Menu_Logo_Name.php';
                           ?>
                           
                            <?php
                           include '../webpage/Recuriter_Dashboard_Menu.php';
                           ?>
                           </div>
                           
                              
                 <div class="col-8 content"  style="">
                     <h4 style="color: red; font-family: global6;"><?php echo $error?></h4>
                <div>
                <p class="headp">Edit Profile</p>
                </div>
                     <form action="" method="POST">
                    <div class="" style="clear: both;">
                       
                      <div class="col-6 inputpart1" style="">
                        <p class="text">Company Name *</p>
                        <input class="textinput" type="text" name="Cname" value=<?php echo @$_SESSION['Cname']; ?>>
                    </div>   
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Industry Type *</p>
                        <input class="textinput" type="text"name="Industry" value=<?php echo @$_SESSION['Industry']; ?>>
                    </div>
                    
                   
                        
                     <div class="col-6 inputpart1" style="">
                        <p class="text">Established in *</p>
                        <input class="textinput" type="date" name="date" value=<?php echo @$_SESSION['date']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">No. of Employess *</p>
                        <input class="textinput" type="text" name="Employee" value=<?php echo @$_SESSION['Employee']; ?>>
                    </div>
                        
                   
                     <div class="col-6 inputpart1" style="">
                        <p class="text">Phone *</p>
                        <input class="textinput" type="text" name="Phone" value=<?php echo @$_SESSION['Phone']; ?>>
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Located *</p>
                        <input class="textinput" type="text" name="Located" value=<?php echo @$_SESSION['Located']; ?>>
                    </div>    
                    
                     <p class="text">Address *</p>
                     <input class="textinput" type="text"name="Address"  value=<?php echo @$_SESSION['Address']; ?>>
                    
                    <p class="text">About Company *</p>
                    <textarea class="textinput" type="text" rows="" style="height: 160px;" name="Acompany"  ><?php echo @$_SESSION['Acompany']; ?></textarea>
                    </div>
                    
                    
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Profile">Save Profile <i class="fa fa-angle-right"></i></button>
                   
                                
                </form>
                

            </div>
                           </div>
                           

             <!-- The actual snackbar -->
<div id="snackbar">Some text some message..</div>

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard_Edit_profile.php";},3000);
     
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard.php";},3000);
        }
        
       
</script>
                        
                        
                    
<?php 

   if(isset($_POST['Profile']))
{
     include './../Connection/connect.php';
    if($connection==1)
    {
        $Cname=  $_POST['Cname'];
        $Industry=$_POST['Industry'];
        $date=$_POST['date'];
        $Employee=$_POST['Employee'];
        $phone=$_POST['Phone'];
        $date=$_POST['date'];  
        $Located=$_POST['Located'];    
        $Address=$_POST['Address'];  
        $Acompany=$_POST['Acompany'];
         $Rid=$_SESSION["Rid"];
         
         if(empty($Cname)){
            $error="Company Name should only contains characters";
            }
        elseif (empty ($Industry)) {
            $error="Industry should only contains characters";
            $_SESSION['Cname']=$Cname;
            }
          elseif (empty ($date)) {
            $error="Date should only not be left blank";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            }
          elseif (empty ($Employee)) {
            $error="Employee should only contains characters";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            $_SESSION['date']=$date;
            }
          elseif (empty ($phone)) {
            $error="Phone number should only contains characters";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            $_SESSION['date']=$date;
            $_SESSION['Employee']=$Employee;
            }
          elseif (empty ($Located)) {
            $error="Industry should only contains characters";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            $_SESSION['date']=$date;
            $_SESSION['Employee']=$Employee;
            $_SESSION['phone']=$phone;
            }
          elseif (empty ($Address)) {
            $error="Address should only contains characters";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            $_SESSION['date']=$date;
            $_SESSION['Employee']=$Employee;
            $_SESSION['phone']=$phone;
            $_SESSION['Located']=$Located;
            }
            elseif (empty ($Acompany)) {
            $error="About Company should only contains characters";
            $_SESSION['Cname']=$Cname;
            $_SESSION['Industry']=$Industry;
            $_SESSION['date']=$date;
            $_SESSION['Employee']=$Employee;
            $_SESSION['Phone']=$phone;
            $_SESSION['Located']=$Located;
            $_SESSION['Address']=$Address;
            }
          
           else{               
                    if($_SESSION['RecProfile']==0)
                    {  $command="Insert into recruitercompany(CompanyName,Industry,Established,Employees,Phone,Located,Address,ACompany,Rid) values('$Cname','$Industry','$date','$Employee','$phone','$Located','$Address','$Acompany',$Rid)";
                              if($result=$con->query($command))
                               {    $_SESSION['RecProfile']=1;
                                      $command2="UPDATE recruitersignup SET Profile=1 WHERE Rid=$Rid";
                                        if($result=$con->query($command2))
                                              {  
//                                                 $error="Profile has been Updated.";
//                                                    header('location:Recuriter_Dashboard.php');
                                                     echo '<script type="text/javascript">','myFunction("Profile Details Uploaded...");','</script>';
                                                      echo '<script type="text/javascript">','ref();','</script>';
                                                }
                               }
                    }
                    elseif ($_SESSION['RecProfile']==1)
                    {   
                        $command3="UPDATE recruitercompany SET CompanyName='$Cname',Industry='$Industry',Established='$date',Employees='$Employee',Phone='$phone',Located='$Located',Address='$Address',ACompany='$Acompany' WHERE Rid=$Rid";
                         if($con->query($command3)===TRUE)
                               {
                                   //$error="Profile has been Updated...";
                                echo '<script type="text/javascript">','myFunction("Profile Details Uploaded...");','</script>';
                                  echo '<script type="text/javascript">','ref();','</script>';
                               }
                        
                    }
        }
        
    }
    }

?>

    
    
 <?php
 include './footer.html';
 ?>










   
</body>
</html>