<?php

require_once 'header.php';

?>

<section class="section">
    <div class="container">
    <h1 class="title">
        Create new group
    </h1>
    <form class="field" action="" method="post" name="add-group">
        <label class="label">Name of the trip</label>
        <div class="control">
            <input class="input" type="text" name="name" placeholder="Name of the trip">
        </div>
        <label class="label">Start date</label>
        <div class="control">
            <input class="input" type="text" name="start_date" placeholder="dd/mm/YYYY">
        </div>
        <label class="label">End date</label>
        <div class="control">
            <input class="input" type="text" name="end_date" placeholder="dd/mm/YYYY">
        </div>
        <br>
        <div class="control">
            <input class="button is-link " type="submit" value="Save"></input>
            <input class="button is-danger " value="Cancel"></input>
        </div>
    </form>
    </div>
</section>