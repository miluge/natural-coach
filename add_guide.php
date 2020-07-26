<?php

require_once 'header.php';

?>
<section class="section">
    <div class="container">
<h1 class="title">
        Add new guide
    </h1>
    <form class="field" action="add-guide.php" method="post" name="add-guide">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text"  name="first_name" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text"  name="last_name" placeholder="Last name">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text"  name="phone" placeholder="Phone">
        </div>
        <br>
        <div class="control">
            <input class="button is-link"  name="" type="submit" value="Save"></input>
            <input class="button is-danger"  name="" value="Cancel"></input>
        </div>
    </form>
    </div>
    </section>
    <?php
    // Attempt insert query execution
    try{
        // Create prepared statement
        $sql = "INSERT INTO guide ( name, surname, phone) VALUES (:first_name, :last_name, :phone)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters to statement
        $stmt->bindParam(':first_name', $_REQUEST['first_name']);
        $stmt->bindParam(':last_name', $_REQUEST['last_name']);
        $stmt->bindParam(':phone', $_REQUEST['phone']);
        
        // Execute the prepared statement
        $stmt->execute();
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    
    // Close connection
    unset($pdo);


    require 'footer.php';

    ?>

