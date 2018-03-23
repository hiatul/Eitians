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
   $rid=$_SESSION["Rid"];
   
    $Rid1=$_GET['Rid'];
    $Jid1=$_GET['Jid'];
    
                                      
  
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    <link rel="stylesheet" type="text/css" href="../css/User_register.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Active_job.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu.css">
    <link rel="stylesheet" type="text/css" href="../css/Recuriter_Dashboard_Menu_Logo_Name.css">
    <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
   


    
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
        document.getElementById("Active").style.backgroundColor="#357ebd";
        document.getElementById("Active").style.borderLeft="6px solid gray";
         document.getElementById("ActivePara").style.color="white";
         document.getElementById("Activeicon").style.color="white";
        
    }
</script>
</head>
<body onload="chnng()">
       <?php include './RecuriterHeader.php';?>
    
         <div  class="bgimg col-12" style="padding-top: 0;padding-bottom: 0; height:100px; ">
                                <div class="col-12" style="  padding: 0;">
                                            <ul class="breadcrumb">
                                                <li><a href="Recuriter_Dashboard.php" style="color: white;">Dashboard</a></li>
                                                      <li><a href="Recuriter_Dashboard_Active_Job.php" style="color: white;">Active Jobs</a></li>

                                            </ul>
                                    <p class="para"style="color: white;font-size: 30px;" >Active Jobs</p>
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
                           <div class="col-8 content" style="padding: 0px;height: auto;">
                               <p class="profile ">Active Jobs</p>
                              
                               
                                <div class="col-12 " style="height:auto; padding: 0px;margin-left: 0px;margin-bottom: 40px;">
                                    
                                    
                               
                              <?php
                                   if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                                 
                                     include './../Connection/connect.php';
                                         $num_rec_per_page=4;
                                         $total_records=0;
                                         $rowcount=0;
                                 

                               if($connection==1)
                                    {       
                                         if (isset($_GET["page"]))
                                        { $page  = $_GET["page"]; }
                                        else { $page=1; }; 
                                        $start_from = ($page-1) * $num_rec_per_page; 
                                   
                                   
                                         $command="Select Title,Location,Category,Type,Experience,Salary,Tags,Description,PostDate,Deadline,Shift,JobSpec,TechGuide,Rid,Jid from  jobpost WHERE Rid=$rid and Flag=1 LIMIT $start_from, $num_rec_per_page";
                                         $command21="Select Title,Location,Category,Type,Experience,Salary,Tags,Description,PostDate,Deadline,Shift,JobSpec,TechGuide,Rid,Jid from  jobpost WHERE Rid=$rid and Flag=1";
                                           
                                         $result=$con->query($command);
                                          $rowcount=$result->num_rows;
                                         if( $rowcount>0)
                                        {     
                                               while($row =$result->fetch_assoc())
                                                  {   $rr=$row['Rid'];
                                                        $commandlogo="SELECT Logo FROM recruitersignup WHERE Rid=$rr";
                                                           $resultlogo=$con->query($commandlogo);             
                                                          $datalogo=$resultlogo->fetch_assoc();
                                                  ?>
                                    <div class="col-12 jobstyle" style="height: auto;margin-bottom: 15px; box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);">
        
                                    <div  class="col-2 imm">
                                        <img src='<?php echo $datalogo['Logo'];?>' style="height: 120px; width: 90%;margin-top: 15px;">
                                    </div>

                                                <div  class="col-10 basic">

                                                   <div  class="col-12 basic" style="">
                                                    <div style="width:50%;float:left;">
                                                    <form method="GET" action="Recuriter_SingleJob.php" style="padding: 0px;margin: 0px;">
                                                                                                            <button  style="cursor: pointer;text-decoration: none; background: none;border: none;color: #357ebd;font-size: 20px;" type="submit" name=""><?php echo $row['Title'];?></button>
                                                                                                             <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                                                              <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                                          </form>
                                                    </div>
                                                    <div class="basic" style="width:50%;float:left;">
                                                        <p class="pp" style="font-style: oblique;text-align: right;" ><i class="fa fa-dollar" style="color: #357ebd;"></i> <?php echo $row['Salary'];?> </p>
                                                    </div>
                                                    </div>

                                        <div  class="col-12 basic">
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Location"> <i class="fa fa-map-marker" style="color: #357ebd;"></i> <?php echo $row['Location']." ";?></p>
                                        </div>
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Category"><i class="fa fa-briefcase" style="color: #357ebd;"></i> <?php  echo $row['Category']." "; ?></p>
                                        </div>
                                        <div class="col-4 basic" >
                                            <p class="pp" id="Type"><i class="fa fa-clock-o" style="color: #357ebd;"></i> <?php echo $row['Type']." ";?></p>
                                        </div>
                                        
                                        </div>

                                                            <div  class="col-12" style="padding:10px;height: auto;padding-top: 5px;padding-left: 0px;">
                                                                
                                                                <p  class="pp"style=" height: 60px; overflow: hidden;text-align: justify; font-size: 12px; " id="Desc"> <?php echo $row['Description']." ";  ?>
                                                                </p>
                                                                <form method="GET" action="Recuriter_SingleJob.php" style="padding: 0px;margin: 0px;">
                                                                         <button  style="cursor: pointer;text-decoration: none; background: none;border: none;color: #357ebd;" type="submit" name="ReadMore">Read More...</button>
                                                                          <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                                                           <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                                                </form>
                                                                           
                                                            </div>
                                          <div  class="col-12" style="height:auto;padding: 0px;margin: 0px;">
                                              <form method="GET" action="Recuriter_Dashboard_Active_Job.php" style="padding: 0px;margin: 0px;">
                                              <button  style=" cursor: pointer;height: 40px;float: right; background: #357ebd;border: none;color: white;" type="submit" value="DeleteJob" name="DeleteJob">Delete Job <i class="fa fa-angle-right"></i></button>
                                              <input type="hidden" name="Rid" value='<?php echo $row['Rid'];?>'>
                                               <input type="hidden" name="Jid" value='<?php echo $row['Jid'];?>'>
                                              </form>
                                           </div>

                                                </div>

                                </div>    
                                    
                                 <?php   
                                 }    }  
                               
                                 if($rowcount>0){
                                            $rs_result=$con->query($command21);
                                            //run the query
                                            $total_records = $rs_result->num_rows;
                            //                echo $total_records;
                                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            //                echo $total_pages;
                                            echo'<div class="pagination">';
                                            echo "<a  href='Recuriter_Dashboard_Active_Job.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                                            for ($i=1; $i<=$total_pages; $i++) {
                                                if($i==$page)
                                                {
                                                    echo "<a class='active' href='Recuriter_Dashboard.php?page=".$i."'>".$i."</a> ";
                                                }
                                                  else{      echo "<a href='Recuriter_Dashboard_Active_Job.php?page=".$i."'>".$i."</a> "; 

                                                  }
                                             }; 
                                            echo "<a href='Recuriter_Dashboard_Active_Job.php?page=$total_pages'>".'&raquo;'."</a>"
                                                    . "</div> "; // Goto last page


                                            }
                                 
                               }   
                                 
                                 ?>          
                                      

                                </div>
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
    refresh = setTimeout(function(){window.location.href = "Recuriter_Dashboard_Active_Job.php";},3000);
     
}

       
</script>  
                   
                    

<?php
 if(isset($_GET['DeleteJob']))
      {   
             include './../Connection/connect.php';
             if($connection==1)
               {                 
                        $command="DELETE FROM jobpost  WHERE Jid=$Jid1 and Rid=$Rid1";
                        if($result=$con->query($command))
                        {
                             $commanda="DELETE FROM applicantapplied  WHERE Jid=$Jid1 and Rid=$Rid1";
                             $resulta=$con->query($commanda);
                        echo '<script type="text/javascript">','myFunction("Job has been Deleted..");','</script>';
                        }
                    }
        }                
?>
    
    
 <?php
 include './footer.html';
 ?>










   
</body>
</html>