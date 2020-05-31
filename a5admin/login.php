<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: admindb/index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        //$param_username = 'Username';
        //$param_password = 'password';
        $sql = "SELECT id, Username FROM admin1 WHERE Username = ? AND password = ? LIMIT 1";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $username, $password);
            
            // Set parameters 
            //$param_username = $username;
            //$param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){     
                    mysqli_stmt_bind_result($stmt, $id, $username); 
                    // Password is correct, so start a new session
                    session_start();
                    while (mysqli_stmt_fetch($stmt)) {
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username; 
                    }
                    // Redirect user to welcome page
                    header("location: admindb/index.php");
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Invalid credentials.";
                }
            } else{
                echo "errỏr " + $stmt->error();
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id='stylecss' type="text/css" rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div id="frm">
    <table class="tbl">

    <tr>
    <td><h3>Login</h3> </td>
    </tr> 

    <tr>
    <td>Username</td>
    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
    <td> <input type="text" name="username" class="Input" value="<?php echo $username; ?>" ></td>
    <span class="help-block"><?php echo $username_err; ?></span>
    </div>
    </tr>

    <tr>
    <td>Password</td>
    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
    <td> <input type="password" name="password" class="Input"  ></td>
    <span class="help-block"><?php echo $password_err; ?></span>
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

