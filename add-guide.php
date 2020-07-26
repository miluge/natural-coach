 
<?php

require_once 'header.php';

?>
<section class="section">
    <div class="container">
<h1 class="title">
        Add new guide 
    </h1>
    <form class="field" action="insertguide.php" method="post" name="add-guide">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text"  name="first_name" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text"  name="last_name" placeholder="Last name">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text"  name="phone" placeholder="Phone">
        </div>
        <br>
         <label class="label">Select Trip</label>
        <div class="control select">
           <select name="trip_name" >
            <option value="">select Trip</option>
        
              <?php
              $con=mysqli_connect("localhost","root","","natural-coach");
                $get_trips="select * from excursion";
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
        <br>
        <div class="control">
            <input class="button is-link"  name="addguide" type="submit" value="Save"></input>
            <a class="button is-danger"  name="" href="guide.php" value="Cancel">Cancel</a>
        </div>
    </form>
    </div>
    </section>
   

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>