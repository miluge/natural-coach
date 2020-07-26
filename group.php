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
                    <th>Trip ID</th>
                     <th>Registered Hikers</th>
                    <th>Max Hikers</th>
                    <th>Registered Guides</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "
                        with recursive mycte1 as(
                        select g.id_group,g.excursion_id,t.max_participant , COUNT(h.id_randonneur ) as registered_hikers
                        from tour g
                        JOIN excursion t ON g.excursion_id = t.id_excursion 
                        left join randonneurs h on h.id_excursion =g.excursion_id 
                        group by h.id_excursion,g.id_group ,t.id_excursion 
                        order by g.id_group
                        ),
                        mycte2 as(
                        select g.id_group,g.excursion_id,t.max_participant , COUNT(guide.id_guide ) as registered_guides
                        from tour g
                        JOIN excursion t ON g.excursion_id = t.id_excursion 
                        left join guide  on guide.id_excursion =g.excursion_id 
                        group by guide.id_excursion,g.id_group , t.id_excursion 
                        order by g.id_group)

                        select  c1.id_group,c1.excursion_id,c1.max_participant,c1.registered_hikers,c2.registered_guides
                        from mycte1 c1
                        inner join mycte2 c2
                        on c1.id_group=c2.id_group;";
 
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
                  <th> $row[3] </th>
                 <th> $row[2] </th>
                 <th> $row[4] </th>
              


               
                
                <th>";
                echo '<a class="button is-primary btn-table margin-r" href="edit-hiker.php?id='.$row[0].'">Edit</a>';
                echo '<a id="delete" class="delete-btn button is-danger" href="delete-group.php?id='.$row[0].'">Delete</a>';
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
