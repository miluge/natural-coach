<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

require_once 'header.php';

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $stmt = $conn->prepare("SELECT * FROM randonneurs WHERE id_randonneur = :id");
     $stmt->execute([':id'=>$id]);
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     if (!empty($_POST)) {
//         // This part is similar to the create.php, but instead we update a record and not insert
         $id = isset($_POST['id_randonneur']) ? $_POST['id_randonneur'] : NULL;
         $name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
         $lastname = isset($_POST['last_name']) ? $_POST['last_name'] : '';
         $email = isset($_POST['email']) ? $_POST['email'] : '';
         $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
//         // Update the record
         $stmts = $conn->prepare('UPDATE randonneurs SET id_randonneur = :id, name = :name, surname = :lastname, email = :email, phone = :phone WHERE id_randonneur = :id');
         $stmts->bindValue(':id',$id);
         $stmts->bindValue(':name',$name);
         $stmts->bindValue(':lastname',$lastname);
         $stmts->bindValue(':email',$email);
         $stmts->bindValue(':phone',$phone);
         $stmts->execute();
         $msg = 'Updated Successfully!';
         echo '<script>alert("'.$msg.'")</script>';
     }
     // Get the hiker from the hikers table
     $stmt = $conn->prepare("SELECT * FROM randonneurs WHERE id_randonneur = :id");
     $stmt->execute([':id'=>$id]);
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $result = $stmt->fetchAll();
     if (!$result) {
         exit('Hiker doesn\'t exist with that ID!');
     }
 } else {
     exit('No ID specified!');
 }
?>

<section class="section">
<div class="container">
    <h1 class="title">Edit hiker <?= $_GET['id'] ?></h1>
    <form class="field" action="" method="post" name="edit-hiker">
        <input type="hidden" name="id_randonneur" value="<?php echo $id; ?>" />
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="first_name" id="first_name" value="<?php echo $result[0]['name']; ?>" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name" id="last_name" value="<?php echo $result[0]['surname']; ?>" placeholder="Last name">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" name="email" id="email" value="<?php echo $result[0]['email']; ?>" placeholder="Email">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" value="<?php echo $result[0]['phone']; ?>" placeholder="Phone">
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type ="submit" name="edit-hiker" value="Update"></input>
            <a class="button is-danger" href="hikers.php">Back</a>
        </div>       
    </form>
</div>
</section>

<?php
    require 'footer.php';
    ?>