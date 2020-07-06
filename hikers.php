<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container table_wrapper">
    <form class="field" action="insert_excursion.php" method="post">
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
        echo '<th>' . $row['id_randonneur'] . '</th>';
        echo '<th data-field="name">' . $row['name'] . '</th>';
        echo '<th data-field="surname">' . $row['surname'] . '</th>';
        echo '<th data-field="email">' . $row['email'] . '</th>';
        echo '<th>';
        echo '<a class="button is-primary btn-table" href="edit-hiker.php?id='.$row['id_randonneur'].'">Edit</a>';
        echo '<a id="ByeBye" class="button is-danger" href="delete.php?id='.$row['id_randonneur'].'">Delete</a>';
        echo "</th>
        <tr>";
    }
        ?>
        
    </tbody>
    </table>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="js/table-edits.min.js"></script>
<script src="js/delete.js"></script>
<script src="js/form-validation.js"></script>

<script>
  // Close mobile & tablet menu on item click
  $('.navbar-item').each(function(e) {
    $(this).click(function(){
      if($('#navbar-burger-id').hasClass('is-active')){
        $('#navbar-burger-id').removeClass('is-active');
        $('#navbar-menu-id').removeClass('is-active');
      }
    });
  });

  // Open or Close mobile & tablet menu
  $('#navbar-burger-id').click(function () {
    if($('#navbar-burger-id').hasClass('is-active')){
      $('#navbar-burger-id').removeClass('is-active');
      $('#navbar-menu-id').removeClass('is-active');
    }else {
      $('#navbar-burger-id').addClass('is-active');
      $('#navbar-menu-id').addClass('is-active');
    }
  });

  //
</script>
</body>
</html>
