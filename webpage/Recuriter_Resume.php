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
    $Rid=$_SESSION["Rid"];
    
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
                                    <p style="font-family: global6;font-size: 20px;padding: 10px;margin: 0px;">Resumes of Candidates for Various Jobs</p>    
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
                                    {    if (isset($_GET["page"]))
                                        { $page  = $_GET["page"]; }
                                        else { $page=1; }; 
                                        $start_from = ($page-1) * $num_rec_per_page; 
                                   
                                         $ii=0;
                                         $command="Select Title,Location,Category,Type,Experience,Salary,Tags,Description,PostDate,Deadline,Shift,JobSpec,TechGuide,Rid,Jid from  jobpost WHERE Rid=$Rid  LIMIT $start_from, $num_rec_per_page ";
                                         $commandp2="Select Title,Location,Category,Type,Experience,Salary,Tags,Description,PostDate,Deadline,Shift,JobSpec,TechGuide,Rid,Jid from  jobpost WHERE Rid=$Rid";
                                           
                                         $result=$con->query($command);
                                          $rowcount=$result->num_rows;
                                         if( $rowcount>0)
                                        {     
                                               while($row =$result->fetch_assoc())
                                                  {   $ii++;
                               ?>     
                               
                                 <div class="col-12 " style=" background: #f1f1f1;height: auto; padding: 0px;border-bottom: 1px solid lightgray;">
                                     <div style="width: 10%;float: left;padding: 0px;height: 60px;">
                                    <p style="font-family: global6;font-size: 16px;padding: 0px;padding-left: 10px;margin: 5px;"><?php  echo $ii.")"; ?></p>    
                                    </div>
                                    <div style="width: 50%;float: left;padding: 0px;height: 60px;">
                                    <p style="font-family: global6;font-size: 16px;padding:2px;margin: 5px;"><?php  echo $row['Title']." "; ?></p>    
                                    </div>
                                     <div style="width: 40%;float: left;height: 60px;padding: 0px;margin: 0px;">
                                                                     <form method="GET" action="Recuriter_Resume_Single.php" style="padding: 0px;margin: 0px;">
                                                                         <button class="col-9 submitbtn"  style="font-size: 15px;margin: 10px;height: 40px;cursor: pointer;" type="submit" name="View">View</button>
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                                              <input type="hidden" name="Title" value='<?php echo $row['Title'];?>'>
                                                                     </form>
                                     </div>
                                </div>
                               
                               
                                   <?php   
                                 }    }
                                 
                                 if($rowcount>0){
                                            $rs_result=$con->query($commandp2);
                                            //run the query
                                            $total_records = $rs_result->num_rows;
                            //                echo $total_records;
                                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            //                echo $total_pages;
                                            echo'<div class="pagination">';
                                            echo "<a  href='Recuriter_Resume.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                                            for ($i=1; $i<=$total_pages; $i++) {
                                                if($i==$page)
                                                {
                                                    echo "<a class='active' href='Recuriter_Dashboard.php?page=".$i."'>".$i."</a> ";
                                                }
                                                  else{      echo "<a href='Recuriter_Resume.php?page=".$i."'>".$i."</a> "; 

                                                  }
                                             }; 
                                            echo "<a href='Recuriter_Resume.php?page=$total_pages'>".'&raquo;'."</a>"
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