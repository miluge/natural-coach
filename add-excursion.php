<?php

require_once 'header.php';

?>
<section class="section">
<div class="container">
    <h1 class="title">
    Create new excursion
    </h1>
    <form class="field" action="" method="post" name="add-trip">
        <label class="label">Name of the trip</label>
        <div class="control">
            <input class="input" type="text" name="name" placeholder="Name of the trip" required>
        </div>
        <label class="label">Start date</label>
        <div class="control">
            <input class="input" type="text" name="start_date" id="StartDate" placeholder="YYYY-MM-DD"  required>
        </div>
        <label class="label">End date</label>
        <div class="control">
            <input class="input" type="text" name="end_date" id="EndDate" placeholder="YYYY-MM-DD" required>
        </div>
        <label class="label">Price</label>
        <div class="control">
            <input class="input" type="text" name="price" placeholder="Price" required>
        </div>
        <label class="label">Starting Point</label>
        <div class="control">
            <input class="input" type="text" name="region_start" placeholder="Starting point" required>
        </div>
        <label class="label">End Point</label>
        <div class="control">
            <input class="input" type="text" name="region_end" placeholder="Ending point" required>
        </div>
        <label class="label">Group max Participants</label>
        <div class="control">
            <input class="input" type="text" name="max_participant" placeholder="Max participants" required>
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type="submit" value="Save"></input>
            <input class="button is-danger" value="Cancel"></input>
        </div>
    </form>
    </div>
    <section>
<?php

// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO excursion ( name, price, max_participant, start_date, end_date, region_start, region_end) VALUES (:name, :price, :max_participant, :start_date, :end_date, :region_start, :region_end)";
    $stmt = $conn->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':name', $_REQUEST['name']);
    $stmt->bindParam(':price', $_REQUEST['price']);
    $stmt->bindParam(':max_participant', $_REQUEST['max_participant']);
    $stmt->bindParam(':start_date', $_REQUEST['start_date']);
    $stmt->bindParam(':end_date', $_REQUEST['end_date']);
    $stmt->bindParam(':region_start', $_REQUEST['region_start']);
    $stmt->bindParam(':region_end', $_REQUEST['region_end']);
    
    
    // Execute the prepared statement
    $stmt->execute();
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>


