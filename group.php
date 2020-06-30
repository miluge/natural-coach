<?php

require_once 'header.php';

?>
<section class="section">
    <div class="container">
    <form class="field" action="insert_excursion.php" method="post">
    <div class="control">
            <a class="button is-link  " href="add-group.php">Add Group</a>
    </form>
        <table class="table is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>ID Group</th>
                    <th>Trip</th>
                    <th>Max Hikers</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tour";
 
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
                <th> $row[2] </th>
                <th>
                <a class=\"icon button  \" href='edit.php'>
                <i class=\"material-icons\">edit</i>
                </a>
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
