<?php
require_once 'header.php';

        // Attempt insert query execution
        try{


            $sql = "INSERT INTO tour ( excursion_id) VALUES (:id_excursion)";
                     $stmt = $conn->prepare($sql);
                    
                    // Bind parameters to statement
                  $stmt->bindParam(':id_excursion', $_REQUEST['id_excursion']);
               
                  $stmt->execute();


                    echo "<script > window.alert('Group created successfully')</script>";
                    echo"<script>window.open('group.php','_self')</script>";
        
        // Execute the prepared statement
     
        
    } catch(PDOException $e){
        echo $e->getMessage();
         echo "<script > window.alert('some error occour')</script>";
                    echo"<script>window.open('add-group.php','_self')</script>";
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    } 
    // Close connection
    unset($pdo);
   