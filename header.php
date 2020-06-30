<?php
 
require_once 'dbconfig.php';
require_once 'functions.php';
 
$dsn= "mysql:host=$host;dbname=$db";
 
try{
 // create a PDO connection with the configuration data
 $conn = new PDO($dsn, $username, $password);
}
 catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}



?>
<!DOCTYPE html>
<html lang="xyz">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
    
  </head>
  <body>
    <header>
    <nav id="navMenu" class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item" href="dashboard.php">Home</a>
        

        <div id="navbar-burger-id" class="navbar-burger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div id="navbar-menu-id" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="excursion.php">Trips</a>
          <a class="navbar-item" href="hikers.php">Hiker</a>
          <a class="navbar-item" href="guide.php">Guide</a>
          <a class="navbar-item" href="group.php">Group</a>
          <a class="navbar-item is-hidden-desktop" href="logout.php">LOG OUT</a>
        </div>
        <div class="navbar-end">
          <a class="navbar-item is-hidden-touch" href="logout.php">LOG OUT</a>
        </div>
      </div>
    </div>
  </nav>
</header>



