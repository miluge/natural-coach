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
    $sql = "DELETE FROM randonneurs  WHERE id_randonneur = ?";
    $q = $conn->prepare($sql);
    $q->execute(array($id));

?>

