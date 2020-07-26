  <?php
  require_once 'header.php';
    // Attempt insert query execution
    try{
        // Create prepared statement
        $sql = "INSERT INTO guide ( name, surname, phone,id_excursion) 
                    VALUES (:first_name, :last_name, :phone, :trip_name)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters to statement
        $stmt->bindParam(':first_name', $_REQUEST['first_name']);
        $stmt->bindParam(':last_name', $_REQUEST['last_name']);
        $stmt->bindParam(':phone', $_REQUEST['phone']);
        $stmt->bindParam(':trip_name', $_REQUEST['trip_name']);

        
        // Execute the prepared statement
        if($stmt->execute())
        {
                 
                    echo "<script > window.alert('Guide created successfully')</script>";
                    echo"<script>window.open('guide.php','_self')</script>";

        }

    } catch(PDOException $e){
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
    
    // Close connection
    unset($pdo);
    ?>