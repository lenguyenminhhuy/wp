<?php

   $username=$_POST['username'];
   $password=$_POST['password'];

   function testInput($data){
      $data=htmlspecialchars($data);
      $data=mysql_real_escape_string($data);
      $data=stripslashes($data);
      return $data;
   }

   $username=testInput($username);
   $password=testInput($password);

   mysql_connect("localhost","root","root");
   mysql_select_db("login");

   $result=mysql_query("select * from admin1 where username='$username' and password='$password'")
            or die("Failed to query  database".mysql_error());
   
   $row=mysql_fetch_array($result);
   if($row['username'] == $username && $row['password'] == $password){
      echo"login sucess welcome ".$row['username'];
   }else{
      echo"Failed to login";
   }


?>