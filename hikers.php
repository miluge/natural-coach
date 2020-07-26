 <?php

require_once 'header.php';

?>

<section class="section">
    <div class="container table_wrapper">
    <form class="field" action="#" method="post">
    <div class="control">
    <a class="button is-link" href="add-hiker.php">Add Hiker</a>
    </form>
    <table class="table is-hoverable is-fullwidth">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Excursion ID</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM randonneurs";
 
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
        echo '<th> ID ' . $row['id_randonneur'] . '</th>';
        echo '<th data-field="name">' . $row['name'] . '</th>';
        echo '<th data-field="surname">' . $row['surname'] . '</th>';
        echo '<th data-field="email">' . $row['email'] . '</th>';
        echo '<th data-field="email">' . $row['id_excursion'] . '</th>';
        echo '<th>';
        echo '<a class="button is-primary btn-table" href="edit-hiker.php?id='.$row['id_randonneur'].'">Edit</a>';
        echo '<a class="delete-btn button is-danger" href="delete-hiker.php?id='.$row['id_randonneur'].'">Delete</a>';
        echo "</th>
        <tr>";
    }
        ?>
        
    </tbody>
    </table>
    </div>
</section>

<?php 

require 'footer.php';

?>
