<?php
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    $_SESSION['Title']="";
    if(!isset($_SESSION['LoginStatus']))
    {
        $_SESSION['LoginStatus']="0";
    }
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
    
    $_SESSION['Search']=0;
    
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/slide.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Active_job.css">
    <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">

    <!--Google Loation autocomplete-->   
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyCDC1VIuedy_5zdEluB3HNiqESWVkSp9Jk"></script>

 
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .pagination{
        
        float: right;
        }
        
        .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
}

.pagination a.active {
    background-color: #357ebd;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
<script type="text/javascript">
    
    </script>

</head>
<body>
    
   <?php 
   if(($_SESSION['LoginStatus']=="0")&&($_SESSION['RecLoginStatus']=="0"))
   {
    include './header.php';
   }
   elseif($_SESSION['RecLoginStatus']=="1"){
    include './RecuriterHeader.php';   
   }
   else
   {
    include './ApplicantHeader.php';
   }
 
   ?>
   <!--  slide show css -->

<!--   <div  class="col-12" style="padding: 0;">
 
       <div class="slideshow-container">

           <div class="mySlides fade">
  <div class="numbertext">Jobs</div>
  <img src="../image/agri2_1.jpg" style="width:100%;border-radius: 0px;">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">Future</div>
  <img src="../image/home.jpg" style="width:100%;border-radius: 0px;">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">Planning</div>
  <img src="../image/home.jpg" style="width:100%;border-radius: 0px;">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
    <span class="dot" style=" display: none;"></span> 
  <span class="dot" style=" display: none;"></span> 
  <span class="dot" style=" display: none;"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

        
</div>-->



<div class="bgimg-3 col-12"  style="color: #000;background-color:#fff;text-align:center;text-align: justify;font-family: global6;">
 
             <div class="col-12">
                  <div class="col-12 search">
                      <form action="home.php" method="GET" novalidate>
     
         
                        <div class="col-3" style="padding: 0;">

                            <div class="styled-input" style="font-weight: bold;">
                                <input type="text" name="Title" style="width: 100%;padding: 15px;outline: none;border: 1px solid #ccc;border-radius: 2%;font-family: global6;" required>  
                               <label>Type Job Title, Skills etc.</label>
                               <span></span> </div>
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <div class="styled-input" style="font-weight: bold;">
                                <input type="text" name="Location" value="" placeholder="" id="autocomplete"  style="width: 100%;padding: 15px;outline: none;border: 1px solid #ccc;border-radius: 2%;font-family: global6;" required>  
                               <label>Location</label>
                               <span></span> </div>
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <div class="styled-input bold" style="font-weight: bold;">
                                <select name="Experience" class="bold" style=" color: #999; width: 100%;padding: 15px;outline: none;border: 1px solid #ccc;border-radius: 2%;font-family: global6;">  
                                    <option class="bold" value="">Experience</option>
                                <?php
                                for($i=1;$i<=6;$i++)
                                {
                                    ?><option class="bold" value="<?php echo $i;?>"><?php echo $i;?>yrs</option><?php
                                }
                                ?>
                                    <option class="bold" value="11">More then 6yrs</option>
    
                            </select>
                        </div>
                        </div>
                          <div class="col-3" style="padding-top: 0;">

                              <button type="submit" class="cursor" onmouseover="style.backgroundColor='#35B1E3'" onmouseout="style.backgroundColor='#357ebd'" name="Search" style="width: 100%;padding: 15px;outline: none;border-radius: 3px;font-family: global6;background-color: #357ebd;color:white;border:1px solid #357ebd;"><i class="fa fa-search" aria-hidden="true"></i> Search Job</button>  

                         </div>

                    </form>

                      
                  </div>
             </div>
             </div>
             
       
  







<div class="" id="Jobs"  style="z-index: -11; ">
                                   
 
    <?php
    $num_rec_per_page=5;
    $total_records=0;
    $rowcount=0;
    if((isset($_GET['Search']))||(isset($_GET['page'])))
    {
      include './../Connection/connect.php';
        if($connection==1)
        {
            
            if(isset($_GET['Search']))
            {
                $_SESSION['Title']=$_GET['Title'];
                $_SESSION['Location']=$_GET['Location'];
                $_SESSION['Exp']=$_REQUEST['Experience'];
            }
            
            if (isset($_GET["page"]))
                { $page  = $_GET["page"]; }
            else { $page=1; }; 
            
            $start_from = ($page-1) * $num_rec_per_page;
            
            

        if($_SESSION['Exp']>6)
        {
            if(empty($_SESSION['Title'])){
                $command="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6 LIMIT $start_from, $num_rec_per_page"; 
            $command2="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6"; 
            }
            elseif(empty($_SESSION['Location'])){
                $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6 ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
            $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6"; 
            }
            elseif((empty ($_SESSION['Location']))||(empty ($_SESSION['Title']))){
                $command="Select * from jobpost where Experience>6 LIMIT $start_from, $num_rec_per_page"; 
                $command2="Select * from jobpost where Experience>6"; 
            }
            else{
            $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6 ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
            $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience>6"; 
            }
            
            $x=  '1';
        }
        
        elseif ((!empty ($_SESSION['Exp']))&&(!empty ($_SESSION['Location']))&&(!empty ($_SESSION['Title']))){
            $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
            $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%'"; 

            $x=  '8';
            
        }
        
        
        elseif(!empty($_SESSION['Title']))
        {
            if(($_SESSION['Location'])&&(empty ($_SESSION['Exp']))){
                $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
             $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%'"; 

            }
            elseif(empty ($_SESSION['Location'])){
                $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
             $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%'"; 

            }
            else{
                if(empty ($_SESSION['Exp'])){
                $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' LIMIT $start_from, $num_rec_per_page"; 
                $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%'"; 

                }
            }
           
            
        }
        elseif (!empty ($_SESSION['Location'])) {
            if((empty($_SESSION['Title']))&&(empty($_SESSION['Exp'])))
            {
                 $command="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
                $command2="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%"; 

            }
            elseif(empty($_SESSION['Title'])){
                $command="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
                $command2="Select * from jobpost where Location LIKE '%" . $_SESSION['Location'] .  "%' AND Experience LIKE '%" . $_SESSION['Exp'] .  "%'"; 

            }
            else{
                if(empty($_SESSION['Exp'])){
                $command="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
                $command2="Select * from jobpost where Title LIKE '%" . $_SESSION['Title'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%'"; 
                }
            }
            $x=  '3';
        }
        elseif (!empty ($_SESSION['Exp'])) {
            if((empty($_SESSION['Title']))||(empty ($_SESSION['Location']))){
                 $command="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
                 $command2="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%'"; 

            }
            elseif(empty($_SESSION['Title']))
            {
                 $command="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%' ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page"; 
                 $command2="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%' AND Location LIKE '%" . $_SESSION['Location'] .  "%'"; 

            }
            else {
                if(empty ($_SESSION['Location'])){
                     $command="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%' AND Title LIKE '%" . $_SESSION['Title'] .  "%' LIMIT $start_from, $num_rec_per_page"; 
                     $command2="Select * from jobpost where Experience LIKE '%" . $_SESSION['Exp'] .  "%' AND Title LIKE '%" . $_SESSION['Title'] .  "%'"; 
                }
            }
           
            $x=  '4';
        }
        else
        {
            $command="Select * from jobpost ORDER BY PostDate DESC LIMIT $start_from, $num_rec_per_page";
            $command2="Select * from jobpost";
            $x=  '9';
        }
        
//        echo $x." ".$_SESSION['Exp']." ".$_SESSION['Location']." ".$_SESSION['Title'];
        try{
             
        if($result=$con->query($command))
                {     
                $rowcount=$result->num_rows;
                
                if($rowcount>0)
                {
                    echo '<div class="col-10 " style=" z-index:-11; padding: 0px; height: auto; float: none; margin: auto;">
        <p class="profile">Matching Results</p>
        <div class="col-12 " style="height:auto; padding: 0px;margin-left: 0px;margin-bottom: 40px;">
';
                }
                else{
                    echo '<div class="col-10 " style=" z-index:-999; padding: 0px; height: auto; float: none; margin: auto;">
        <p class="profile" style="border:0px;">Opps Sorry No results matched...</p>
        <div class="col-12 " style="height:auto; padding: 0px;margin-left: 0px;margin-bottom: 40px;">
';
                }
                                  
                while($row = mysqli_fetch_array($result))
                {       $rr=$row['Rid'];
                       $commandlogo="SELECT Logo FROM recruitersignup WHERE Rid=$rr";
                          $resultlogo=$con->query($commandlogo);             
                         $datalogo=$resultlogo->fetch_assoc();
                                           
                   ?><div class="col-12 jobstyle" style="height: auto;margin-bottom: 15px; box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);">
                                     
                                    <div  class="col-2 imm">
                                        <img src='<?php echo $datalogo['Logo'];?>' style="height: 150px; width: 80%;margin-top: 15px;">
                                    </div>
                                                <?php $_SESSION['Title']=$row['Title'];?>
                                                <div  class="col-10 basic">

                                                   <div  class="col-12 basic" style="">
                                                    <div style="width:50%;float:left; cursor: pointer;">
                                                                                        <form method="GET" action="Applicant_SingleJOb_Apply.php" style="padding: 0px;margin: 0px;">
                                                                                            <button class="cursor" style="text-decoration: none; background: none;border: none;color: #357ebd;font-size: 20px;" type="submit" name="ReadMore..."><?php echo $_SESSION['Title'];?></button>
                                                                                            
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                          </form>
                                                    </div>
                                                    <div class="basic" style="width:50%;float:left;">
                                                        <p class="pp" style="font-style: oblique;text-align: right;" ><i class="fa fa-dollar" style="color: #357ebd;"></i> <?php echo $row['Salary']." ";?></p>
                                                    </div>
                                                    </div>

                                        <div  class="col-12 basic">
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Location"> <i class="fa fa-map-marker" style="color: #357ebd;"></i> <?php echo $row['Location']." ";?></p>
                                        </div>
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Category"><i class="fa fa-briefcase" style="color: #357ebd;"></i> <?php echo $row['Category']." ";?></p>
                                        </div>
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Type"><i class="fa fa-clock-o" style="color: #357ebd;"></i> <?php echo $row['Type']." ";?></p>
                                        </div>
                                        
                                        </div>

                                                            <div  class="col-12" style="padding:10px;height: auto;padding-top: 5px;padding-left: 0px;">
                                                                <p  class="pp"style=" text-align: justify; font-size: 12px;height: 60px;overflow: hidden; " id="Desc"> <?php   echo $row['Description']." ";?>
                                                                </p>
                                                                <form method="GET" action="Applicant_SingleJOb_Apply.php" style="padding: 0px;margin: 0px;">
                                                                                                            <button  style="cursor: pointer;text-decoration: none; background: none;border: none;color: #357ebd;" type="submit" name="ReadMore...">Read More.</button>
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                          </form>
                                                            
                                                            </div>
                                          <div  class="col-12" style="height:auto;padding: 0px;margin: 0px;">
                                          <form method="GET" action="home.php">
                                          <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                          <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                          <input type="hidden" name="Title" value='<?php echo $row['Title'];?>'>
    
                                          <button class="cursor" style=" height: 40px;float: right; background: #357ebd;border: none;color: white;" type="submit" name="ApplyNow">Apply Now <i class="fa fa-angle-right"></i></button>
                                          </form>
                                        </div>

                                        </div>

                                </div>
    <?php
                                                                  
                                                                  
                    }

                    }
                                           
                } catch (Exception $e){
                    
                }
                
                if($rowcount>0){
                $rs_result=$con->query($command2);
                //run the query
                $total_records = $rs_result->num_rows;
//                echo $total_records;
                $total_pages = ceil($total_records / $num_rec_per_page); 
//                echo $total_pages;
                echo'<div class="pagination">';
                echo "<a  href='home.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                for ($i=1; $i<=$total_pages; $i++) {
                    if($i==$page)
                    {
                        echo "<a class='active' href='home.php?page=".$i."'>".$i."</a> ";
                    }
                      else{      echo "<a href='home.php?page=".$i."'>".$i."</a> "; 
                
                      }
                 }; 
                echo "<a href='home.php?page=$total_pages'>".'&raquo;'."</a>"
                        . "</div> "; // Goto last page

                
                }
        }

        }
    
    ?>
         </div>
   
</div>
    
     <!--Google places autocomplete-->
    <script>
            var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
            
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,options);
    </script>
        

<div id="snackbar">Some text some message..</div>     
<!-- The actual snackbar -->

<script>
function myFunction(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    refresh = setTimeout(function(){window.location.href = "home.php";},3000);
     
}

function myFunction2(str) {
    var x = document.getElementById("snackbar")
    document.getElementById("snackbar").innerHTML=str;
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

        function ref(x)
        {
            refresh = setTimeout(function(){window.location.href = "home.php";},3000);
        }
        
         function ref2(x)
        {
            refresh = setTimeout(function(){window.location.href = "home.php";},3000);
            
        }
         
</script>
        <!--///////////////-->


<?php

        
    
    if(isset($_GET['ApplyNow']))
    {  
        if($_SESSION['LoginStatus']=="0")
        {
            $_SESSION['PassErr']="Please Login to Apply for a Job";
            echo '<script>document.location.replace("ApplicantLogin.php");</script>';        
        }
         elseif($_SESSION['ResumeUploadCount']=="0")
        {
            $_SESSION['error']="Please Upload Your Resume to Apply for a Job";
            echo '<script>document.location.replace("ApplicantDashboard.php");</script>';               
        }
        elseif($_SESSION['ResumeUploadCount']!="0")
        {
              $_SESSION['error']="";
            include './../Connection/connect.php';
            
            if($connection==1){
            $date = date('Y-m-d H:i:s');
            $Id=$_SESSION['Id'];
            $Rid=$_GET['Rid'];
            $Jid=$_GET['Jid'];
            $Title=$_Get['Title'];
            $command2="Select Aid,Jid from applicantapplied where Jid=$Jid AND Aid=$Id";
            $result=$con->query($command2);
             
                if($result->num_rows == 0)
                {                  
                         $command7="SELECT * FROM resume WHERE Aid=".$_SESSION['Id']."";
                                          $result7=$con->query($command7);
                                           if($data7=$result7->fetch_assoc()){
                                               
                                               
                        $command="Insert into applicantapplied(Aid,Rid,Jid,ApplyDate,ResumePath) values(".$_SESSION['Id'].",$Rid,$Jid,'$date','".$data7['Path']."')";
                            if($result=$con->query($command)=="TRUE")
                            {
                                 $_SESSION['error']="";
                                 echo '<script type="text/javascript">','myFunction2("Applied Sucessfully...");','</script>';
//                            echo '<script type="text/javascript">','ref();','</script>';
                                 
                                $headers = 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type:text/html;charset=iso-8859-1' . "\r\n";
                                $headers .= "From: Enolimits.com\r\n";
                                $subject2="Job Applied Success";
                                $message2="<h2>Dear ".$_SESSION['FirstName']." ".$_SESSION['LastName'].",</h3><br><h3>This is a conformation mail that you have sucessfully Applied for the Job Post ";
                                $message2.=$_SESSION['Title'];
                                $message2.=".<br>Please Do not respond to this mail.</h3>";
                                
                                mail($_SESSION['Email'],$subject2,$message2,$headers);  
                            }
                            else{
                               
                            }
                      
                
                        }
//                        else{
//                            $_SESSION['error']="Please Upload Resume And Complete Your Profile";
//                            header('location:ApplicantLogin.php');
//                        }
                }
                else{
                     echo '<script type="text/javascript">','myFunction2("Already Applied...");','</script>';

                }
                
                echo $error;
            }
        }
    }


?>




 <?php
 
 include './footer.html';
 ?>












   
</body>
</html>