<?php include 'tools.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="login.php" name="login_page">
    <table class="tbl">

    <tr>
    <td><h3>Login</h3> </td>
    </tr> 

    <tr>
    <td>Username</td>
    <td> <input type="text" name="adminName" class="Input" ></td>
    </tr>

    <tr>
    <td>Password</td>
    <td> <input type="password" name="adminPass" class="Input" ></td>
    </tr>

    <tr>
    <td></td>
    <td> <input type="Submit" name="submit" value="Login" class="Button" ></td>
    </tr>

    </table>

</form>
    
</body>
</html>

