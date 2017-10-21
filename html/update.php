<?php
   include("config.php");
   include('session.php');
      
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
	  $id = $_POST['id'];
      $username = $_POST['username'];
	  $firstname = $_POST['firstname'];
	  $lastname = $_POST['lastname'];
	  $pass_plain = $_POST['newpassword'];
	  
      $pass_hash = md5($pass_plain);
      $sql = "UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname', pass_plain = '$pass_plain', pass_hash = '$pass_hash' WHERE id=$id";
      $result = mysqli_query($mysqli,$sql);
      
	  
	  // Relogin
	  session_destroy();
	  session_start();
	  $sql = "SELECT id FROM users WHERE username = '$username' and pass_plain = '$pass_plain'";
      $result = mysqli_query($mysqli,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $username;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<?php
// get all
 
//selecting data associated with this particular id
echo $login_session;
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE username='$login_session'");
while($res = mysqli_fetch_array($result))
{
	$id		  = $res['id'];
	$username = $res['username'];
	$firstname = $res['firstname'];
	$lastname = $res['lastname'];
	$oldpasswordplain = $res['pass_plain'];
	$oldpasswordhash = $res['pass_hash'];
}




?>
<html>
   
   <head>
      <title>Update Page</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
				  <label>UserID  :</label><input type = "text" name = "id" class = "box" value="<?php echo $id;?>"/><br /><br />
                  <label>UserName  :</label><input type = "text" name = "username" class = "box" value="<?php echo $username;?>"/><br /><br />
                  <label>FirstName  :</label><input type = "text" name = "firstname" class = "box" value="<?php echo $firstname ;?>"/><br/><br />
				  <label>LastName:</label><input type = "text" name = "lastname" class = "box" value="<?php echo $lastname;?>"/><br/><br />
				  <label>OldPassword  :</label><input type = "password" name = "oldpassword" class = "box"/><br/><br />
				  <label>NewPassword  :</label><input type = "password" name = "newpassword" class = "box"/><br/><br />
				  <label>NewPasswordConfirm  :</label><input type = "password" name = "newpasswordconfirm" class = "box"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>