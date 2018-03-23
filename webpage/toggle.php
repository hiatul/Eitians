<!DOCTYPE html>
<html>
<head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>

<h2>Toggle Switch</h2>

<div style="width: 30%;background: pink;height: 50px;">
<label class="switch">
  <input type="checkbox">
  <div class="slider round"></div>
</label>
</div>

<input type="checkbox" name="b" <?php echo (isset($_POST['b'])?"value='y'":"value='n'")?> 
 <?php echo (isset($_POST['b'])?"checked":"") ?>  />



<input type="checkbox" name="txtCheck" value="your value" <?php if(isset($_POST['txtCheck'])) echo "checked='checked'"; ?>  /><br />



<form action = "" name="frmSubmit" method="post">
<input type="checkbox" name="txtCheck" value="your value" <?php if(isset($_POST['txtCheck'])) echo "checked='checked'"; ?>  /><br />

<label>Name</label><br />
<input type="text" name="txtName" id="NameTextBox" value="<?php echo $_POST['txtName']; ?>" />
<br />
<label>E Mail</label><br />
 <input type="text" name="txtEmail" id="EmailTextBox" value="<?php  echo $_POST['txtEmail'];?>" />
 <input name="BtnSubmit" type="submit" onclick="MM_validateForm('NameTextBox','','R','EmailTextBox','','R');return document.MM_returnValue" value="Send" />
</form>


</body>
</html> 
