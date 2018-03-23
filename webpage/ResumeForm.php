<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/ResumeForm.css" type="text/css" >
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/font.css">
              
        <title></title>
        
        <script type="text/javascript">
        
        function changeWorkExp()
        {
            
            document.getElementById("fresh").style.display="block";
            document.getElementById("exper").style.display="none";
        }
        
        function changeWorkExp2()
        {
            
            document.getElementById("fresh").style.display="none";
            document.getElementById("exper").style.display="block";
        }
        
        
        function fileName()
        {
            var x=document.getElementById("file-upload").value;
            document.getElementById("FileName").innerHTML=x+"<p>Browse</p>";
        }
        </script>
    </head>
    <body>
        
        
        <div class="col-12 main">
            <form method="POST" action="ResumeForm.php">
                
                <!--//Side text-->
                <div class="col-10" style="float: none; margin: auto;"><p style="float: right; font-size: 12px;">* Mandatory Fields</p></div>
                
               <!--//Personal Details--> 
                <div class="Personal col-10" style="float: none;" >
                    
                    <!--//heading image and text-->
                    <div class="SectionHeading">
                        <div class="Icon" style="background-image: url('../icons/users.svg');"></div>
                        <div class="IconText" style=""><strong>Personal Details</strong></div>
                    </div>
                    
                    
                    
                    <div class="line"></div>
                    
                    <div class="col-8 formContent" style="float: none; margin: auto;">
                        
                        <div style="clear: both;">
                            <div class="label">Name<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit"><input  type="text" name="name"></div>
                         </div> 
                        
                        <div style="clear: both;">
                            <div class="label">Current Location<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit"><input  type="text" name="location"></div>
                         </div> 
                        
                        <div style="clear: both;">
                            <div class="label">Gender<div style="color: red;float: right; text-align: right;">*</div></div>
                                <div class="edit">                               
                                    <div style="width: 15%; float: left; "><input type="radio" name="gender"></div>
                                    <div style="float: left; width: 25%;font-family: sans-serif;">Male</div>
                                    <div style="width: 15%; float: left;"><input type="radio" name="gender"></div>
                                    <div style="width: 25%; float: left;font-family: sans-serif;">Female</div>
                                </div>
                        </div>
                         </div> 
                    </div>
       
                
                <div class="WorkExp col-10" style="float: none;">
                    <!--//heading image and text-->
                    <div class="SectionHeading">
                        <div class="Icon" style="background-image: url('../icons/suitcase.svg');"></div>
                        <div class="IconText" style=""><strong>Work Experience</strong></div>
                    </div>
                    
                    
                    <!--//line-->
                    <div class="line"></div>
                    
                    <div class="col-8 formContent" style="float: none; margin: auto;">
                    
                        <div style="clear: both;">
                                    <div class="label">Are You<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit">                               
                                        <div style="width: 15%; float: left; "><input type="radio" name="current" onclick="changeWorkExp()" checked></div>
                                        <div style="float: left; width: 25%;font-family: sans-serif;">Fresher</div>
                                        <div style="width: 15%; float: left;"><input type="radio" name="current"onclick="changeWorkExp2()"></div>
                                        <div style="width: 25%; float: left;font-family: sans-serif;">Experienced</div>
                                    </div>
                            </div>
                        
                        
                </div>
                    
                    <!--//Fresher DIV-->
                    <div class="col-8 formContent fresher" style="float: none; margin: auto;" id="fresh">
                       
                        <!--//Experience-->
                        <div style="clear: both;">
                            <div class="label">Total Experience<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit" style="width: 35%;"><select style="width:100%; color: #000;">
                                    <option>Exp. Years</option>
                                    <option>0 Yr</option>
                                    <option>1 Yr</option>
                                           <?php
                                           for($x=2;$x<25;$x++)
                                            {
                                               ?><option>
                                                   <?php
                                                   
                                                   echo $x." Yrs";
                                            }
                                          ?></option>
                                    <option>>25yrs</option>                
                                </select>
                            </div> 
                            <div class="edit" style="width:35%"><select style="width:100%;color: #000;">
                                    <option>Exp. Months</option>
                                    <option>0 Month</option>
                                    <option>1 Month</option>
                                           <?php
                                           for($x=2;$x<12;$x++)
                                            {
                                               ?><option>
                                                   <?php
                                                   
                                                   echo $x." Month";
                                            }
                                          ?></option>
                                    <option>>25yrs</option>                
                                </select>
                            </div> 
                            <div></div>
                        </div>
                        
                        
                        <!--//Desired Dept-->
                        <div>
                            <div class="label">Desired Department<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit"><input list="Department" name="Department">
                                                <datalist id="Department">
                                                    <option value="Cse">
                                                  <option value="Firefox">
                                                  <option value="Chrome">
                                                  <option value="Opera">
                                                  <option value="Safari">
                                                </datalist>
                              
                            </div> 
                        </div>
                        
                    </div>
                    
                    <!--//Experiencer DIV-->
                    <div class="col-8 formContent exp"style="float: none; margin: auto;" id="exper">
                        
                        <!--//Experience-->
                                <div style="clear: both;">
                                    <div class="label">Total Experience<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit" style="width: 35%;"><select style="width:100%; color: #000;">
                                            <option>Exp. Years</option>
                                            <option>0 Yr</option>
                                            <option>1 Yr</option>
                                                   <?php
                                                   for($x=2;$x<25;$x++)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x." Yrs";
                                                    }
                                                  ?></option>
                                            <option>>25yrs</option>                
                                        </select>
                                    </div> 
                                    <div class="edit" style="width:35%"><select style="width:100%;color: #000;">
                                            <option>Exp. Months</option>
                                            <option>0 Month</option>
                                            <option>1 Month</option>
                                                   <?php
                                                   for($x=2;$x<12;$x++)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x." Month";
                                                    }
                                                  ?></option>
                                            <option>>25yrs</option>                
                                        </select>
                                    </div> 
                                    <div></div>
                                </div>

                            
                    
                    <!--//SALARY--> 
                    <div style="clear: both;">
                                    <div class="label">Current Annual Salary<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit" style="width: 35%;"><select style="width:100%; color: #000;">
                                            <option>Salary (Lakh)</option>
                                                   <?php
                                                   for($x=0;$x<50;$x++)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x;
                                                    }
                                                  ?></option>
                                            <option>>50+</option>                
                                        </select>
                                    </div> 
                                    <div class="edit" style="width:35%"><select style="width:100%;color: #000;">
                                            <option>Salary (Thousands)</option>
                                                <?php
                                                   for($x=0;$x<96;$x+=5)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x;
                                                    }
                                                  ?></option>
                                                            
                                        </select>
                                    </div> 
                                    <div></div>
                                </div>
                        
                    <!--//further details about job-->
                        <div class="label"><strong>Current Job Details</strong></div>

                             <div style="clear: both;">
                                <div class="label">Job Title<div style="color: red;float: right; text-align: right;">*</div></div>
                                <div class="edit"><input  type="text" name="jobTitle" placeholder="Job Title"></div>
                             </div>
                    
                    

                    </div>
                    
                </div>
                
                <div class="Education col-10" style="float: none;">
                    <!--//heading image and text-->
                    <div class="SectionHeading">
                        <div class="Icon" style="background-image: url('../icons/notebook.svg');"></div>
                        <div class="IconText" style=""><strong>Education Details</strong></div>
                    </div>
                    
                    
                    
                    <div class="line"></div>
                
                    <div class="col-8 formContent" style="float: none; margin: auto;">
                        
                         <!--/Qualification Level/-->
                        <div>
                            <div class="label">Qualification Level<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit"><input list=QualificationLevel name="QualificationLevel">
                                                <datalist id="QualificationLevel">
                                                  <option value="Btech">
                                                  <option value="Mtech">
                                                  <option value="BCA">
                                                  <option value="Opera">
                                                  <option value="Safari">
                                                </datalist>                                               
                            </div> 
                        </div>
                         
                          <!--/Education Specialization/-->
                        <div>
                            <div class="label">Education Specialization<div style="color: red;float: right; text-align: right;">*</div></div>
                            <div class="edit"><input list=EducationSpecialization name="EducationSpecialization">
                                                <datalist id="EducationSpecialization">
                                                  <option value="Btech">
                                                  <option value="Mtech">
                                                  <option value="BCA">
                                                  <option value="Opera">
                                                  <option value="Safari">
                                                </datalist>                                               
                            </div> 
                        </div>
                         
                          
                          <!--/Institution Name/-->
                        <div>
                          <div class="label">Institute Name<div style="color: red;float: right; text-align: right;">*</div></div>
                          <div class="edit"><input  type="text" name="InstituteName"></div>
                        </div>
                          
                        <!--/Year Of Passout/-->  
                        <div style="clear: both;">
                                    <div class="label">Year Of Passout<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit" style="width: 35%;"><select style="width:100%; color: #000;">
                                            <option>Year Of pass-out</option>
                                                   <?php
                                                   for($x=2020;$x>1974;$x--)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x;
                                                    }
                                                  ?></option>
                                            </select>
                                    </div> 
                    
                        </div>                       
                
                        
                    </div>
                </div>
                
                <div class="KeySkill col-10" style="float: none;">
                    <!--//heading image and text-->
                    <div class="SectionHeading">
                        <div class="Icon" style="background-image: url('../icons/idea.svg');"></div>
                        <div class="IconText" style=""><strong>Key Skills</strong></div>
                    </div>
                    
                    
                    
                    <div class="line"></div>
                    
                    <div class="col-8 formContent" style="float: none; margin: auto;">

                         <!--/Key Skill / Experience/-->  
                        <div style="clear: both;">
                                    <div class="label">Key Skill / Experience<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit" style="width: 45%;"><input type="text" name="Skill" placeholder="Ex: Oracle, Java, Media Planning etc."></div> 
                    
                                    <div class="edit" style="width: 25%;"><select style="width:100%; color: #000;">
                                            <option>Exp. Years</option>
                                            <option>0 Yr</option>
                                            <option>1 Yr</option>
                                                   <?php
                                                   for($x=2;$x<25;$x++)
                                                    {
                                                       ?><option>
                                                           <?php

                                                           echo $x." Yrs";
                                                    }
                                                  ?></option>
                                            <option>>25yrs</option> 
                                            </select>
                                    </div>
                        </div>
                    </div>
                </div>
                
                <div class="Resume col-10" style="float: none;">
                    <!--//heading image and text-->
                    <div class="SectionHeading">
                        <div class="Icon" style="background-image: url('../icons/curriculum-vitae.svg');"></div>
                        <div class="IconText" style=""><strong>Resume</strong></div>
                    </div>
                    
                    
                    
                    <div class="line"></div>
                    
                      <div class="col-8 formContent" style="float: none; margin: auto;">

                         <!--/Resume/-->  
                        <div style="clear: both;">
                                    <div class="label">Resume<div style="color: red;float: right; text-align: right;">*</div></div>
                                    <div class="edit" style="width: 45%;">
                                        <label for="file-upload" class="customUpload" id="FileName">
                                            Custom Upload<p>Browse</p>
                                        </label>
                                        <input id="file-upload" onchange="fileName()" type="file" name="Resume">
                                    </div> 
                        </div>
                    </div>
                    
                </div>
               
               <div class="col-10 Submit" style="float: none; clear: both;">
                   
                   <input type="submit" value="Submit" align="centre">
                </div>
                
                
                

            </form>
        </div>
    </body>
</html>
