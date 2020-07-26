<?php

require_once 'header.php';

                // Attempt insert query execution
                try{
                   
                     $sql = "INSERT INTO randonneurs ( name, surname, email, phone,id_excursion) VALUES (:first_name, :last_name, :email, :phone,:trip_name)";
                     $stmt = $conn->prepare($sql);
                    
                    // Bind parameters to statement
                    $stmt->bindParam(':first_name', $_REQUEST['first_name']);
                    $stmt->bindParam(':last_name', $_REQUEST['last_name']);
                    $stmt->bindParam(':email', $_REQUEST['email']);
                    $stmt->bindParam(':phone', $_REQUEST['phone']);
                     $stmt->bindParam(':trip_name', $_REQUEST['trip_name']);
                    
                    // Execute the prepared statement
                    $stmt->execute();
                    echo "Hiker created successfully.";
                    echo "<script > window.alert('Hiker created successfully')</script>";
                    echo"<script>window.open('hikers.php','_self')</script>";
                   }
                    
                     
                catch(PDOException $e){
                    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
                }
                
                // Close connection
                unset($pdo);

                                  
