<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        
    }
    
    if(!isset($_SESSION['RecLoginStatus']))
    {
        $_SESSION['RecLoginStatus']="0";
    }
  
    
    include './../Connection/connect.php';
    $rid= $_SESSION['Rid'];
                               if($connection==1)
                                    {       
                                         $command="Select Logo from  recruitersignup WHERE Rid=$rid";
                               $result=$con->query($command);
                                        if(($data=$result->fetch_assoc()))
                                        {
                                            
                                        }
                                        
                                        
                                           if(isset($_GET['file-upload']))
                                            {   

                                                     $command="Update jobpost SET Flag=0 WHERE Jid=$Jid1 and Rid=$rid";
                                                     $result=$con->query($command);

                                              }  
                                              
                                              $command2="SELECT * FROM recruitercompany WHERE Rid=$rid";
                                              $result11=$con->query($command2);
                                              $data11=$result11->fetch_assoc();
                                    }
                                    
                                    
                                    
                                    
                                    
                                    ?>
<html>
    


     <div class="col-12" style="padding: 0px; border-radius:2px;margin-bottom: 20px;border: 1px solid lightgray;">
                               <div class="col-12 sidebar1" style=" height: 200px;padding: 0px;">
                                   <img src='<?php echo $data['Logo']; ?>' style="height: 80%; width: 80%;margin-top: 5%;margin-left: 10.5%;">
                                        
<!--                                   <div  title="Update Company Logo"class="fu" style="background: white;height: 30px;width: 30px;position: relative;float: right;margin-right:10px;margin-top:-20px;border-radius:50%;">
                                       <form method="GET" action="Recuriter_Dashboard_Menu_Logo_Name.php" enctype="multipart/form-data">
                                           <label for="upload" class="" style="background: white;">
                                               <img src="../icons/picture.svg" height="25" width="25">
                                           </label>
                                       <input id="upload" class="fu__input" type="file" name="file-upload">
                                       </form>
                                    </div>-->
                                            
                                   
                                </div>
                               <div class="col-12 sidebar1" style="height: 50px; border-bottom: none;">
                                   <p class="para" style="text-align: center;padding: 0px;"><?php echo $data11['CompanyName']; ?></p>
                               </div>
                              
                           </div>
</html>


