<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id='stylecss' type="text/css" rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
    <div id="frm">
    <table class="tbl">

    <tr>
    <td><h3>Login</h3> </td>
    </tr> 

    <tr>
    <td>Username</td>
    <td> <input type="text" name="username" class="Input" ></td>
    </tr>

    <tr>
    <td>Password</td>
    <td> <input type="password" name="password" class="Input" ></td>
    </tr>

    <tr>
    <td></td>
    <td> <input type="Submit" id="btn" name="login_user" value="Login" class="Button" ></td>
    </tr>

    </table>

    </div>
</form>
    
</body>
</html>

