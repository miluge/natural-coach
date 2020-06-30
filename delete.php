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
    header("Location: dashboard.php");

?>

<section class="section">
    <div class="container">
        <form class="field">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <p class="is-centered">Are you sure you want to delete ? </p>
            <br/>
            <div class="control">
                <button class="button   is-danger" type="submit">Yes</button>
                <a class="button is-rounded" href="dashboard.php">No</a>
            </div>
        </form>
    </div>
</section>