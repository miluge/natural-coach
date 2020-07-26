<?php

require_once 'header.php';

$id = 0;

if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
 
if ( !empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];
}
    // delete data
    $sql = "DELETE FROM guide  WHERE id_guide = ?";
    $q = $conn->prepare($sql);
    $q->execute(array($id));

    echo '<div class="container">
    <section class="section">
        <h2 class="title">Success</h2>
        <a class="button is-primary" href="guide.php">Back to Guide page </a>
    <section>
    </div>';
?>