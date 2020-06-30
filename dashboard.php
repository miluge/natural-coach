<?php 

require_once 'header.php';

?>
  <section class="section">
    <div class="columns is-desktop">
      <div class="column">
        <div class="card">
          <div class="card-content">
            <p class="title">
              Registered hikers
            </p>
            <p class="content">
            <?php

            $reponse = $conn->prepare('SELECT count(id_randonneur) as total from `randonneurs`');
            $reponse->execute(); 
            $total = $reponse->fetch(PDO::FETCH_ASSOC);
            echo $total['total'];

            ?>

            </p>
          </div>
          <footer class="card-footer">
            <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-hikers" method="post" value="Export">
              </input>
            </form>
            <p class="card-footer-item">
                <a class="button is-link" href="add-hiker.php">Add</a>
            </p>
            <p class="card-footer-item">
                <a class="button is-link" href="edit-hiker.php">Edit</a>
            </p>
          </footer>
        </div>
      </div>
      <div class="column">
      <div class="card">
          <div class="card-content">
            <p class="title">
              Trips
            </p>
            <p class="content">
            <?php

              $reponse = $conn->prepare('SELECT count(id_excursion) as total from `excursion`');
              $reponse->execute(); 
              $total = $reponse->fetch(PDO::FETCH_ASSOC);
              echo $total['total'];

            ?>
            </p>
          </div>
          <footer class="card-footer">
          <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-excursion" method="post" value="Export">
              </input>
            </form>
            <p class="card-footer-item">
              <a class="button is-link" href="add-excursion.php">
                Add
              </a>
            </p>
            <p class="card-footer-item">
              <a class="button is-link" href="edit-excursion.php">
                Edit
              </a>
            </p>
          </footer>
        </div>
      </div>
      <div class="column">
      <div class="card">
          <div class="card-content">
            <p class="title">
              Guides
            </p>
            <p class="content">
            <?php

              $reponse = $conn->prepare('SELECT count(id_guide) as total from `guide`');
              $reponse->execute(); 
              $total = $reponse->fetch(PDO::FETCH_ASSOC);
              echo $total['total'];

            ?>
            </p>
          </div>
          <footer class="card-footer">
          <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-guide" method="post" value="Export">
              </input>
            </form>
            <p class="card-footer-item">
              <a class="button is-link" href="add_guide.php"> 
                Add
              </a>
            </p>
            <p class="card-footer-item">
              <a class="button is-link" href="edit-guide.php">
                Edit
              </a>
            </p>
          </footer>
        </div>
      </div>
      <div class="column">
      <div class="card">
          <div class="card-content">
            <p class="title">
              Groups
            </p>
            <p class="content">
            <?php

              $reponse = $conn->prepare('SELECT count(id_group) as total from `tour`');
              $reponse->execute(); 
              $total = $reponse->fetch(PDO::FETCH_ASSOC);
              echo $total['total'];

            ?>
            </p>
          </div>
          <footer class="card-footer">
          <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-group" method="post" value="Export">
              </input>
            </form>
            <p class="card-footer-item">
              <a class="button is-link" href="add-group.php">
                Add
              </a>
            </p>
            <p class="card-footer-item">
              <a class="button is-link" href="edit-group.php">
                Edit
              </a>
            </p>
          </footer>
        </div>
      </div>
    </div>
</section>


<?php
require_once 'footer.php';
?>