<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
            
            <link rel="stylesheet" type="text/css" href="../css/TalentSearch.css">
            <link rel="stylesheet" type="text/css" href="../css/main.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <!--Google Loation autocomplete-->   
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&language=en&key=AIzaSyCDC1VIuedy_5zdEluB3HNiqESWVkSp9Jk"></script>

 
    </head>
    <body>
        
        <div class="col-12" style="background: #555; padding-top: 30px; padding-bottom: 10px;">
            <p class="headpara">Search Technical Professionals</p>
            <div class="col-6" style="">
                <div class="styled-input2 Enterborder">
                    <input class="inpstyle" type="text" name="Company" value="<?php echo @$_SESSION['Company'];?>"  required/>
                        <label><i class="fa fa-search" aria-hidden="true"></i> &nbsp; Job Title, Keyword, Name</label>
                        <span></span> </div>
            </div>
            <div class="col-3" style="">
               <div class="styled-input2 Enterborder">
                   <input class="inpstyle" type="text" name="PrefLocation" id="autocomplete" value='<?php echo @$data6['PrefLocation']; ?>' placeholder="" required/>    
                               <label><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Location</label>
                               <span></span> </div>
            </div>
            <div class="col-3" style="">
                <button class="col-3 submitbtn Enterborder" style=" width: 100%; height: 50px; margin-bottom: 20px;" type="submit" value="Submit" name="Skill">Find Candidates</button>

            </div>
        </div>
    </body>
</html>

 <!--Google places autocomplete-->
        <script>
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);
    </script>
        <!--//-->