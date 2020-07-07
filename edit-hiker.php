<?php

require_once 'header.php';

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $name = isset($_POST['surname']) ? $_POST['surname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        // Update the record
        $stmt = $pdo->prepare('UPDATE randonneurs SET id = ?, name = ?, email = ?, phone = ? WHERE id = ?');
        $stmt->execute([$id, $name, $lastname, $email, $phone, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $conn->prepare('SELECT * FROM randonneurs WHERE id_randonneur = ?');
    $stmt->execute([$_GET['id']]);
    $hiker = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$hiker) {
        exit('Hiker doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<section class="section">
<div class="container">
    <h1 class="title">Edit hiker</h1>
    <form class="field" action="" method="post" name="edit-hiker">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="first_name" id="first_name" value="<?= $name['name'] ?>" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name" id="last_name" value="" placeholder="Last name">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" name="email" id="email" value="" placeholder="Email">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" value="" placeholder="Phone">
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type ="submit" name="edit-hiker" value="Update"></input>
            <a class="button is-danger" href="hikers.php">Back</a>
        </div>       
    </form>
</div>
</section>