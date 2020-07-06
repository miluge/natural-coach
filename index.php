<?php

// Hola!

session_start();
require_once 'dbconfig.php';
$message="";

try {
    $connect = new PDO("mysql:host=$host; dbname=$db", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"])) 
      {  
        if(empty($_POST["username"]) || empty($_POST["password"]))  
        {  
             $message = '<label>All fields are required</label>';  
        }  
        else  
        {  
             $query = "SELECT * FROM users WHERE username = :username AND password = :password";  
             $statement = $connect->prepare($query);  
             $statement->execute(  
                  array(  
                       'username'     =>     $_POST["username"],  
                       'password'     =>     $_POST["password"]  
                  )  
             );  
             $count = $statement->rowCount();  
             if($count > 0)  
             {  
                  $_SESSION["username"] = $_POST["username"];  
                  header("location:dashboard.php");  
             }  
             else  
             {  
                  $message = '<label>Username and/or password is incorrect</label>';  
             }  
        }  
   }  
}  
catch(PDOException $error)  
{  
   $message = $error->getMessage();  
}  

?>  

<!DOCTYPE html>  
<html>  
   <head>  
        <title> Natural-Coach | Admin Panel</title>  
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css"> 
        <link rel="stylesheet" href="style.css">
   </head>  
   <body>
        <div class="hero hunnid">
          <div class="columns is-vcentered">
          <div class="column"></div>
          <div class="column">
               <div class="container">
               <div class="card login">
                    <div class="card-content login">
                         <div class="field">  
                              <h3 class="title">Natural Coach Admin Panel login</h3><br />  
                              <form method="post">  
                              <label class="label">Username</label>  
                              <input type="text" name="username" class="input" placeholder="Username : miluge"/>    
                              <label class="label">Password</label>  
                              <input type="password" name="password" class="input" placeholder="Password: password" />  
                              <br/>
                              <br>
                              <input type="submit" name="login" class="button is-primary is-fullwidth" value="Login" />  
                              </form> 
                              <?php  
                              if(isset($message))  
                              {  
                                   echo '<label class="text-danger">'.$message.'</label>';  
                              }  
                              ?> 
                         </div> 
                    </div> 
               </div>
               </div>
          </div>
          <div class="column"></div>
        </div>
        </div>   
   </body>  
</html>  
