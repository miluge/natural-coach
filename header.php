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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.8.2-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.8.2/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- START NAV -->
    <nav class="navbar is-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item brand-text" href="dashboard.php">
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
                    <a class="navbar-item" href="dashboard.php">
            Home
          </a>
                    <a class="navbar-item" href="hikers.php">
            Hikers
          </a>
                    <a class="navbar-item" href="guide.php">
            Guides
          </a>
                    <a class="navbar-item" href="excursion.php">
            Excursions
          </a>
                    <a class="navbar-item" href="group.php">
            Groups
          </a>
          <a class="button navbar-item is-hidden-desktop logout-m is-danger" href="logout.php">
            Log out
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
                        <li><a class="is-active" href="dashboard.php">Dashboard</a></li>
                        <li><a href="https://github.io/miluge">Github</a></li>
                    </ul>
                    <p class="menu-label">
                      Excursion Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a href="excursion.php">Excursions</a></li>
                                <li><a href="add-excursion.php">Add an excursion</a></li>
                                <!-- <li><a href="excursion.php">Edit an excursion</a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <p class="menu-label">
                        Hiker Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                            <li><a href="hikers.php">Hikers</a></li>
                                <li><a href="add-hiker.php">Add a hiker</a></li>
                                <!-- <li><a href="edit-hiker.php">Edit a Hiker</a></li> -->
                            </ul>
                        </li>
                    <p class="menu-label">
                      Group Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a href="group.php">Groups</a></li>
                                <li><a href="add-group.php">Add a group</a></li>
                                <!-- <li><a href="excursion.php">Edit an excursion</a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <p class="menu-label">
                      Guide Administration
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a href="guide.php">Guides</a></li>
                                <li><a href="add-guide.php">Add a guide</a></li>
                                <!-- <li><a href="excursion.php">Edit an excursion</a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <p class="menu-label">
                      Log out
                    </p>
                    <ul class="menu-list">
                        <li>
                            <ul>
                                <li><a class="button is-danger" href="logout.php">Log Out</a></li>
                            </ul>
                        </li>
                </aside>
            </div>



