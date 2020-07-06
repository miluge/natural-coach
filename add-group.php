<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container">
    <h1 class="title">
        Create new group
    </h1>
    <form class="field" action="" method="post" name="add-group">
        <label class="label">Excursion ID</label>
        <div class="control">
            <input class="input" type="text" name="id_excursion" placeholder="Add the excursion ID to the group">
        </div>
        <label class="label">Max participants</label>
        <div class="control">
            <input class="input" type="text" name="max_place" placeholder="Add a maximum capacity">
        </div>
        <br>
        <div class="control">
            <input class="button is-link " type="submit" name="submit-group" value="Save"></input>
            <input class="button is-danger " value="Cancel"></input>
        </div>
        <?php
        // Attempt insert query execution
        try{
        // Create prepared statement
        $sql = "INSERT INTO tour ( id_excursion, max_place) VALUES (:id_excursion, :max_place)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters to statement
        $stmt->bindParam(':id_excursion', $_REQUEST['id_excursion']);
        $stmt->bindParam(':max_place', $_REQUEST['max_place']);
        
        // Execute the prepared statement
        $stmt->execute();
    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    } 
    // Close connection
    unset($pdo);
    ?>
    </form>
    </div>
</section>