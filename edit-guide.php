<?php

require_once 'header.php';

?>

<section class="section">
    <h1 class="title">
        Edit a guide
    </h1>
    <div class="field has-addons">
  <div class="control is-expanded">
    <div class="select is-fullwidth">
      <select name="country">
          <?php
            echo '<option value=\"value\">Argentina</option>';
          ?>
        <option value="Argentina">Argentina</option>
        <option value="Bolivia">Bolivia</option>
        <option value="Brazil">Brazil</option>
        <option value="Chile">Chile</option>
        <option value="Colombia">Colombia</option>
        <option value="Ecuador">Ecuador</option>
        <option value="Guyana">Guyana</option>
        <option value="Paraguay">Paraguay</option>
        <option value="Peru">Peru</option>
        <option value="Suriname">Suriname</option>
        <option value="Uruguay">Uruguay</option>
        <option value="Venezuela">Venezuela</option>
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
        <div class="control">
            <input class="button is-link  " value="Save"></input>
            <input class="button is-link  " value="Save & Edit another"></input>
            <input class="button is-danger  " value="Cancel"></input>
        </div>
    </form>
</section>