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
            <input class="button is-link  " type ="submit" value="Save"></input>
            <input class="button is-danger  " value="Cancel"></input>
        </div>       
    </form>
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/form-validation.js"></script>
