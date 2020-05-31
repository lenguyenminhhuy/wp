<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record </title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create an Admin account</h1>
        </div>
      
        <?php
    if($_POST){
        // include database connection
        include 'config/database.php';
    
        try{
            $query = "INSERT INTO admin1
                SET Username=:Username, password=:password
                    created=:created";
    
            // prepare query for execution
            $stmt = $con->prepare($query);
    
            // posted values
            $Username=htmlspecialchars(strip_tags($_POST['Username']));
            $password=htmlspecialchars(strip_tags($_POST['password']));

            // bind the parameters
            $stmt->bindParam(':Username', $Username);
            $stmt->bindParam(':password', $password);
            
            // specify when this record was inserted to the database
            $created=date('Y-m-d H:i:s');
            $stmt->bindParam(':created', $created);
            
            // Execute the query
            if($stmt->execute()){
                echo "<div class='alert alert-success'>Record was saved.</div>";
            }else{
                echo $stmt->error();
                echo "<div class='alert alert-danger'>Unable to save record.</div>";
            }
            
        }
        
        // show error
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
        ?>
 
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">

<table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Username</td>
            <td><input type='text' name='Username' class='form-control' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><textarea name='password' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='index.php' class='btn btn-danger'>Back to read admin</a>
            </td>
        </tr>
    </table>

</form>

          
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>