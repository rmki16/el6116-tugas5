<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_username; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	  <h2><a href = "update.php">Update Profile</a></h2>
   </body>
   
</html>