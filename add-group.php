<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container">
    <h1 class="title">
        Create new group
    </h1>
    <form class="field" action="insertgroup.php" method="post" name="add-group">
         <label class="label">Select Excursion </label>
        <div class="control select">
           <select class="select" name="id_excursion" >
         
              <?php
              $con=mysqli_connect("localhost","root","","natural-coach");
                $get_trips="select * from excursion ";
                $run_trips=mysqli_query($con,$get_trips);
                while($row_trip=mysqli_fetch_array($run_trips))
                {
                  $trip_id=$row_trip['id_excursion'];
                  $trip_title=$row_trip['name'];
                  
                  echo"<option value='$trip_id' required>$trip_title</option>";
                }
              ?>
            </select>
        </div>
        <div class="control">
            <input class="button is-link " type="submit" name="submit-group" value="Save"></input>
            <input class="button is-danger " value="Cancel"></input>
        </div>

    </form>
    </div>
</section>

