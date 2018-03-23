<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../css/font.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

</style>
</head>
<body>
      <?php 
   if($_SESSION['LoginStatus']=="0")
   {
    include './header.php';
   }
   else
   {
    include './ApplicantHeader.php';
   }
 
   ?>
   
   
  

    <div  class="bgimg-3 col-12" style="padding-top: 0;">
 <ul class="breadcrumb">
     <li><a href="home.php">Home</a></li>
  <li>Our Jobs</li>
 
 
</ul>
        <p style="font-family:global4;font-size: 50px;position: relative;padding: 0;margin: 0;color:#fff;">Our Jobs</p>
</div>



<!--         <div class="bgimg-3 col-12" style="color: #000;background-color:#fff;text-align:center;text-align: justify;font-family: global6;">
  <span style="font-family: global7;font-size: 30px;background-color: black;color: #fff;padding: 30px; border-radius: 10px;position: relative;left:40%;">Parrelex Demo</span>

  <p style="font-family: global4;line-height: 40px;padding: 30px;color: #fff;">Parallax scrolling is a web site trend where the background content is moved at a different speed than the foreground content while scrolling. Nascetur per nec posuere turpis, lectus nec libero turpis nunc at, sed posuere mollis ullamcorper libero ante lectus, blandit pellentesque a, magna turpis est sapien duis blandit dignissim. Viverra interdum mi magna mi, morbi sociis. Condimentum dui ipsum consequat morbi, curabitur aliquam pede, nullam vitae eu placerat eget et vehicula. Varius quisque non molestie dolor, nunc nisl dapibus vestibulum at, sodales tincidunt mauris ullamcorper, dapibus pulvinar, in in neque risus odio. Accumsan fringilla vulputate at quibusdam sociis eleifend, aenean maecenas vulputate, non id vehicula lorem mattis, ratione interdum sociis ornare. Suscipit proin magna cras vel, non sit platea sit, maecenas ante augue etiam maecenas, porta porttitor placerat leo.</p>
</div>    -->
    




<!--
    <div style="position:relative;background-color:#c85b5f;" class="col-12">
  <div style="color:#ddd;background-color:#282E34;text-align:center;text-align: justify;">
    <p>Scroll up and down to really get the feeling of how Parallax Scrolling works.</p>
  </div>
</div>-->

<!--    
<div class="col-12" style="background-color: #ccc;height: 50%;">
     <div class="caption">
      <span style="font-family: global7;font-size: 30px;background-color: black;color: #fff;padding: 15px; border-radius: 10px;">Welcome</span>
  </div>
</div> -->













  
   
  
    
    
    
    
    
    
    <div class=" col-12" style="color: #fff;background-color:#f9f9f9;text-align:center;text-align: justify;font-family: global6;">
  <h3 style="text-align:center;color: #000;font-family: global7;letter-spacing: 2px;padding: 20px;font-size: 30px;">FEEL FREE TO CONTACT</h3>
  <div  style="padding: 0;border-top: 1px solid #ccc;width: 70%;margin: auto;"></div>
  
    </div>



 <?php
 include './footer.html';
 ?>










   
</body>
</html>