<?php

include "database.php";

 
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['Email'];
    $pwd=$_POST['pwd'];
    
    $sql="INSERT INTO form(name,email,pass)VALUES ('$name','$email','$pwd')";
    $run=mysqli_query($conn,$sql);
  
    if($run){
      Echo "<span class='text-success'>Registartion Successfully</span>";
    }else{
      echo "unsuccess";
    }
   }   


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncryppPass</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/aes.js"></script>
<script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
   <link rel="stylesheet" href="./css/style.css">

    <script>
    function encrypt(){
      var pass=document.getElementById('pwd').value;
      var hide=document.getElementById('hide').value;
      document.getElementById("hide").value = document.getElementById("pwd").value;
		   var hash = CryptoJS.MD5(pass);
		   document.getElementById('pwd').value=hash;
		  return true;
    }
    </script>
</head>
<body>
<div class="container">
<h2 class=" text-center pt-5">Encrypt pass</h2>
<div class="row">
<div class="col-md-5 m-auto " id="div1">
<form   method="POST" >
  <div class="form-group">
  <label for="name"><b>User name</b></label><br>
  <input type="text" name="name" id="name" placeholder="Enter Your name"  Required>
  </div>
<div class="form-group">
  <label for="Email"><b> User Email</b></label><br>
  <input type="text" class="" name="Email" id="Email" placeholder="Enter Your Email" Required><br>
  <span id="availability"></span>
</div>
<div class="form-group">
  <label for="pwd"><b> Password</b></label><br>
  <input type="password" class="" name="pwd" id="pwd" placeholder="Enter Your password" Required>
  <input type="hidden" name="hide" id="hide" />
  
</div>

<div class="form-group">
  <label for="rpwd"><b> Confirm Your Password</b></label><br>
  <input type="password" class="" name="rpwd" id="rpwd" placeholder="Enter Your password" Required><br>
    
</div>


     <div id="button">
    <a ><input type="Submit"  id="register" onclick="return encrypt()" name="submit" class="btn btn-primary" role="button"> </a>
  </div>
  </form>
  
</div>
</div>
    
</body>
</html>