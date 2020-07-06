<?php

require_once 'header.php';

?>
<section class="section">
<div class="container">
    <h1 class="title">Add a new hiker</h1>
    <form class="field" action="insert.php" method="post" name="add-hiker">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="first_name" id="firstname" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name" id="lastname" placeholder="Last name">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" name="email" id="email" placeholder="Email">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" placeholder="Phone">
        </div>
        <br>
        <div class="control">
            <input class="button is-link " type ="submit" name="submit" value="Save"></input>
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
