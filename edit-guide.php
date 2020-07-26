<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'header.php';

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $stmt = $conn->prepare("SELECT * FROM guide WHERE id_guide = :id");
     $stmt->execute([':id'=>$id]);
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     if (!empty($_POST)) {
//         // This part is similar to the create.php, but instead we update a record and not insert
         $id = isset($_POST['id_guide']) ? $_POST['id_guide'] : NULL;
         $name = isset($_POST['name']) ? $_POST['name'] : '';
         $lastname = isset($_POST['surname']) ? $_POST['surname'] : '';
         $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
//         // Update the record
         $stmts = $conn->prepare('UPDATE guide SET id_guide = :id, name = :name, surname = :surname, phone = :phone WHERE id_guide = :id');
         $stmts->bindValue(':id',$id);
         $stmts->bindValue(':name',$name);
         $stmts->bindValue(':surname',$lastname);
         $stmts->bindValue(':phone',$phone);
         $stmts->execute();
         $msg = 'Updated Successfully!';
         echo '<script>alert("'.$msg.'")</script>';
     }
     // Get the guide from the guide table
     $stmt = $conn->prepare("SELECT * FROM guide WHERE id_guide = :id");
     $stmt->execute([':id'=>$id]);
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     if (!$result) {
         exit('Guide doesn\'t exist with that ID!');
     }
 } else {
     exit('No ID specified!');
 }
?>

<section class="section">
<h1 class="title">Edit guide <?= $_GET['id'] ?></h1>
    <form class="field" action="" method="post" name="edit-guide">
    <input type="hidden" name="id_guide" value="<?php echo $id; ?>" />
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="name" id="name" value="<?php echo $result[0]['name']; ?>" placeholder="Text input">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="surname" id="surname" value="<?php echo $result[0]['surname']; ?>" placeholder="Text input">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" value="<?php echo $result[0]['phone']; ?>" placeholder="Text input">
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type="submit" name="edit-guide" value="Save"></input>
            <a class="button is-danger" href="guides.php" value="Cancel">Cancel</a>
        </div>
    </form>
</section>