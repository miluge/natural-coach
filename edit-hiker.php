<?php

require_once 'header.php';

?>
<section class="section">
<div class="container">
    <h1 class="title">Add a new hiker</h1>
    <form class="field" action="edit-hiker.php?id=<?php echo $id?>" method="post" name="add-hiker">
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
            <input class="button is-link" type ="submit" value="Update"></input>
            <a class="button is-danger" href="hikers.php">Back</a>
        </div>       
    </form>
</div>
</section>