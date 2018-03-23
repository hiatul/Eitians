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
    $Rid=$_GET['Rid'];
    $Jid=$_GET['Jid'];
    $Id=$_GET['Id'];
    $Title=$_GET['Title'];
    $path1="../ApplicantResume/";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Active_job.css">
    <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css">
    <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Resume.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
              .pagination{
        
        float: right;
        padding-top: 20px;
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
    function chnng()
    {
        document.getElementById("Resume").style.backgroundColor="#357ebd";
        document.getElementById("Resume").style.borderLeft="6px solid gray";
         document.getElementById("ResPara").style.color="white";
         document.getElementById("Resicon").style.color="white";
        
    }
</script>
</head>
<body onload="chnng()">
     <?php include './RecuriterHeader.php';?>
   
  

         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                    <div class="col-12" style="  padding: 0;padding-bottom: 10px;">
                                <ul class="breadcrumb">
                                    <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                    <li><a href="Recuriter_Resume.php"style="color: white;">Resume</a></li>
                                  
                                </ul>
                     </div>
              <p class="para"style="color: white;font-size: 40px;padding-bottom: 10px;" > <?php echo $_SESSION['FirstName']." ".$_SESSION['LastName']; ?></p>
                    
             
          </div>
    
                   <div class="col-12" style="height: auto;" >
                       
<!--                       <div class="col-10" style="float: none;margin: auto;height: auto;padding: 0px;margin-top: 50px;">-->
                        <div class="col-3" style="padding: 0px;">
                            <?php
                           include '../webpage/Recuriter_Dashboard_Menu_Logo_Name.php';
                           ?>
                            
                           <?php
                           include '../webpage/Recuriter_Dashboard_Menu.php';
                           ?>
                        </div>
      
                           <div class="col-8 content" style="padding-top: 0px;margin-top: 0px;">
                               
                                <div class="col-12" style="height: auto; padding: 0px;margin-bottom: 20px;border-bottom: 2px solid #357ebd;">
                                    <p style="font-family: global6;font-size: 20px;padding: 10px;margin: 0px;">Resumes for <?php echo " ".$Title." ";?></p>    
                                </div>
                               
                               <?php
                                if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                    
                                   
                                 include './../Connection/connect.php';
                                  $num_rec_per_page=5;
                                 $total_records=0;
                                 $rowcount=0;
                                if($connection==1)
                                    { 
                                  if(isset($_GET['Delete']))
                                        {    $commanda="DELETE FROM applicantapplied  WHERE Aid=$Id and Jid=$Jid and Rid=$Rid";
                                              $resulta=$con->query($commanda);
                                              // echo '<script type="text/javascript">','myFunction("Job has been Deleted..");','</script>';
                                       }  
                                       
                                        if(isset($_GET['Download']))
                                        {     $command7="SELECT * FROM resume WHERE Aid=$Id";
                                          $result7=$con->query($command7);
                                           $data7=$result7->fetch_assoc();   
                                          
                                       }  
                                       
                                   if (isset($_GET["page"]))
                                        { $page  = $_GET["page"]; }
                                        else { $page=1; }; 
                                        $start_from = ($page-1) * $num_rec_per_page; 
                                   
                                          $i=0;
                                         $command="SELECT applicantapplied.Rid,applicantapplied.Jid,applicantapplied.ResumePath,applicantapplied.Aid,applicant.FirstName, applicant.LastName FROM applicant INNER JOIN applicantapplied ON applicant.Id = applicantapplied.Aid Where applicantapplied.Rid=$Rid and applicantapplied.Jid=$Jid  LIMIT $start_from, $num_rec_per_page";
                                          $command2="SELECT applicantapplied.Rid,applicantapplied.Jid,applicantapplied.ResumePath,applicantapplied.Aid,applicant.FirstName, applicant.LastName FROM applicant INNER JOIN applicantapplied ON applicant.Id = applicantapplied.Aid Where applicantapplied.Rid=$Rid and applicantapplied.Jid=$Jid";
                                           
                                         if($result=$con->query($command))
                                         { $rowcount=$result->num_rows;
                                         if($rowcount==0)
                                         {
                                         echo '<div class="col-10 " style=" padding: 0px; height: auto; ">
                                            <p style="font-family: global6;font-size: 18px;padding: 0px;margin: 0px;" >No one has Applied yet....</p>
                                            </div>';
                               
                                             
                                         }
                                         else {
                                               while($row = $result->fetch_assoc())
                                                  {   $i++;
                               ?>     
                               
                                 <div class="col-12 " style=" background: #f1f1f1;height: auto; padding: 0px;border-bottom: 1px solid lightgray;">
                                     <div class="col-5" style="padding: 0px;margin: 0px;">
                                     <div style="width: 20%;float: left;padding: 0px;height: 60px;">
                                    <p style="font-family: global6;font-size: 16px;padding: 0px;padding-left: 10px;margin: 5px;"><?php  echo $i.")"; ?></p>    
                                    </div>
                                    <div style="width: 80%;float: left;padding: 0px;height: 60px;">
                                    <p style="font-family: global6;font-size: 16px;padding:2px;margin-top: 5px;"><?php  echo $row['FirstName']." ".$row['LastName']; ?></p>    
                                    </div>
                                     </div>
                                     <div class="col-7" style="margin: 0px;padding: 0px;">
                                         
                                     <div style="width: 30%;float: left;height: 60px;padding: 0px;margin: 0px;">
                                                              <form method="GET" action="Recuriter_Resume_single_View.php" style="padding: 0px;margin: 0px;">
                                                                         <button class=" submitbtn"  style="width: 90%;font-size: 15px;margin: 10px;height: 40px;cursor: pointer;" type="submit" name="View">View</button>
                                                                         <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                       <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>                  
                                                                        <input type="hidden" name="Id" value='<?php echo $row['Aid'];?>'>     
                                                                          <input type="hidden" name="Title" value='<?php echo $Title?>'>     
                                                             </form>
                                     </div>
                                         
                                     <div style="width: 30%;float: left;height: 60px;padding: 0px;margin: 0px;">
                                         <form method="GET" action="Recuriter_Resume_Single.php" style="padding: 0px;margin: 0px;">
                                                                       <button class=" submitbtn"  style="width: 90%;font-size: 15px;margin: 10px;height: 40px;cursor: pointer;" type="submit" name="Delete">Delete</button>
                                                                      <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                       <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>                  
                                                                        <input type="hidden" name="Id" value='<?php echo $row['Aid'];?>'>     
                                                                     
                                                                     </form>
                                     </div>
                                     <div style="width: 40%;float: left;height: 60px;padding: 0px;margin: 0px;">
                                                                     <form method="GET" action="Recuriter_Resume_Single.php" style="padding: 0px;margin: 0px;">
                                                                         <button class=" submitbtn"  style="width: 90%;font-size: 15px;margin: 10px;height: 40px;cursor: pointer;" type="submit" name="Download">
                                                                             <a href="<?php echo $path1.$row['ResumePath'];?>" style="text-decoration: none;color: white;">  Download </a>
                                                                         </button>
                                                                        
                                                                           <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                       <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>                  
                                                                        <input type="hidden" name="Id" value='<?php echo $row['Aid'];?>'>  
                                                                     </form>
                                     </div>
                                      </div>
                                </div>
                               
                               
                                   <?php   
                                 }    }  
                                 
                                         }
                                 
                                         if($rowcount>0){
                                            $rs_result=$con->query($command2);
                                            //run the query
                                            $total_records = $rs_result->num_rows;
                            //                echo $total_records;
                                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            //                echo $total_pages;
                                            echo'<div class="pagination">';
                                            echo "<a  href='Recuriter_Resume_Single.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                                            for ($i=1; $i<=$total_pages; $i++) {
                                                if($i==$page)
                                                {
                                                    echo "<a class='active' href='Recuriter_Dashboard.php?page=".$i."'>".$i."</a> ";
                                                }
                                                  else{      echo "<a href='Recuriter_Resume_Single.php?page=".$i."'>".$i."</a> "; 

                                                  }
                                             }; 
                                            echo "<a href='Recuriter_Resume_Single.php?page=$total_pages'>".'&raquo;'."</a>"
                                                    . "</div> "; // Goto last page


                                            }
                                 
                                                  }   
                                 
                                 ?>          
                                      
                           </div>
                           </div>
                           
                     



 <?php
 include './footer.html';
 ?>










   
</body>
</html>