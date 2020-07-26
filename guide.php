<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container">
<form class="field" action="add-guide.php" method="post">
    <div class="control">
            <input class="button is-link " type="submit" value="Add Guide"></input>
    </form>
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                 <th>Excursion ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php  
        $sql = "SELECT * FROM guide";
 
        //Prepare our SQL statement,
        $statement = $conn->prepare($sql);
 
        //Execute the statement.
        $statement->execute();
 
        //Fetch the rows from our statement.
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
 
        //Loop through our table names.
        foreach($rows as $row){
        //Print the table name out onto the page.
        echo '<tr>';
        echo '<th> ID ' . $row['id_guide'] . '</th>';
        echo '<th data-field="name">' . $row['name'] . '</th>';
        echo '<th data-field="surname">' . $row['surname'] . '</th>';
        echo '<th data-field="phone">' . $row['phone'] . '</th>';
        echo '<th data-field="id_excursion">' . $row['id_excursion'] . '</th>';
        echo '<th>';
        echo '<a class="button is-primary btn-table" href="edit-guide.php?id='.$row['id_guide'].'">Edit</a>';
        echo '<a id="delete" class="delete-btn button is-danger" href="delete-guide.php?id='.$row['id_guide'].'">Delete</a>';
        echo "</th>
        <tr>";
    }
        ?>
        </tr>
        </tbody>
</table>
</div>
</section>
<?php
require 'footer.php'
?>