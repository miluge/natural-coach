<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container">
<form class="field" action="add_guide.php" method="post">
    <div class="control">
            <input class="button is-link  " type="submit" value="Add Guide"></input>
    </form>
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
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
        $rows = $statement->fetchAll(PDO::FETCH_NUM);
 
        //Loop through our table names.
        foreach($rows as $row){
        //Print the table name out onto the page.
        echo "
        <tr>
        <th> $row[0] </th>
        <th> $row[1] </th>
        <th> $row[2] </th>
        <th> $row[3] </th>
        <th>
        <span class=\"icon button  \">
            <i class=\"material-icons\">edit</i>
        </span>
        <span class=\"icon button  \">
            <i class=\"material-icons\">delete</i>
        </span>
        </th>";
}
        ?>
        </tr>
        </tbody>
</table>
</div>
</section>