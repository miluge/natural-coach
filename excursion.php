<?php

require_once 'header.php';

?>
<section class="section">
    <div class="container table_wrapper">
    <form class="field" action="#" method="post">
    <div class="control">
            <a class="button is-link  " href="add-excursion.php">Add Trip</a>
            </form>
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End date</th>
                    <th>Price</th>
                    <th>Star Point</th>
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
                $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
         
                //Loop through our table names.
                foreach($rows as $row){
                //Print the table name out onto the page.
                echo '<tr>';
                echo '<th> ID ' . $row['id_excursion'] . '</th>';
                echo '<th data-field="name">' . $row['name'] . '</th>';
                echo '<th data-field="start_date">' . $row['start_date'] . '</th>';
                echo '<th data-field="end_date">' . $row['end_date'] . '</th>';
                echo '<th data-field="price">' . $row['price'] . '</th>';
                echo '<th data-field="region_start">' . $row['region_start'] . '</th>';
                echo '<th data-field="region_end">' . $row['region_end'] . '</th>';
                echo '<th data-field="max_participant">' . $row['max_participant'] . '</th>';
                echo '<th>';
                echo '<a class="button is-primary btn-table margin-r" href="edit-excursion.php?id='.$row['id_excursion'].'">Edit</a>';
                echo '<a id="delete" class="delete-btn button is-danger" href="delete-excursion.php?id='.$row['id_excursion'].'">Delete</a>';
                echo "</th>
                </tr>";
                }

                ?>
            </tbody>
        </table>
    </div>
</section>

<?php

require 'footer.php'

?>
