<?php
  include("config.php");

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username   = mysqli_real_escape_string($mysqli,$_POST['username']);
    $firstname  = mysqli_real_escape_string($mysqli,$_POST['firstname']);
    $lastname   = mysqli_real_escape_string($mysqli,$_POST['lastname']);
    $pass_plain = mysqli_real_escape_string($mysqli,$_POST['password']);
    $pass_hash  = md5($pass_plain);

    $sql = "INSERT INTO users (username, firstname, lastname, pass_plain, pass_hash) VALUES ('$username', '$firstname', '$lastname', '$pass_plain', '$pass_hash')";

    $result = mysqli_query($mysqli,$sql);

    // check if the query is failing and returning false
    if (!$result) {
      printf("Error: %s\n", mysqli_error($mysqli));
      exit();
    }
  }
?>

<html>

   <head>
      <title>Register Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>FirstName  :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                  <label>LastName  :</label><input type = "text" name = "lastname" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px">

            </div>

         </div>

      </div>

   </body>
</html>
