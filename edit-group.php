<?php

require_once 'header.php';

?>

<section class="section">
  <div class="container">
    <h1 class="title">
        Edit a group
    </h1>
    <div class="field has-addons">
  <div class="control is-expanded">
    <div class="select is-fullwidth">
        <?php
          //Our select statement. This will retrieve the data that we want.
          $sql = "SELECT id_group, excursion_id FROM tour";
 
          //Prepare the select statement.
          $stmt = $conn->prepare($sql);
 
          //Execute the statement.
          $stmt->execute();
 
          //Retrieve the rows using fetchAll.
          $tours = $stmt->fetchAll();
          ?>
        <select>
            <?php foreach($tours as $tour): ?>
                <option value="<?= $tour['id_group']; ?>"><?= $tour['excursion_id']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
  </div>
  <div class="control">
    <button type="submit" class="button is-primary">Choose</button>
  </div>
</div>
    <form class="field">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" placeholder="Text input">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" placeholder="Text input">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" placeholder="Text input">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" placeholder="Text input">
        </div>
        <br>
        <div class="field">
            <input type="input" class="button is-link  " value="Save"></input>
            <input type="input" class="button is-link  " value="Save & Edit another"></input>
            <input type="input" class="button is-danger  " value="Cancel"></input>
        </div>
    </form>
    </div>
</section>