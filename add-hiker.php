 <?php

require_once 'header.php';
 
?>
<section class="section">
<div class="container">
    <h1 class="title">Add a new hiker</h1>
    <form class="field" action="add-hiker.php" method="post" name="add-hiker">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="first_name" required="" id="firstname" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name" required="" id="lastname" placeholder="Last name">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" name="email" id="email" placeholder="Email" required="">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" placeholder="Phone" required="">
        </div>
         <label class="label">Select Trip</label>
        <div class="control select">
           <select class="select" name="trip_name" id="trip_name">

              <?php
              $con=mysqli_connect("localhost","root","","natural-coach");
                $get_trips="select * from excursion";
                $run_trips=mysqli_query($con,$get_trips);
                while($row_trip=mysqli_fetch_array($run_trips))
                {
                  $trip_id=$row_trip['id_excursion'];
                  $trip_title=$row_trip['name'];
                  
                  echo"<option value='$trip_id' required >$trip_title</option>";
                }
              ?>
            </select>
        </div>
        <div class="control">
            <input class="button is-link " type ="submit" name="addhiker" value="Save"></input>
            <input class="button is-danger  " value="Cancel"></input>
        </div>       
    </form>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="js/form-validation.js"></script>
<script src="js/delete.js"></script>
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


<?php

if(isset($_POST['addhiker']))
{
    $con=mysqli_connect("localhost","root","","natural-coach");

  $getmaxparticipants=$_POST['trip_name'];

$query_page_info = "SELECT * FROM `excursion` WHERE `id_excursion` = '".$getmaxparticipants."'";

foreach ($con->query($query_page_info) as $row) {
  #query method returns an associate array 

  $max_participant=$row['max_participant'];
 
 
}
                
                   // $countmaxpart = mysqli_num_rows($max_participants);


                


                  $gethikers=$_POST['trip_name'];
                  $sql2 = "select *   from randonneurs where id_excursion =". $gethikers;
                  $regiteredparticipants=mysqli_query($con,$sql2);

                  $countreghikers=mysqli_num_rows($regiteredparticipants);



                  

                  if( $countreghikers>=$max_participant )
                  {
                      echo "<script > window.alert('Participants Completed , No More Hiker can be added to this Excursion ')</script>";
                  echo"<script>window.open('hikers.php','_self')</script>";                
                      
                  }        
                 else
                 {

                  //  echo"max participants for this excursion  ".$max_participant;
                      // echo"max hikers less : ".$countmaxpart;
                   $sql = "INSERT INTO randonneurs ( name, surname, email, phone,id_excursion) VALUES (:first_name, :last_name, :email, :phone,:trip_name)";
                   $stmt = $conn->prepare($sql);
                  
                  // Bind parameters to statement
                  $stmt->bindParam(':first_name', $_REQUEST['first_name']);
                  $stmt->bindParam(':last_name', $_REQUEST['last_name']);
                  $stmt->bindParam(':email', $_REQUEST['email']);
                  $stmt->bindParam(':phone', $_REQUEST['phone']);
                   $stmt->bindParam(':trip_name', $_REQUEST['trip_name']);
                  
                  // Execute the prepared statement
                  $stmt->execute();
                  // echo 'Hiker created successfully.';
                  echo "<script > window.alert('Hiker created successfully')</script>";
                  echo"<script>window.open('hikers.php','_self')</script>";
                 }

          }       
                  

?>



 