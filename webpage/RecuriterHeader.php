<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/togglepopup.css">
       
    </head>
    <body>
      
    <div class="col-12" style="border-bottom: 1px solid #ccc; padding:5px 80px;">
        <div class="col-4" style="float: right;text-align: center;padding: 0;"  >
          <a href="https://www.facebook.com/Relevantglobalorganic/" class="fa fa-facebook fk" style=""></a>
          <a href="#" class="fa fa-twitter fk" style=""></a>
          <a href="#" class="fa fa-google fk" style=""></a>
          <a href="#" class="fa fa-linkedin fk" style=""></a>
      </div>
    </div>
    <div class="col-12" style="background-color: white;padding:0px 80px;box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);border-bottom: 5px solid #555;">
        <div class="col-2" style="padding: 0;">
            <img src="../image/logo.png" alt="logo" style="width: 100%;"> 
        </div>
        <form action="Recuriter_Logout.php" method="POST">
        <div class="col-2" style="float: right;padding-top: 22px;padding-bottom: 5px;text-align: center;">
            <i class="fa fa-sign-out" style="position: relative; left: 18%; color: white;"></i><input class="cursor btn" type="submit" value="Logout" name="Logout"  style="padding:8px 15px;color: #fff;background-color: #357ebd;outline: none;border: 1px solid #357ebd;border-radius: 5px;text-decoration: none;font-family: global6;width: 80%;">
        </div>
        </form>
        
        <div class="col-6" style="float:right;padding: 0px;background-color: blue;">  
<ul class="topnav bold" id="myTopnav">

    <li><a href="Recuriter_Dashboard.php">Dashboard</a></li>
    <li><a href="services.html">Industry</a></li>
     <li><a href="services.html">Location</a></li>
  <li><a href="contact.php">Contact Us</a></li>

  <li class="icon">
    <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
  </li>
</ul>
        </div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

    </div>
    
 
   
    </body>
</html>

