<?php

require_once 'header.php';

?>
<section class="section">
    <div class="container">
            <a class="button is-link  " href="add-excursion.php">Add Trip</a>
        <table class="table is hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End date</th>
                    <th>Price</th>
                    <th>Starting Point</th>
                    <th>End Point</th>
                    <th><abbr title="Max participants">Max Participants</abbr></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM excursion";
 
                //Prepare our SQL statement,
                $statement = $conn->prepare($sql);
         
                //Execute the statement.
                $statement->execute();
         
                //Fetch the rows from our statement.
                $rows = $statement->fetchAll(PDO::FETCH_NUM);
         
                //Loop through our table names.
                foreach($rows as $row){
                //Print the table name out onto the page.
                echo "<tr>
                <th> $row[0] </th>
                <th> $row[1] </th>
                <th> $row[4] </th>
                <th> $row[5] </th>
                <th> $row[2] </th>
                <th> $row[6] </th>
                <th> $row[7] </th>
                <th> $row[3] </th>
                <th>
                <span class=\"icon button  \">
                <i class=\"material-icons\">edit</i>
                </span>
                <span class=\"icon button  \">
                    <i class=\"material-icons\">delete</i>
                </span>
                </th>
                </tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</section>
