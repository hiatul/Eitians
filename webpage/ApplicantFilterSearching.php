<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    
include '../BooleanSearchParser/Splitter.php';
include '../BooleanSearchParser/Parser.php';

 $path1="../ApplicantResume/";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <link rel="stylesheet" type="text/css" href="../css/main.css">
<!--    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">-->
       <link rel="stylesheet" type="text/css" href="../css/TalentSearch.css">
     <link rel="stylesheet" type="text/css" href="../css/JobDialog.css">
     <link rel="stylesheet" type="text/css" href="../css/ApplicantFilterSearching.css">
     <link rel="stylesheet" type="text/css" href="../css/skills.css">
    <link rel="stylesheet" type="text/css" href="../css/seekbar.css">   
            <link rel="stylesheet" type="text/css" href="../css/pagination.css">

        <link rel="stylesheet" type="text/css" href="../css/ApplicantResumeBuild.css"

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
        
    <!--Google Loation autocomplete-->   
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyCDC1VIuedy_5zdEluB3HNiqESWVkSp9Jk"></script>
    <!--//-->
    
    <script type="text/javascript">
     function ref()
        {
            refresh = setTimeout(function(){window.location.href = "ApplicantFilterSearching.php";},3);
        }
        
  
        
    </script>
</head>
   <?php          
                       if(!isset($_SESSION)) 
                                    { 
                                        session_start(); 
                                    } 
                         
                                include './../Connection/connect.php';

                              if($connection==1)
                                       {     
                                          
                                        
    
      ?>

   
    
    
    
    <body style="">
        
          <div class="col-12" style="background: #555; padding-top: 30px; padding-bottom: 10px;">
            <p class="headpara">Search Technical Professionals</p>
            <p class="error"><?php echo @$_SESSION['SearchError']; ?></p>
            <form method="GET" action="" novalidate>
            
            <div class="col-6" style="">
                <div class="styled-input2 Enterborder">
                    <input class="inpstyle" type="text" name="SearchText" value='<?php echo @$_SESSION['SearchText'];?>' required/>
                        <label><i class="fa fa-search" aria-hidden="true"></i> &nbsp; Job Title, Keyword, Name</label>
                        <span></span> </div>
            </div>
            <div class="col-3" style="">
               <div class="styled-input2 Enterborder">
                   <input class="inpstyle" type="text" name="SearchLocation" value='<?php echo @$_SESSION['SearchLocation'];?>' id="autocomplete" placeholder="" required/>    
                               <label><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Location</label>
                               <span></span> </div>
            </div>
            <div class="col-3" style="">
                <button class="col-3 submitbtn Enterborder" style=" width: 100%; height: 50px; margin-bottom: 20px;" type="submit" name="Search">Find Candidates</button>

            </div>
                
            </form>
        </div>
        
        
         <div  class="col-12" style="height:auto;background: #f1f1f1;padding-top:10px;">
                 
                              <div class="col-2" style="height: auto; float:left; padding: 1px; border: none;border-right: 1px solid lightgray;">
                                  <form  action="ApplicantFilterSearching.php" method="get" >
                                       <div style="height: auto;border-bottom: 1px solid lightgray;padding-bottom:15px;">
                                           <p  class="pstyle"style="font-size:18px;"><i class="fa fa-filter"></i><b>  Filters</b></p>
                                           <button class="col-10 submitbtn1 "  style="float: none;" type="reset" name="Reset">Reset</button>
                                                  <button class=" col-10 submitbtn1"  style="float: none;margin-top: 15px;" type="submit" name="Apply">Apply</button>
                                              
                                         </div>
                                       
                                       <div  class="sidelist"style="overflow: hidden;height: 100px;">
                                                    <div class="" style=" width: 100%;float: left;">
                                                          <p  class="pstyle"style="">Expected Salary</p>
                                                    </div>
                                                    <div class="" style=" width: 50%;float: left;">
                                                              <p  class="pstyle"style="font-size: 12px;color: #357ebd;">From</p>
                                                    </div>
                                                   <div class="" style=" width: 50%;float: left;">
                                                              <p  class="pstyle"style="font-size: 12px;color: #357ebd;">To</p>
                                                  </div>

                                                   <div class="" style="width: 50%; float: left;padding: 0px;margin: 0px;">
                                                       <input   class=""style="width: 60%;<?php echo @$_SESSION["FilterError1"];?>"  type="number" id="ExpSal1"  name="ExpSal1"  />
                                                                             <label>$</label>
                                                    </div>

                                                  <div class="" style="width: 50%; float: left;padding: 0px;margin: 0px;">
                                                                           <input class=""  style="width: 60%;<?php echo @$_SESSION["FilterError1"];?>" type="number" id="ExpSal2" name="ExpSal2"  />
                                                                             <label>$</label>
                                                   </div>
                                                  
                                       
                                       </div>
                                      
                                      
                                      
                                      
                                        <div  class="sidelist" style="overflow: hidden;height: 100px;">
                                                  <div class="" style=" width: 100%;float: left;">
                                                       <p  class="pstyle"style="">Experience</p>
                                                  </div>
                                                  <div class="" style=" width: 50%;float: left;">
                                                       <p  class="pstyle"style="font-size: 12px;color: #357ebd;">From</p>
                                                  </div>
                                                 <div class="" style=" width: 50%;float: left;">
                                                       <p  class="pstyle"style="font-size: 12px;color: #357ebd;">To</p>
                                                  </div>
                                            
                                                  <div class="" style="width: 50%; float: left;padding: 0px;margin: 0px;">
                                                      <input   style="width: 60%;<?php echo @$_SESSION["FilterError2"];?>"type="number" id="SkillExp1"  name="SkillExp1"  />
                                                            <label>Yrs</label>
                                                           
                                                  </div>
                                            
                                                  <div class="" style="width: 50%; float: left;padding: 0px;margin: 0px; ">
                                                           <input  style="width: 60%; <?php echo @$_SESSION["FilterError2"];?>" type="number" id="SkillExp2" name="SkillExp2"  />
                                                            <label>Yrs</label>
                                                           
                                                  </div>
                                            
                                                   
                                                  
                                                                
                                       </div>
                         
                                  
                                  
                                      <div  class="sidelist"style="">
                                             <p  class="pstyle"style="">Location</p>
                                             <div class="scroll" style="">
                                                    <?php
                                                                   $command="SELECT  DISTINCT USLocation FROM USCITY";
                                                                    $result=$con->query($command);
                                                                  while($data=$result->fetch_assoc())
                                                                         {
                                                                     ?>
                                                      <input  type="checkbox" name="Location[]" value='<?php echo $data['USLocation'].""; ?>'> <label style="margin: 0px;padding: 0px;font-size: 12px;"><?php echo $data['USLocation'].""; ?></label><br>
                                                    <?php }   ?>
                                                  </div>
                                         </div>
                                  
                                             <div  class="sidelist"style="">
                                                     <p  class="pstyle"style="">Relocation</p>
                                                    <div class="scroll" style="">
                                                    <?php
                                                                $commandR="SELECT DISTINCT options FROM Relocation";
                                                                $resultR=$con->query($commandR);
                                                                while($dataR=$resultR->fetch_assoc())
                                                                         {
                                                                     ?>
                                                      <input  type="checkbox" name="ReLocate[]" value='<?php echo $dataR['options'].""; ?>'> <label style="margin: 0px;padding: 0px;font-size: 12px;"><?php echo $dataR['options'].""; ?></label><br>
                                                    <?php }   ?>
                                                  </div>
                                         </div>
                                  
                                  
                                      
                                   <div  class="sidelist"style="">
                                                  <p  class="pstyle"style="">Skills</p>
                                                  <div class="scroll" style="">
                                                       <?php
                                                                    $command2="SELECT DISTINCT skill FROM FilterSkills";
                                                                $result2=$con->query($command2);
                                                                 while($data2=$result2->fetch_assoc())
                                                                         {
                                                                     ?>
                                                      <input  type="checkbox" name="Skills[]" value='<?php echo $data2['skill'].""; ?>'> <label style="margin: 0px;padding: 0px;font-size: 12px;"><?php echo $data2['skill'].""; ?></label><br>
                                                               <?php }   ?>
                                                  </div>
                                         </div>
                                  
                                     
                                
                                  
                                      <div  class="sidelist"style="">
                                                   <p  class="pstyle"style="">Degree</p>
                                                   <div class="scroll" style="">
                                                        <?php
                                                                   $command4="SELECT DISTINCT EduDegree FROM FilterDegree";
                                                                    $result4=$con->query($command4);
                                                                    while($data4=$result4->fetch_assoc())
                                                                         {
                                                                     ?>
                                                      <input  type="checkbox" name="Degree[]" value='<?php echo $data4['EduDegree'].""; ?>'> <label style="margin: 0px;padding: 0px;font-size: 12px;"><?php echo $data4['EduDegree'].""; ?></label><br>
                                                                   <?php }   ?>
                                                  </div>
                                         </div>
                                  
                                       <?php } ?>
                                  </form>

                              </div>
             
                                         
                        
                                              
                      
             
                  
                                
             
                               <div   class="col-10"  style="float: left;padding: 0px;margin: 0px;height: auto;padding-bottom:20px;padding-top: 10px;">
                                            <?php
                                
                                 $num_rec_per_page=5;
                                 $total_records=0;
                                 $rowcount=0;
                                 
                                 
                                     $SearchResult=  $_SESSION['SearchResult'];
                                                                  
                                  
                                  if (isset($_GET["page"]))
                                        { $page  = $_GET["page"]; }
                                        else { $page=1; }; 
                                        $start_from = ($page-1) * $num_rec_per_page; 
                                        $i=0;
                                   
                                       
                                         if(sizeof($SearchResult)==0)
                                         {
                                         echo '<div class="col-12 " style=" padding: 0px; height: auto; ">
                                            <p style="font-family: global6;font-size: 18px;padding: 0px;margin: 0px;" >Opps...No result found.</p>
                                            </div>';
                               
                                             
                                         }
                                         else {
//                                             echo sizeof($SearchResult);
                                             $temp=$SearchResult;
                                             $subArray= array_splice($temp, $start_from, $num_rec_per_page);
//                                             echo sizeof($subArray);
                                            foreach ($subArray as $value) 
                                             {
//                                            echo "$value <br>";
                                            
                                          
                                                                    $command5="SELECT * FROM  applicantprofile WHERE Id=$value";
                                                                    $result5=$con->query($command5);
                                                                    $data5=$result5->fetch_assoc();
                                                                    
                                                                   $command6="SELECT  * FROM applicantJobCategroy WHERE Id=$value";
                                                                   $result6=$con->query($command6);
                                                                   $data6=$result6->fetch_assoc();
                                                                   
                                                                    $command7="SELECT * FROM applicantJobExperience WHERE Aid=$value";
                                                                   $result7=$con->query($command7);
                                                                   $data7=$result7->fetch_assoc();
                                                                   
                                                                   $command8="SELECT  * FROM educationDetail WHERE Aid=$value";
                                                                    $result8=$con->query($command8);
                                                                    
                                                                   $command9="SELECT  Skills FROM applicantSkills WHERE Aid=$value";
                                                                   $result9=$con->query($command9);
                                                                   
                                                                   $command10="SELECT  Path FROM resume WHERE Aid=$value";
                                                                   $result10=$con->query($command10);
                                                                   $data10=$result10->fetch_assoc();
                                                                   
                                                        
                                       
                                ?>
                                   
                                   <div class="col-11 jobstyle" style="margin-left: 10px;height: auto;margin-bottom: 15px;background: white; box-shadow: 0px 0px 4px 2px rgba(0,0,0,0.1);clear: both;float: none;margin: auto;overflow: hidden;margin-bottom: 10px;">
                                         
                                     <div  class="col-3 imm" style="padding-top: 5px;">
                                        <img src='<?php echo $data5['AImage'];?>' style="height: 150px; width: 100%;margin-top:5px;padding-top: 0px;">
                                    </div>
                                               
                                                <div  class="col-9 basic">

                                                   <div  class="col-12 basic" style="">
                                                    <div style="width:100%;float:left; cursor: pointer;">
                                                        
                                                        
                                                                                         <form method="GET" action="Filter_Resume_View.php" style="padding: 0px;margin: 0px;">
                                                                                            <button class="cursor" style="margin: 0px;padding-left: 0px;text-decoration: none; background: none;border: none;color: #357ebd;font-size: 20px;" type="submit" name="Resumefull"><b><?php echo $data5['FirstName']." ".$data5['LastName'];?></b></button>
                                                                                                                <input type="hidden" name="Id" value='<?php echo $data5['Id'];?>'>
                                                                                          </form>
                                                    </div>
                                                   
                                                    </div>

                                        <div  class="col-12 basic">
                                            <div class="col-5 basic" >
                                                <p class="pstyle" style="height: auto;"><i class="fa fa-envelope" style="color: #357ebd;"></i> <?php echo $data5['Email'];?></p>
                                           </div>
                                        <div class="col-4 basic"  >
                                            <p  class="pstyle"   style=""> <i class="fa fa-map-marker" style="color: #357ebd;"></i> <?php echo $data6['PrefLocation'];?></p>
                                        </div>
                                          <div class="col-3 basic" >
                                            <p class="pstyle" ><i class="fa fa-phone" style="color: #357ebd;"></i> <?php echo $data5['Phone'];?></p>
                                        </div>
                                        
                                        </div>

                                                            <div  class="col-12" style="padding:0px;height: auto;padding-top: 1px;padding-left: 0px;">
                                                                <div class="basicApp">
                                                                      <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                 <p class="pstyle" style="font-size: 12px;" ><?php echo "Desired Job: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="float: left;" >
                                                                                   <p class="pstyle"  style="font-size: 12px;"> <?php echo $data6['JobCategory'];?></p>
                                                                               </div>
                                                                      </div>
                                                                    
                                                                       <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                <p class="pstyle" style="font-size: 12px;" ><?php echo "Previous Company: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="float: left;" >
                                                                                    <p class="pstyle"  style="font-size: 12px;" > <?php echo $data7['Company'];?></p>
                                                                               </div>
                                                                      </div>
                                                                  
                                                                        
                                                                </div>
                                                                
                                                                <div class="basicApp">
                                                                    
                                                                    <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                <p class="pstyle" style="font-size: 12px;" ><?php echo "Degree: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="float: left;" >
                                                                                  <?php
                                                                                      while($data8=$result8->fetch_assoc())
                                                                                      {
                                                                                  ?>
                                                                                   <p class="pstyle"  style="font-size: 12px;" > <?php echo $data8['DegreeTitle'];?>
                                                                                   <?php
                                                                                      }
                                                                                   ?>
                                                                                   </p>
                                                                               </div>
                                                                    </div>
                                                                    <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                <p class="pstyle" style="font-size: 12px;" ><?php echo "Expected Salary: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="float: left;" >
                                                                                   <p class="pstyle"  style="font-size: 12px;" > <?php echo $data6['ExpSalary'];?></p>
                                                                               </div>
                                                                    </div>
                                                                     
                                                                </div>
                                                               
                                                                 <div class="basicApp">
                                                                            <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                   <p class="pstyle" style="font-size: 12px;"><?php echo "Reloacte: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="width: 80%;float: left;" >
                                                                                   <p class="pstyle"  style="font-size: 12px;" > <?php echo $data6['Relocate'];?></p>
                                                                               </div>
                                                                               </div>
                                                                     
                                                                                <div class="col-6 basicApp">
                                                                             <div class="basicApp"  style="float: left;">
                                                                                     <p class="pstyle" style="font-size: 12px;" ><?php echo "Experience: ";?></p>
                                                                               </div>
                                                                              <div class="basicApp"  style="width: 80%;float: left;" >
                                                                                    <p class="pstyle"  style="font-size: 12px;"> <?php echo $data6['Experience']." Years";?></p>
                                                                               </div>
                                                                               </div>
                                                                              
                                                                                
                                                                     </div>
                                                                 
                                                                <div class="basicApp">
                                                                    <div class="basicApp" style="float: left;" >
                                                                         <p class="pstyle" style="font-size: 12px;" ><?php echo "Skills: ";?></p>
                                                                        </div>
                                                                       <div class=" basicApp"style="float: left;" >
                                                                           <?php
                                                                             while( $data9=$result9->fetch_assoc())
                                                                             {
                                                                           ?>
                                                                            <p class="pstyle"  style="font-size: 12px;"> <?php echo $data9['Skills']." &nbsp"." ";?>
                                                                            <?php
                                                                             }
                                                                             ?>
                                                                            </p>
                                                                        </div>
                                                                </div>
                                                                 
                                                                
                                                                
                                                                <div  class="col-12 basicApp" style="">
                                                                                      
                                                                                            
                                                                                     <div   class="col-3"style="float: right;height: auto;padding:10px;margin: 0px;padding-bottom: 5px;">
                                                                                         <form method="GET" action="ApplicantFilterSearching.php" style="padding:0px;margin: 0px;">
                                                                                            <button  class="col-12 submitbtn1"style="height: 20px;padding: 2px; margin: 0px;" type="submit" name="Resume"><i class="fa fa-download" style="color: white;"></i> 
                                                                                             <a href="<?php echo $path1.$data10['Path'];?>" style="text-decoration: none;color: white;">  Resume </a>
                                                                                            </button>
                                                                                                            
                                                                                          </form>
                                                                                         </div>
                                                                    
                                                                                           <div class="col-3" style="float: right;height:auto;padding:10px;margin: 0px;padding-bottom: 5px;">
                                                                                               <form method="GET" action="Filter_Resume_View.php" style="padding: 0px;margin: 0px;">
                                                                                            <button class="col-12 submitbtn1" style="height: 20px;padding: 2px;margin: 0px;" type="submit" name="View">View</button>
                                                                                                             <input type="hidden" name="Id" value='<?php echo $data5['Id'];?>'>
                                                                                                              
                                                                                          </form>
                                                                                         </div>
                                                            
                                                                 </div>
                                                                
                                                                
                                                                
                                                                
                                                                </div>
                                                                
                                                              
                                        </div>
                                        
                                </div>
                                     <?php
                                         }
                                         }
                                         
                                          if(sizeof($SearchResult)>$num_rec_per_page){
                                            
                                            $total_records = sizeof($SearchResult);
                            //                echo $total_records;
                                            $total_pages = ceil($total_records / $num_rec_per_page); 
                            //                echo $total_pages;
                                            echo'<div class="pagination" style="float:right;">';
                                            echo "<a  href='ApplicantFilterSearching.php?page=1'>".'&laquo;'."</a> "; // Goto 1st page  

                                            for ($i=1; $i<=$total_pages; $i++) {
                                                if($i==$page)
                                                {
                                                    echo "<a class='active' href='ApplicantFilterSearching.php?page=".$i."'>".$i."</a> ";
                                                }
                                                  else{      echo "<a href='ApplicantFilterSearching.php?page=".$i."'>".$i."</a> "; 

                                                  }
                                             }; 
                                            echo "<a href='ApplicantFilterSearching.php?page=$total_pages'>".'&raquo;'."</a>"
                                                    . "</div> "; // Goto last page


                                            }
                                 
                                                     
                                 

                            ?>
                                </div>
                 
                          
                 
             </div>
</body>
</html>

<!--Google places autocomplete-->
        <script>
            var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "us"}
 };
            
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input,options);
    </script>
        <!--//-->


<!--//Search filter//-->        
<?php

        function search($table,$col,$key)
        {  
            include '../Connection/connect.php';
             if($connection==1)
            {
                $result = array();
//                $command="Select * from $table MATCH ($col) AGAINST ('$key' IN BOOLEAN MODE)";
                $command="SELECT * FROM `SearchResume` WHERE MATCH($col) AGAINST('$key*' IN BOOLEAN MODE)";
                        $rs=$con->query($command);
                        while($data=$rs->fetch_assoc())
                                {
                                    $result[]=$data['Id'];
                                   // echo $data['Id'];
                                }
            }                  
            return $result;               
        }
        
        
       
            if(isset($_GET['Search'])){
                $SearchText=$_GET['SearchText'];
                $SearchLocation=$_GET['SearchLocation'];
                $_SESSION['SearchText']="";
                $_SESSION['SearchLocation']="";
                $_SESSION['SearchResult']="";

                
                if(empty($SearchText)&&empty($SearchLocation))
                {
                    $_SESSION['SearchError']="Please enter some text to search.";
                    echo '<script type="text/javascript">','ref();','</script>';                }
                elseif(empty ($SearchLocation))
                {
                    $_SESSION['SearchResult']="";
                    $_SESSION['SearchText']=$SearchText;
                    $pp=new Parser();
                    $txt=$pp->parse($SearchText);
                    $_SESSION['SearchError']="";
                    $_SESSION['SearchResult']= search("SearchResume", "ResumeText", $txt);
                    echo '<script type="text/javascript">','ref();','</script>';

                }
                elseif(empty ($SearchText))
                {
                    $_SESSION['SearchResult']="";
                    $_SESSION['SearchLocation']=$SearchLocation;
                    $pp=new Parser();
                    $txt=$pp->parse($SearchLocation);
                    $_SESSION['SearchError']="";
                    $_SESSION['SearchResult']= search("SearchResume", "ResumeText", $txt);
                    echo '<script type="text/javascript">','ref();','</script>';

                }
                else
                {
                    $_SESSION['SearchResult']="";
                    $_SESSION['SearchLocation']=$SearchLocation;
                    $_SESSION['SearchText']=$SearchText;
                    $pp=new Parser();
                    $txt=$pp->parse($SearchText.$SearchLocation);
                    $_SESSION['SearchError']="";
                    $_SESSION['SearchResult']= search("SearchResume", "ResumeText", $txt);
                    echo '<script type="text/javascript">','ref();','</script>';

                }
            }
        
        
        
        
?>
<!--//End//-->

<!--//Manual Filter Bar//-->
<?php

        $_SESSION["FilterError1"]="";   
       $_SESSION["FilterError2"]="";   
        $resultfil=array();
        $resultre=array();
        $resultdeg=array();
        $resultski=array();
         $resultsal=array();
          $resultsexp=array();
        
    if(isset($_GET['Apply']))
    {
       $_SESSION['SearchResult']="";
       $location=array();
       $relocate=array();
       $skills=array();
       $degree=array();
       $salary1;
       $experience1;
       $salary2;
       $experience2;
       $count=0;
      $count1=0;$count2=0;$count3=0;$count4=0;$count5=0;$count6=0;
       
        if(isset($_GET['Location']))
        {
            foreach($_GET['Location'] as $selected){

                     array_push($location,"'".$selected."'");

                   }
                   
//                   $arrlength = count($location);
//                    for($x = 0; $x < $arrlength; $x++) {
//                        echo $location[$x];
//                          }
                 
                   
        }
        
        if(isset($_GET['ReLocate']))
        {
            foreach($_GET['ReLocate'] as $selected){
                      array_push( $relocate,"'".$selected."'");
                   }
        }
        
         if(isset($_GET['Skills']))
        {
            foreach($_GET['Skills'] as $selected){
                      array_push( $skills,"'".$selected."'");
                   }
        }
        
         if(isset($_GET['Degree']))
        {
            foreach($_GET['Degree'] as $selected){
                     array_push( $degree,"'".$selected."'");
                   }
        }
        
         if(!empty($_GET['ExpSal1']))
        {
             
             if(!empty($_GET['ExpSal2']))
             {
                        if($_GET['ExpSal2']<=$_GET['ExpSal1'])
                    {
                        $_SESSION["FilterError1"]="border:1px solid red;";
                                   echo '<script type="text/javascript">','ref();','</script>';

                    }
                 
                     elseif($_GET['ExpSal2']>$_GET['ExpSal1'])
                {
                    $salary1= $_GET['ExpSal1'];
                    $salary2= $_GET['ExpSal2'];
            
                    $_SESSION["FilterError1"]="";   
                }
                 
             }
             else
             {
                  $_SESSION["FilterError1"]="border:1px solid red;";  
                            echo '<script type="text/javascript">','ref();','</script>';

             }
             
        }
        
        if(!empty($_GET['ExpSal2']))
        {
             if(!empty($_GET['ExpSal1']))
             {
                        if($_GET['ExpSal2']<=$_GET['ExpSal1'])
                    {
                        $_SESSION["FilterError1"]="border:1px solid red;";
                                   echo '<script type="text/javascript">','ref();','</script>';

                    }
                 
                     elseif($_GET['ExpSal2']>$_GET['ExpSal1'])
                {
                    $salary1= $_GET['ExpSal1'];
                    $salary2= $_GET['ExpSal2'];
               //     echo $salary1." ".$salary2;
                    $_SESSION["FilterError1"]="";   
                }
                 
             }
             else
             {
                  $_SESSION["FilterError1"]="border:1px solid red;";  
                            echo '<script type="text/javascript">','ref();','</script>';

             }
             
       
        }
        
        
        
        
        
        
     
        
        
         if(!empty($_GET['SkillExp1']))
        {
           if(!empty($_GET['SkillExp2']))
           {
              if($_GET['SkillExp2']<=$_GET['SkillExp1'])
              {
                 $_SESSION["FilterError2"]="border:1px solid red;";
                
                            echo '<script type="text/javascript">','ref();','</script>';

             }
           else if($_GET['SkillExp2']>$_GET['SkillExp1'])
             {
                 $experience1=$_GET['SkillExp1'];
                  $experience2=$_GET['SkillExp2'];
                $_SESSION["FilterError2"]="";   
                
             }
           }
           
             else
             {
                  $_SESSION["FilterError2"]="border:1px solid red;";  
                            echo '<script type="text/javascript">','ref();','</script>';

             }
         
     }
    
     
      if(!empty($_GET['SkillExp2']))
        {
           if(!empty($_GET['SkillExp1']))
           {
              if($_GET['SkillExp2']<=$_GET['SkillExp1'])
              {
                 $_SESSION["FilterError2"]="border:1px solid red;";
                
                            echo '<script type="text/javascript">','ref();','</script>';

             }
           else if($_GET['SkillExp2']>$_GET['SkillExp1'])
             {
                 $experience1=$_GET['SkillExp1'];
                  $experience2=$_GET['SkillExp2'];
                $_SESSION["FilterError2"]="";   
                
             }
           }
           
             else
             {
                  $_SESSION["FilterError2"]="border:1px solid red;";  
                            echo '<script type="text/javascript">','ref();','</script>';

             }
         
     }
    
     
     
        
        // applying select query to get data
        
            include '../Connection/connect.php';
             if($connection==1)
            {
                     if($location!=NULL)
                     {
                         
                         $location = implode(',', $location);
                        // echo $location;
                       $command="SELECT *  FROM  applicantJobCategroy WHERE PrefLocation IN ($location)";
                        $rs=$con->query($command);
                        while($datafil=$rs->fetch_assoc())
                                {   
                                   $resultfil[]=$datafil['Id'];
                                   //echo $datafil['Id'];
                                }
                         
                     }
                     
                     if($relocate!=NULL)
                     {
                         
                        $relocate = implode(',', $relocate);
                        // echo $relocate;
                       $command="SELECT *  FROM  applicantJobCategroy WHERE Relocate IN ($relocate)";
                        $rs=$con->query($command);
                        while($datare=$rs->fetch_assoc())
                                {   
                                   $resultre[]=$datare['Id'];
                                   // echo $datare['Id'];
                                }
                         
                     }
                     
                     if($degree!=NULL)
                     {
                         
                        $degree = implode(',', $degree);
                       //  echo $degree;
                       $command="SELECT *  FROM  educationDetail WHERE DegreeTitle IN ($degree)";
                        $rs=$con->query($command);
                        while($datadeg=$rs->fetch_assoc())
                                {   
                                   $resultdeg[]=$datadeg['Aid'];
                                    //echo $datadeg['Aid'];
                                }
                         
                     }
                     
                     
                     if($skills!=NULL)
                     {
                         
                        $skills = implode(',', $skills);
                    //     echo $skills;
                       $command="SELECT *  FROM  applicantSkills WHERE Skills IN ($skills)";
                        $rs=$con->query($command);
                        while($dataski=$rs->fetch_assoc())
                                {   
                                   $resultski[]=$dataski['Aid'];
                                    //echo $dataski['Aid'];
                                }
                         
                     }
                     
                     if($salary2>$salary1)
                     {
                            $command="SELECT *  FROM  applicantJobCategroy WHERE ExpSalary BETWEEN $salary1 AND $salary2";
                        $rs=$con->query($command);
                        while($datasal=$rs->fetch_assoc())
                                {   
                                   $resultsal[]=$datasal['Id'];
                                    echo $datasal['Id'];
                                    
                                }
                         
                         
                     }
                     
                     if($experience2>$experience1)
                     {
                            $command="SELECT *  FROM  applicantJobCategroy WHERE Experience BETWEEN $experience1 AND $experience2";
                        $rs=$con->query($command);
                        while($dataexp=$rs->fetch_assoc())
                                {   
                                   $resultsexp[]=$dataexp['Id'];
                                    //echo $dataexp['Id'];
                                }
                         
                         
                     }
                     
                     
                     
                    
               
            }  
        
            
            $list = array();
        
        if($resultfil!=NULL)
        {
            $list[] = $resultfil;
             $count1++;
        }
        if($resultre!=NULL)
        {
            $list[] = $resultre;
            $count2++;
        }
        if($$resultdeg!=NULL)
        {
            $list[] = $resultdeg;
            $count3++;
           
        }
        if($resultski!=NULL)
        {
            $list[] =$resultski;
            $count4++;
        }
        if($resultsal!=NULL)
        {
            $list[] = $resultsal;
           $count5++;
            
        }
        if($resultsexp!=NULL)
        {
            $list[] = $resultsexp;
            $count6++;
        }
        $count=$count1+$count2+$count3+$count4+$count5+$count6;
        if($count>=2)
        {
          
           $intersect = call_user_func_array('array_intersect',$list);
           print_r($intersect);
           
           
           $_SESSION['SearchResult']=$intersect;
           echo '<script type="text/javascript">','ref();','</script>';

        }
        
 
//                if only one filter is selected
           else
           {
               if($count1==1)
               {
                   $_SESSION['SearchResult']=$resultfil;
                                       echo '<script type="text/javascript">','ref();','</script>';

               }
               elseif ($count2==1)
               {
               $_SESSION['SearchResult']=$resultre;
                                   echo '<script type="text/javascript">','ref();','</script>';

                }
                 elseif ($count3==1)
               {
               $_SESSION['SearchResult']=$resultdeg;
                                   echo '<script type="text/javascript">','ref();','</script>';

                }
                 elseif ($count4==1)
               {
               $_SESSION['SearchResult']=$resultski;
                                   echo '<script type="text/javascript">','ref();','</script>';

                }
                 elseif ($count5==1)
               {
               $_SESSION['SearchResult']=$resultsal;
                                   echo '<script type="text/javascript">','ref();','</script>';

                }
                 elseif ($count6==1)
               {
               $_SESSION['SearchResult']=$resultsexp;
                                   echo '<script type="text/javascript">','ref();','</script>';

                }
               
           }
           
           
            
    }

//    
//     if(isset($_GET['Reset']))
//    {
//         
//            $_SESSION['SearchResult']="";
//          echo '<script type="text/javascript">','ref();','</script>';
//
//         
//     }
    
    
                
//$list=array();
//
//$a = array('a', 'b');
//$b = array('a', 'd');
//$list[]=$a;
//$list[]=$b;
//
//$intersect = call_user_func_array('array_intersect',$list);
//             $arrlength = count($intersect);
//                    for($x = 0; $x < $arrlength; $x++) {
//                     
//                       echo $intersect[$x]."".$arrlength;
//                          }
//          
//    
    

?>

<!--//End//-->