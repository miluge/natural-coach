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
   <section class="hero is-info is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
          <form method="post" action="" class="box">
            <div class="field">
              <label for="" class="label">Email</label>
              <div class="control has-icons-left">
                <input type="text" name="username" placeholder="e.g. miluge" class="input" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-envelope"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="label">Password</label>
              <div class="control has-icons-left">
                <input type="password" name="password" placeholder="password" class="input" required>
                <span class="icon is-small is-left">
                  <i class="fa fa-lock"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <label for="" class="checkbox">
               <input type="checkbox">
               Remember me
              </label>
            </div>
            <div class="field">
              <input type="submit" name="login" class="button is-success is-fullwidth" value="Login">
              </input>
            </div>
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
</section>
   </body>  
</html>  
