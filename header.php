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
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Natural Coa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.8.2-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="../index.html">
          Natural Coach
        </a>
                <div class="navbar-burger burger" data-target="navMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div id="navMenu" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="admin.html">
            Home
          </a>
                    <a class="navbar-item" href="admin.html">
            Hikers
          </a>
                    <a class="navbar-item" href="admin.html">
            Guides
          </a>
                    <a class="navbar-item" href="admin.html">
            Trips
          </a>
                                 <a class="navbar-item" href="admin.html">
            Groups
          </a>
                </div>

            </div>
        </div>
    </nav>
    <!-- END NAV -->
    <div class="container">
        <div class="columns">
            <div class="column is-3 ">
                <aside class="menu is-hidden-mobile">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a class="is-active" href="admin.html">Dashboard</a></li>
                        <li><a href="hikers.php">Documentation</a></li>
                    </ul>
                    <p class="menu-label">
                      Excursions & Groups Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a href="hikers.php">Add an excursion</a></li>
                                <li><a href="excursion.php">Edit an excursion</a></li>
                                <li><a href="guide.php">Add a Group</a></li>
                                <li><a href="group.php">Edit a Group</a></li>
                            </ul>
                        </li>
                    </ul>
                    <p class="menu-label">
                        Hiker Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a href="hikers.php">Add a hiker</a></li>
                                <li><a href="excursion.php">Edit a Hiker</a></li>
                            </ul>
                        </li>
                </aside>
            </div>



