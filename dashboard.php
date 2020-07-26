<?php 

require_once 'header.php';

?>

<div class="column is-9">
                <!-- <nav class="breadcrumb" aria-label="breadcrumbs">
                    <ul>
                            <?php
                            // break absolute path into individual items
                            $breadcrumb_menu = explode(DIRECTORY_SEPARATOR, getcwd());
                            $path_accum = ''; // initialize increment
                            $is_home = false;
                            // iterate over root directory
                            foreach ($breadcrumb_menu as $item) {
                                $path_accum .= $item . DIRECTORY_SEPARATOR; // recursive path increment
                                if ($item === $home_dir) {
                                    $is_home = true;
                                }
                                if ($is_home) {
                                    echo "<li><a href=\"?dir=$path_accum\" title=\"$path_accum\">$item</a></li>";
                                }
                                }

                            ?> 
                        <li class="is-active"><a href="#" aria-current="page">Admin</a></li>
                    </ul>
                </nav> -->
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Hello, Admin.
                            </h1>
                            <h2 class="subtitle">
                                I hope you are having a great day!
                            </h2>
                        </div>
                    </div>
                </section>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">
                                    <?php

                                    $reponse = $conn->prepare('SELECT count(id_randonneur) as total from `randonneurs`');
                                    $reponse->execute(); 
                                    $total = $reponse->fetch(PDO::FETCH_ASSOC);
                                    echo $total['total'];

                                    ?>
                                </p>
                                <p class="subtitle">Hikers</p>
                                <form class="card-footer-item" action="functions.php" method="post">
                                    <input class="button is-link" type="submit" name="Export-hikers" method="post" value="Export">
                                    </input>
                                </form>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">
                                <?php

                                $reponse = $conn->prepare('SELECT count(id_excursion) as total from `excursion`');
                                $reponse->execute(); 
                                $total = $reponse->fetch(PDO::FETCH_ASSOC);
                                echo $total['total'];

                                ?>
                                </p>
                                <p class="subtitle">Excursions</p>
                                <form class="card-footer-item" action="functions.php" method="post">
                                <input class="button is-link" type="submit" name="Export-excursion" method="post" value="Export">
                                </input>
                                </form>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">
                                <?php

                                $reponse = $conn->prepare('SELECT count(id_guide) as total from `guide`');
                                $reponse->execute(); 
                                $total = $reponse->fetch(PDO::FETCH_ASSOC);
                                echo $total['total'];

                                ?>
                                </p>
                                <p class="subtitle">Guides</p>
                                <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-guide" method="post" value="Export">
              </input>
            </form>
                            </article>
                        </div>
                        <div class="tile is-parent">
                            <article class="tile is-child box">
                                <p class="title">
                                <?php

                                $reponse = $conn->prepare('SELECT count(id_group) as total from `tour`');
                                $reponse->execute(); 
                                $total = $reponse->fetch(PDO::FETCH_ASSOC);
                                echo $total['total'];

                                ?>
                                </p>
                                <p class="subtitle">Groups</p>
                                <form class="card-footer-item" action="functions.php" method="post">
              <input class="button is-link" type="submit" name="Export-group" method="post" value="Export">
              </input>
            </form>
                            </article>
                        </div>
                    </div>
                </section>
<?php
require_once 'footer.php';
?>