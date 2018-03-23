<?php
date_default_timezone_set('Asia/Kolkata');
$path = "../ApplicantResume/";
$messageName="";
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if($_SESSION['LoginStatus']=='0')
            {
                header('location: home.php');
            }
            else{
                include './../Connection/connect.php';
                
                if($connection==1)
                {
                    $Resume=0;
                                        
                            
                            
                             
                             
                             $command4="Select * from applicantSocialLinks where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command4);
                             if($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                                $_SESSION['fb']=$data['Facebook'];
                                $_SESSION['tw']=$data['Twitter'];
                                $_SESSION['ln']=$data['LinkedIn'];
                                $_SESSION['gp']=$data['GooglePlus'];
                             }
                             
                             $command5="Select * from applicantJobCategroy where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command5);
                             if($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                               
                             }
                             
                             $command6="Select * from applicantSkills where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command6);
                             if($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                               
                             }
                             
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
     <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
        <style>
            #tags{
  float:left;
  border:1px solid #ccc;
  padding:5px;
  font-family:Arial;
}
#tags > span{
  cursor:pointer;
  display:block;
  float:left;
  color:#fff;
  background:#789;
  padding:5px;
  padding-right:25px;
  margin:4px;
}
#tags > span:hover{
  opacity:0.7;
}
#tags > span:after{
 position:absolute;
 content:"x";
 border:1px solid;
 padding:2px 5px;
 margin-left:3px;
 font-size:11px;
}
#tags > input{
  background:#eee;
  border:0;
  margin:4px;
  padding:7px;
  width:auto;
}
        
        /* The snackbar - position it at the bottom and in the middle of the screen */
#snackbar {
    visibility: hidden; /* Hidden by default. Visible on click */
    min-width: 250px; /* Set a default minimum width */
    margin-left: -125px; /* Divide value of min-width by 2 */
    background-color: #333; /* Black background color */
    color: #fff; /* White text color */
    text-align: center; /* Centered text */
    border-radius: 2px; /* Rounded borders */
    padding: 16px; /* Padding */
    position: fixed; /* Sit on top of the screen */
    z-index: 1; /* Add a z-index if needed */
    left: 50%; /* Center the snackbar */
    bottom: 30px; /* 30px from the bottom */
}


        </style>
        <script type="text/javascript">
            function backgch(){
            document.getElementById("BuildResume").style.backgroundColor="#357ebd";
            document.getElementById("BuildResume").style.borderLeft="6px solid gray";
            document.getElementById("BuildResume2").style.color="white";
            document.getElementById("BuildResume3").style.color="white";
        }
        
        function fileName()
        {
            var x=document.getElementById("file-upload").value;
            document.getElementById("FileName").innerHTML=x+"<p style=\"margin: 0px; padding: 0px; float: right;background: gainsboro;\">Browse</p>";
        }
        
        
             
             $(function(){ // DOM ready

  // ::: TAGS BOX

  $("#tags input").on({
    focusout : function() {
      var txt = this.value.replace(/[^a-z0-9\+\-\.\#]/ig,''); // allowed characters
      if(txt) $("<span/>", {text:txt.toLowerCase(), insertBefore:this});
      this.value = "";
    },
    keyup : function(ev) {
      // if: comma|enter (delimit more keyCodes with | pipe)
      if(/(188|13)/.test(ev.which)) $(this).focusout(); 
    }
  });
  $('#tags').on('click', 'span', function() {
    if(confirm("Remove "+ $(this).text() +"?")) $(this).remove(); 
  });

});

        </script>
        
        <script type="text/javascript">
         function skills()
        {
            var dd="";
           var Children  = document.getElementById('tags').children;
 
        for (i = 0; i <= Children.length - 1; i++) {
            dd+=(Children[i].innerHTML)+" ";
        }
        document.getElementById('skill').value=dd;
        return true;
    }    
    
        </script>
        
        
        
    </head>
    <body onload="backgch()">
        
        
        
         <?php 
           
            
                include './ApplicantHeader.php';
            

            
            ?>
        <div>
            
             <div  class="bgimg col-12" style="padding-top: 0;">
 <ul class="breadcrumb">
     <li><a href="userdashboard.php">Dashboard</a></li>
  <li>home</li>
 
 
</ul>
        <p style="font-family:Open Sans;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;"><?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
</div>

        </div>     
        
        <div class="col-12" style="">

            <?php
                        include './ApplicantDashboardMenu.php';
            ?>
            
            <div class="col-8 content"  style=""><p id="demo"></p>
                <h4  style="color: red; font-family: global6;"><?php echo $_SESSION['error'];?></h4>
<!--//Education-->
                <div>
                <p class="headp">Educational Detail</p>
                </div>

            <!--//////Fetch Edu Details--> 
                <?php
                
                                            $command2="Select * from educationDetail where Aid=".$_SESSION['Id']."";
                                             $rs=$con->query($command2);
                                             while($data=$rs->fetch_assoc()){
                                                 $Resume+=1;

                ?>
                <div class="ShowData">

                    <div class="delete" style="">
                                        <form method="GET" action="" style="width: 100%;">
                                            <input type="text" name="Id" value="<?php echo $data['Id'];?>" hidden>
                                            <button type="submit" title="Delete" name="DeleteEducation" style="float: right; background: none; border: none;" ><img src="../icons/minus.svg" height="20px;" width="20px"></button>
                                            </form>
                                    </div>
                    <div class="col-4" style="padding: 10px; text-align: center;">
                        <h4 style=""><?php echo $data['Institution'];?></h4>

                    </div>

                    <div class="col-4" style="padding-left: 10px; text-align: center;">
                        <h4 style=" "><?php echo $data['DegreeTitle'];?></h4>

                    </div>

                    <div class="col-4" style="padding-left: 10px; text-align: center;">
                        <h4><?php 
                                        $year = intval($data['StartDate']);
                                        $year2 = intval($data['EndDate']);
                                        echo $year." to ".$year2;
                                        ?>
                        </h4>

                    </div>
                    <div style="clear: both; padding-left: 15px; padding-right: 15px;">
                        <p style=" font-size: 14px;">
                                            <?php 
                                        echo $data['Description'];
                                        ?>
                                        </p>
                    </div>

                            </div>
            <?php
            }
            ?>

            <!--//fetch finish-->
                <form action="" method="GET">
                    <div class="" style="clear: both;">
                        <p class="text">Degree Title *</p>
                        <input class="textinput" name="DegreeTitle"  type="text" placeholder="Degree Title">
                    
                        <p class="text">Institution Name *</p>
                        <input class="textinput" name="InstitutionName" type="text" placeholder="Institution Name">
                    
                    <div class="col-6 inputpart1" style="">
                        <p class="text">Degree Start Date *</p>
                        <input class="textinput" name="StartDate"  type="date" placeholder="Pick Date">
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Degree End Date *</p>
                        <input class="textinput" name="EndDate"  type="date" placeholder="Pick Date">
                    </div>
                    
                    <p class="text">Discription </p>
                    <textarea class="textinput" name="Description"  type="text" rows="3"></textarea>
                    </div>
                    
                    
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Education">Add Education Detail<i class="fa fa-angle-right"></i></button>
                   
                                
                </form>

                <div class="line"></div>
  <!--//Jobcatogery///////////////////-->              
                 <div class="" style="">
                     <p class="headp">Job Category </p><br>
                     
                     <!--//fetch job category-->
                     <?php
                     $command7="Select * from applicantJobCategroy where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command7);
                             if($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                                ?>
                    <div style="clear: both; padding-left: 10px; padding-right: 10px; display: inline-block; background: #007bb5; color: white;"><?php echo $data['JobCategory'];?></div>

                     <?php
                             }
                     ?>
                    
                    <!--//fetch finish-->
                     
                     <form action="" method="GET">
                     <select  class="textinput"style="width:100%; color: #000; margin-top: 20px;" name="JobCat">
                                            <option value="0">Select Job Category*</option>
                                            <?php
                                            if($connection==1){
                                            $command2="Select * from jobcategory";
                                            $rs=$con->query($command2);
                                                while($data=$rs->fetch_assoc())
                                                {
                                                    ?><option value="<?php echo $data['Jobcategory'];?>"><?php echo $data['Jobcategory'];?></option><?php
                                                }
                                            }
                                            ?>
                                            
                        </select>
                     
                     
                        <button class="col-3 submitbtn" type="submit" value="Submit" name="JobCategory">Save Job Category <i class="fa fa-angle-right"></i></button>
                     </form>
                    </div>
  
                <div class="line"></div>
<!--//Job Detail--> 
            <div>
                    <p class="headp">Job Experience</p>
                    
                    
            <!--///Fetch Job Experiences-->
            <?php
             $command3="Select * from applicantJobExperience where Aid=".$_SESSION['Id']."";
                             $rs=$con->query($command3);
                             while($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                                
            ?>        
            <div class="ShowData">

                    <div class="delete" style="">
                                        <form method="GET" action="" style="width: 100%;">
                                            <input type="text" name="Id" value="<?php echo $data['Id'];?>" hidden>
                                            <button type="submit" title="Delete" name="DeleteExp" style="float: right; background: none; border: none;" ><img src="../icons/minus.svg" height="20px;" width="20px"></button>
                                            </form>
                                    </div>
                    <div class="col-4" style="padding: 10px; text-align: center;">
                        <h4 style=""><?php echo $data['Company'];?></h4>

                    </div>

                    <div class="col-4" style="padding-left: 10px; text-align: center;">
                        <h4 style=" "><?php echo $data['Position'];?></h4>

                    </div>

                    <div class="col-4" style="padding-left: 10px; text-align: center;">
                        <h4><?php 
                                        $year = intval($data['StartDate']);
                                        $year2 = intval($data['EndDate']);
                                        echo $year." to ".$year2;
                                        ?>
                        </h4>

                    </div>
                    <div style="clear: both; padding-left: 15px; padding-right: 15px;">
                        <p style=" font-size: 14px;">
                                            <?php 
                                        echo $data['Description'];
                                        ?>
                                        </p>
                    </div>

                            </div>
            <?php
             }
            ?> 
            <!--//fetch finish-->        
                    <form action="" method="GET">
                    <div class="" style="clear: both;">
                        <p class="text">Company/Organisation *</p>
                        <input class="textinput" type="text" name="Company"  placeholder="Company Name">

                        <p class="text">Position *</p>
                        <input class="textinput" type="text" name="Position"  placeholder="Position Title">
                    <div class="col-6 inputpart1" style="">
                        <p class="text">Job Start Date *</p>
                        <input class="textinput" type="date" name="StartDate"  placeholder="Pick Date">
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Job End Date *</p>
                        <input class="textinput" type="date" name="EndDate"  placeholder="Pick Date">
                    </div>
                    
                    <p class="text">Description </p>
                    <textarea class="textinput" type="text" name="Description"  rows="3"></textarea>
                    </div>
                    
                    
                    <button class="col-3 submitbtn" type="submit" value="Submit" name="Jobexp">Add Work Experiences <i class="fa fa-angle-right"></i></button>
                   
                                
                </form>
                </div>

                <div class="line"></div>
                
<!--//Add skill-->
            
                <div>
                    <p class="headp">Add Skills</p><br>
                   <!--//fetch Skills-->
                     <?php
                     $command8="Select * from applicantSkills where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command8);
                             if($data=$rs->fetch_assoc()){
                                 $Resume+=1;
                                 $skills=(explode(' ', $data['Skills'], -1));
                                 foreach ($skills as &$value)
                                 {
                                ?>
                    <div style="clear: both; padding-left: 10px; padding-right: 10px; display: inline-block; background: #007bb5; color: white;"><?php echo $value;?></div>

                     <?php
                                 }
                             }
                     ?>
                    
                    <!--//fetch finish-->
                    <div class="" style="clear: both;">
                    
                        <p class="text">Skill Name *</p>
                        
                        <div id="tags" style="width: 100%; padding-right: 15px;">

                            <input type="text" value="" style="width: 100%;" placeholder="Add tags by pressing Enter Key" />
                        </div>
                        
                         <form action="" method="GET">
                             <input class="textinput" type="hidden" name="Skills" id="skill" placeholder="Skill Name">

                    
                    
                    </div>
                    
                    
                    <button class="col-3 submitbtn" onclick="skills()" type="submit"  value="Submit" name="Addskills">Update Skills <i class="fa fa-angle-right"></i></button>
                   
                                
                </form>
                </div>

                    <div class="line"></div>
                    
<!--//Upload Resume-->
            
                <div>
                    <p class="headp">Upload Resume</p><br>
                    
                    <!--//fetch Resume-->
                     <?php
//                     $command9="Select * from resume where Aid=".$_SESSION['Id']."";
//                             $rs=$con->query($command9);
//                             if($data=$rs->fetch_assoc()){
//                                 $Resume+=1;
//                                 $url=$data['Path'];
                                ?>
<!--                                <iframe src="http://docs.google.com/gview?url=<?php echo $url;?>&embedded=true"></iframe>
                                <iframe src='https://view.officeapps.live.com/op/embed.aspx?src=<?php echo $url;?>' width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>-->
                     <?php
                               
//                             }
                     ?>
                    
                    <!--//fetch finish-->
                    
                    
                    <form action="" method="POST" enctype="multipart/form-data"> 

                        <div class="" style="width: 70%; border: 1px solid gainsboro;">
                            <label for="file-upload" class="" id="FileName" style="display: inline; padding-left: 5px;">
                                Select a file
                                <p style="margin: 0px; padding: 0px; float: right;background: gainsboro;">Browse</p>
                            </label>
                                <input id="file-upload" onchange="fileName()" style="display: none;" type="file" name="Resume">
                        </div> 
                   
                   
                        <button class="col-3 submitbtn"  type="submit"  value="Submit" name="ResumeUpload">Upload Resume <i class="fa fa-angle-right"></i></button>
                   </form>
                                
                    
                </div>

            <div class="line"></div>
<!--//Social Links-->
    <div>
                    <p class="headp">Social links</p>
                    <form action="" method="GET">
                    <div class="" style="clear: both;">
                    <div class="col-6 inputpart1" style="">
                        <p class="text">Facebook *</p>
                        <input class="textinput" type="text" name="fb" value="<?php echo @$_SESSION['fb'];?>" placeholder="Profile Url">
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Twitter *</p>
                        <input class="textinput" type="text" name="tw" value="<?php echo @$_SESSION['tw'];?>" placeholder="Profile Url">
                    </div>
                        
                        <div class="col-6 inputpart1" style="">
                        <p class="text">LinkedIn *</p>
                        <input class="textinput" type="text" name="ln" value="<?php echo @$_SESSION['ln'];?>" placeholder="Profile Url">
                    </div>
                    
                    <div class="col-6 inputpart2" style="">
                        <p class="text">Google Plus *</p>
                        <input class="textinput" type="text" name="gp" value="<?php echo @$_SESSION['gp'];?>" placeholder="Profile Url">
                    </div>
                    
                    </div>
                    
                    
                        <button class="col-3 submitbtn" type="submit" value="Submit" name="Sociallinks">Save Links <i class="fa fa-angle-right"></i></button>
                   
                                
                </form>
                </div>
<!--//////////////////-->

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
    refresh = setTimeout(function(){window.location.href = "ApplicantBuildResume.php";},3000);
     
}

        function ref()
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantBuildResume.php";},1);
        }
         
</script>
        

<!--///////////////////////////////////php/////////////////////////-->
        
        <?php

                    
                    if(isset($_GET['Education']))
                    {
                        $date = date('Y-m-d H:i:s');
                        $DegreeTitle=$_GET['DegreeTitle'];
                        $Institution=$_GET['InstitutionName'];
                        $StartDate=$_GET['StartDate'];
                        $EndDate=$_GET['EndDate'];
                        $Description=$_GET['Description'];
                                               
                        $diff1 = abs(strtotime($date) - strtotime($StartDate));
                        $diff2 = abs(strtotime($StartDate) - strtotime($EndDate));
                        $years1 = floor($diff1 / (365*60*60*24));
                        $years2 = floor($diff2 / (365*60*60*24));
                        
                        if(empty($DegreeTitle)){
                            $_SESSION['error']="Degree Title should only contains characters";
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif(empty($Institution)){
                            $_SESSION['error']="Institution Name should not be empty";
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($StartDate)||$years1<2||$StartDate>$date) {
                        $_SESSION['error']="Invalid Degree Start Date";
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($EndDate)||$years2<2||$EndDate>$date) {
                        $_SESSION['error']="Invalid Degree End Date";
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        $_SESSION['StartDate']=$StartDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($Description)) {
                        $_SESSION['error']="Invalid Degree Description";
                        $_SESSION['DegreeTitle']=$DegreeTitle;
                        $_SESSION['StartDate']=$StartDate;
                        $_SESSION['EndDate']=$EndDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                    
                        else
                        {
                            $_SESSION['DegreeTitle']=$DegreeTitle;
                            $_SESSION['StartDate']=$StartDate;
                            $_SESSION['EndDate']=$EndDate;
                            $_SESSION['Description']=$Description;
                            
                                    $command="Insert into educationDetail(Aid,DegreeTitle,Institution,StartDate,EndDate,Description,UpdateDate) values('".$_SESSION['Id']."','$DegreeTitle','$Institution','$StartDate','$EndDate','$Description','$date')";
                                    if($result=$con->query($command))
                                    {                                       
                                        $_SESSION['error']="";
                                         echo '<script type="text/javascript">','myFunction("Education Details Uploaded...");','</script>';
                                        
                                         if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                    }
                                    else {
                                        $_SESSION['error']="";
                                        echo '<script type="text/javascript">','myFunction("Unable to upload Education Details...");','</script>';
                                    }
                             
                        }
                    }
                    
                    
                    if(isset($_GET['JobCategory']))
                    {
                            $date = date('Y-m-d H:i:s');
                            $_SESSION['JobCategry']="";
                            $Jobcat=$_GET['JobCat'];
                            $_SESSION['JobCategry']=$Jobcat;

                            if($Jobcat=='0')
                            {
                                $error="Invalid Job category";
                            }
                            else
                            {
                                $command2="Select * from applicantJobCategroy where Id=".$_SESSION['Id']."";
                                     $rs=$con->query($command2);
                                     if($data=$rs->fetch_assoc()){

                                        $_SESSION['JobCategory']=$Jobcat;
                                        $command2="Update applicantJobCategroy set JobCategory='$Jobcat',UpdateDate='$date' where Id=".$_SESSION['Id']."" ;
                                          if($con->query($command2)===TRUE){
                                              $_SESSION['error']="";
                                              echo '<script type="text/javascript">','myFunction("Job Category Updated...");','</script>';
                                          }
                                     }
                                     else{
                                            $command="Insert into applicantJobCategroy(Id,JobCategory,UpdateDate) values('".$_SESSION['Id']."','$Jobcat','$date')";
                                            if($result=$con->query($command))
                                            {
                                                
                                                        $_SESSION['error']="";
                                                        echo '<script type="text/javascript">','myFunction("Job Category Uploaded...");','</script>';
                                                if($Resume==4){
                                                    $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                                    if($con->query($command2)===TRUE){
                                                        $_SESSION['Resume']=1;

                                                    }
                                                }                                      
                                            }
                                            else{
                                                $_SESSION['error']="";
                                               echo '<script type="text/javascript">','myFunction("Unable to upload Job Category...");','</script>';
                                            }
                                     }
                            }
                    }
                    
                    if(isset($_GET['Jobexp']))
                    {
                        $date = date('Y-m-d H:i:s');
                        $Position=$_GET['Position'];
                        $StartDate=$_GET['StartDate'];
                        $EndDate=$_GET['EndDate'];
                        $Description=$_GET['Description'];
                        $Company=$_GET['Company'];                       
                        $diff1 = abs(strtotime($date) - strtotime($StartDate));
                        $diff2 = abs(strtotime($EndDate) - strtotime($StartDate));
                        $days1 = floor($diff1 / (60*60*24));
                        $days2 = floor($diff2 / (60*60*24));
                        if(empty($Company))
                        {
                           $_SESSION['error']="Company Name Should Not Be Empty";
                            echo '<script type="text/javascript">','ref();','</script>';
                         
                        }
                        elseif((ctype_alpha(str_replace(' ', '', $Position)) === false)||empty($Position)){
                            $_SESSION['error']="Position should only contains characters";
                            $_SESSION['Company']=$Company;
                            echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($StartDate)||$days1<9||$StartDate>$date) {
                        $_SESSION['error']="Invalid Job Start Date";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($EndDate)||$days2<9||$EndDate>$date) {
                        $_SESSION['error']="Invalid Job End Date";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        $_SESSION['StartDate2']=$StartDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                        elseif (empty ($Description)) {
                        $_SESSION['error']="Invalid Job Description";
                        $_SESSION['Company']=$Company;
                        $_SESSION['Position']=$Position;
                        $_SESSION['StartDate2']=$StartDate;
                        $_SESSION['EndDate2']=$EndDate;
                        echo '<script type="text/javascript">','ref();','</script>';
                        }
                    
                        else
                        {
                            $_SESSION['Company']=$Company;
                            $_SESSION['Position']=$Position;
                            $_SESSION['StartDate2']=$StartDate;
                            $_SESSION['EndDate2']=$EndDate;
                            $_SESSION['Description2']=$Description;
                            
                            
                             
                                    $command="Insert into applicantJobExperience(Aid,Company,Position,StartDate,EndDate,Description,UpdateDate) values('".$_SESSION['Id']."','$Company','$Position','$StartDate','$EndDate','$Description','$date')";
                                    if($result=$con->query($command))
                                    {
                                        $_SESSION['error']="";
                                         echo '<script type="text/javascript">','myFunction("Job Experience Uploaded...");','</script>';
                                        if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                        
                                    }
                                    else {
                                        $_SESSION['error']="";
                                       echo '<script type="text/javascript">','myFunction("Unable to Upload Job Experience...");','</script>';
                                    }
                             
                        }                    
                        
                    }                    
                    if(isset($_GET['Addskills']))
                    {
                         $date = date('Y-m-d H:i:s');
                            $_SESSION['Skills']="";
                            $Skills=$_GET['Skills'];
                            echo "Skills";
                            $_SESSION['Skills']=$Skills;

                            if(empty($Skills))
                            {
                                $_SESSION['error']="Please add few skill Example:HTML,JAVA";
                                echo '<script type="text/javascript">','ref();','</script>';
                            }
                            else
                            {
                                $command2="Select * from applicantSkills where Id=".$_SESSION['Id']."";
                                     $rs=$con->query($command2);
                                     if($data=$rs->fetch_assoc()){

                                        $_SESSION['JobCategory']=$Jobcat;
                                        $command2="Update applicantSkills set Skills='$Skills',UpdateDate='$date' where Id=".$_SESSION['Id']."" ;
                                          if($con->query($command2)===TRUE){
                                              $_SESSION['error']="";
                                              echo '<script type="text/javascript">','myFunction("Skills Updated...");','</script>';
                                          }
                                     }
                                     else{
                                            $command="Insert into applicantSkills(Id,Skills,UpdateDate) values('".$_SESSION['Id']."','$Skills','$date')";
                                            if($result=$con->query($command))
                                            {
                                                $_SESSION['error']="";
                                                 echo '<script type="text/javascript">','myFunction("Skills Uploaded...");','</script>';
                                                
                                                 if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                            
                                            }
                                            else{
                                                $_SESSION['error']="";
                                                echo '<script type="text/javascript">','myFunction("Unable to upload Skills...");','</script>';
                                            }
                                     }
                            }
                    }
                    
                    if(isset($_POST['ResumeUpload']))
                    {         $_SESSION['error']="";
                              $filename=$_FILES['Resume']['name'];
                              $size = $_FILES['Resume']['size'];
                              $date = date('Y-m-d H:i:s');
                              
                        $valid_formats = array("doc", "docx", "pdf", "rtf"); 
                        if (!empty($filename)) {
                            
                                    list($txt, $ext) = explode(".", $filename);
                                                if(in_array($ext,$valid_formats))
                                                {
                                                    if( $size<(2*(1024*1024)))
                                                    {
                                                                $actual_image_name = $_SESSION['Id'].".".$ext;
                                                                $tmp = $_FILES['Resume']['tmp_name'];

                                                                if (file_exists($path.$actual_image_name)) {
                                                                       unlink($path.$actual_image_name);
                                                                       if(move_uploaded_file($tmp, $path.$actual_image_name))
                                                                                    {
                                                                                        $command="UPDATE resume SET Path='$path$actual_image_name',Date='$date' WHERE Aid=".$_SESSION['Id']."" ;

                                                                                        if($con->query($command)===TRUE){
                                                                                            $_SESSION['Logo']=$path.$actual_image_name;
                                                                                            echo '<script type="text/javascript">','myFunction("Resume File Updated");','</script>';
                                                                                            }
                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    echo '<script type="text/javascript">','myFunction("Upload Failed");','</script>';

                                                                                }
                                                                       
                                                                    }
                                                                else{
                                                                    if(move_uploaded_file($tmp, $path.$actual_image_name))
                                                                                    {
                                                                                        $command="Insert into resume (Aid,Path,Date) values(".$_SESSION['Id'].",'$path$actual_image_name','$date')" ;

                                                                                        if($con->query($command)===TRUE){
                                                                                            $_SESSION['Logo']=$path.$actual_image_name;
                                                                                            echo '<script type="text/javascript">','myFunction("Resume Uploaded");','</script>';
                                                                                            }
                                                                                    }                                                                   
                                                                                else
                                                                                { 
                                                                                    echo '<script type="text/javascript">','myFunction("Upload Failed");','</script>';

                                                                                }

                                                                    
                                                                }
                                                    }
                                                    else{
                                                        $_SESSION['error']="File size should be less then 2Mb..!";
                                                        echo '<script type="text/javascript">','myFunction("File Size Exceeded");','</script>';  
                                                    }
                                                }
                                                else{
                                                    $_SESSION['error']="Invalid file format. Valid formats are .pdf, .doc, .docx, .rtf ";
                                                  echo '<script type="text/javascript">','myFunction("Invalid File Format");','</script>';  
                                                }
                                                        
                                                        
                        }
                    else{ 
                            $_SESSION['error']="Please select a file..!";
                                echo '<script type="text/javascript">','myFunction("Please select a file..!");','</script>';

                    }
                        
                    }
                    
                    if(isset($_GET['Sociallinks']))
                    {
                        $date = date('Y-m-d H:i:s');
                        $faceboook=$_GET['fb'];
                        $twitter=$_GET['tw'];
                        $linkedIn=$_GET['ln'];
                        $GooglePlus=$_GET['gp'];
                        
                        
//                        echo "$faceboook $GooglePlus";
                    
                            $_SESSION['fb']=$faceboook;
                            $_SESSION['tw']=$twitter;
                            $_SESSION['ln']=$linkedIn;
                            $_SESSION['gp']=$GooglePlus;
                            
                            
                             $command2="Select * from applicantSocialLinks where Id=".$_SESSION['Id']."";
                             $rs=$con->query($command2);
                             if($data=$rs->fetch_assoc()){

                                $_SESSION['fb']=$data['Position'];
                                $_SESSION['tw']=$data['StartDate'];
                                $_SESSION['ln']=$data['EndDate'];
                                $_SESSION['gp']=$data['Description'];
                                  $command2="Update applicantSocialLinks set Facebook='$faceboook',Twitter='$twitter',LinkedIn='$linkedIn',GooglePlus='$GooglePlus',UpdateDate='$date' where Id=".$_SESSION['Id']."" ;
                                  if($con->query($command2)===TRUE){
                                      $_SESSION['error']="";
                                      echo '<script type="text/javascript">','myFunction("Social Links Updated...");','</script>';
                                  }
                             }
                             else{
                                    $command="Insert into applicantSocialLinks(Id,Facebook,Twitter,LinkedIn,GooglePlus,UpdateDate) values('".$_SESSION['Id']."','$faceboook','$twitter','$linkedIn','$GooglePlus','$date')";
                                    if($result=$con->query($command))
                                    {
                                        $_SESSION['error']="";
                                         echo '<script type="text/javascript">','myFunction("Social Links Uploaded...");','</script>';
                                    
                                        if($Resume==4){
                                                $command2="Update applicant set Resume='1' where Id=".$_SESSION['Id']."" ;
                                               if($con->query($command2)===TRUE){
                                                   $_SESSION['Resume']=1;

                                               }
                                        }
                                    }
                                    else {
                                        $_SESSION['error']="";
                                        echo '<script type="text/javascript">','myFunction("Unable to Upload Social Links...");','</script>';
                                    }
                             }
                        
                    }
                    
                    
                    if(isset($_GET['DeleteEducation']))
                    {
                        $Id=$_GET['Id'];
                        $command="Delete from educationDetail where Id=$Id";

                         if($result=$con->query($command))
                        {
                            echo '<script type="text/javascript">','myFunction("Education Detail Deleted..");','</script>';
                        }
                    }
                    
                    if(isset($_GET['DeleteExp']))
                    {
                        $Id=$_GET['Id'];
                        $command="Delete from applicantJobExperience where Id=$Id";

                         if($result=$con->query($command))
                        {
                            echo '<script type="text/javascript">','myFunction("Experience Detail Deleted..");','</script>';
                        }
                    }
                }
                
?>
        <!--/////////////////////////////////////////////////////-->
        
         <?php
 include './footer.html';
 
            }
 ?>
    </body>
</html>