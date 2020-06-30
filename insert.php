<?php

require_once 'header.php';

                // Attempt insert query execution
                try{
                    // Create prepared statement
                    $sql = "INSERT INTO randonneurs ( name, surname, email, phone) VALUES (:first_name, :last_name, :email, :phone)";
                    $stmt = $conn->prepare($sql);
                    
                    // Bind parameters to statement
                    $stmt->bindParam(':first_name', $_REQUEST['first_name']);
                    $stmt->bindParam(':last_name', $_REQUEST['last_name']);
                    $stmt->bindParam(':email', $_REQUEST['email']);
                    $stmt->bindParam(':phone', $_REQUEST['phone']);
                    
                    // Execute the prepared statement
                    $stmt->execute();
                    echo "Hiker created successfully.";
                } catch(PDOException $e){
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }
                
                // Close connection
                unset($pdo);

                header("location:hikers.php");

                ?>