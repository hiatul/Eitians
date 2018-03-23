<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
    if($_SESSION['LoginStatus']=='0')
            {
                header('location: home.php');
            }
            else{
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
        <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">

<link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">

<!-- Google Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,900,300" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">
	
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
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
            function backgch(){
            document.getElementById("JobApplied").style.backgroundColor="#357ebd";
            document.getElementById("JobApplied").style.borderLeft="6px solid gray";
            document.getElementById("JobApplied2").style.color="white";
            document.getElementById("JobApplied3").style.color="white";
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
            <div class="col-8 content"  style="">
                <div>
                <p style="margin-top: 0px; font-family: Open Sans; font-size: 22px; color: black; display: inline-block; height: 40px; border-bottom: 2px solid #357ebd;">Job Applied</p>
                </div>
                
                
                <div class="" style="height:auto; padding: 0px;margin-left: 0px;margin-bottom: 40px;">
                               
                              <?php
                                   if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                 include './../Connection/connect.php';
                                        
                                 $num_rec_per_page=3;
                                 $total_records=0;
                                 $rowcount=0;

                               if($connection==1)
                                    {       
                                            
                                    if (isset($_GET["page"]))
                                        { $page  = $_GET["page"]; }
                                     else { $page=1; }; 
            
                                    $start_from = ($page-1) * $num_rec_per_page;

                                         $command="Select j.Rid,j.Jid, j.Title,j.Location,j.Category,j.Type,j.Experience,j.Salary,j.Tags,j.Description,j.PostDate,j.Deadline,j.Shift,j.JobSpec,j.TechGuide,a.ApplyDate from  jobpost j INNER JOIN applicantapplied a WHERE j.Jid=a.Jid AND a.Aid=".$_SESSION['Id']." ORDER BY ApplyDate DESC LIMIT $start_from, $num_rec_per_page ";
                                         $command2="Select j.Rid,j.Jid,j.Title,j.Location,j.Category,j.Type,j.Experience,j.Salary,j.Tags,j.Description,j.PostDate,j.Deadline,j.Shift,j.JobSpec,j.TechGuide,a.ApplyDate  from  jobpost j INNER JOIN applicantapplied a WHERE j.Jid=a.Jid AND a.Aid=".$_SESSION['Id']."";

                                         if($result=$con->query($command))
                                        {     $rowcount=$result->num_rows;
                                        
                                            if($rowcount==0)
                                            {
                                                echo "No result";
                                            }else{
                                                   while($row = $result->fetch_assoc())
                                                      {     $rr=$row['Rid'];
                                                                $commandlogo="SELECT Logo FROM recruitersignup WHERE Rid=$rr";
                                                                   $resultlogo=$con->query($commandlogo);             
                                                                  $datalogo=$resultlogo->fetch_assoc();

                                                        ?><div class="col-12 jobstyle" style="height: auto;margin-bottom: 15px; box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);">
                                     
                                                                    <div  class="col-2 imm">
                                                                        <img src='<?php echo $datalogo['Logo'];?>' style="height: 80px; width: 80%;margin-top: 15px;">
                                                                    </div>

                                                                          <div  class="col-10 basic">

                                                                             <div  class="col-12 basic" style="">
                                                                              <div style="width:50%;float:left;">
                                                                                      <form method="GET" action="Applicant_SingleJOb.php" style="padding: 0px;margin: 0px;">
                                                                                                            <button  style="cursor: pointer;text-decoration: none; background: none;border: none;color: #357ebd;font-size: 20px;" type="submit" name="ReadMore..."><?php echo $row['Title'];?></button>
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                          </form>
                                                                              </div>
                                                                              <div class="basic" style="width:50%;float:left;">
                                                                                  <p class="pp" style="font-style: oblique;text-align: right;" ><i class="fa fa-calendar" style="color: #357ebd;"></i> <?php echo $row['ApplyDate'];?></p>
                                                                              </div>
                                                                              </div>

                                                                  <div  class="col-12 basic">
                                                                  <div class="col-4 basic" >
                                                                      <p class="pp" id="Location"> <i class="fa fa-map-marker" style="color: #357ebd;"></i> <?php echo $row['Location'];?></p>
                                                                  </div>
                                                                  <div class="col-4 basic" >
                                                                      <p class="pp" id="Category"><i class="fa fa-briefcase" style="color: #357ebd;"></i> <?php echo $row['Category'];?></p>
                                                                  </div>
                                                                  <div class="col-4 basic" >
                                                                      <p class="pp" id="Type"><i class="fa fa-clock-o" style="color: #357ebd;"></i> <?php echo $row['Type'];?></p>
                                                                  </div>

                                                                  </div>

                                                                                      <div  class="col-12" style="padding:10px;height: auto;padding-top: 5px;padding-left: 0px;">
                                                                                          <p  class="pp"style=" height: 60px;overflow: hidden;text-align: justify; font-size: 12px; " id="Desc"> <?php   echo $row['Description'];?>;
                                                                                           </p>
                                                                                          <form method="GET" action="Applicant_SingleJOb.php" style="padding: 0px;margin: 0px;">
                                                                                                            <button  style="cursor: pointer;text-decoration: none; background: none;border: none;color: #357ebd;" type="submit" name="ReadMore...">Read More.</button>
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                          </form>
                                                                                            
                                                                                      </div>
                                                                   

                                                                          </div>

                                                          </div>               
                                                     <?php     
                    
                                                      }
                                            }

                                        }
                                        
                                        if($rowcount>0){
                                            $rs_result=$con->query($command2);
                                            //run the query
                                            $total_records = $rs_result->num_rows;
                            //                echo $total_records;
                                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            //                echo $total_pages;
                                            echo'<div class="pagination">';
                                            echo "<a  href='ApplicantJobsApplied.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                                            for ($i=1; $i<=$total_pages; $i++) {
                                                if($i==$page)
                                                {
                                                    echo "<a class='active' href='home.php?page=".$i."'>".$i."</a> ";
                                                }
                                                  else{      echo "<a href='ApplicantJobsApplied.php?page=".$i."'>".$i."</a> "; 

                                                  }
                                             }; 
                                            echo "<a href='ApplicantJobsApplied.php?page=$total_pages'>".'&raquo;'."</a>"
                                                    . "</div> "; // Goto last page


                                            }
                                           
                                    }

                                ?>
                                    
                               
                                </div>
                

            </div>
        </div>

        
         <?php
 include './footer.html';
 
            }
 ?>
    </body>
</html>