<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

    require 'header.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM excursion WHERE id_excursion = :id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (!empty($_POST)) {
   //         // This part is similar to the create.php, but instead we update a record and not insert
            $id = isset($_POST['id_excursion']) ? $_POST['id_excursion'] : NULL;
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
            $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
            $price = isset($_POST['price']) ? $_POST['price'] : '';
            $region_start = isset($_POST['region_start']) ? $_POST['region_start'] : '';
            $region_end = isset($_POST['region_end']) ? $_POST['region_end'] : '';
            $max_participant = isset($_POST['max_participant']) ? $_POST['max_participant'] : '';
   //         // Update the record
            $stmts = $conn->prepare('UPDATE excursion SET id_excursion = :id, start_date = :start_date, end_date = :end_date, price = :price, region_start =:region_start, region_end = :region_end, max_participant = :max_participant WHERE id_excursion = :id');
            $stmts->bindValue(':id',$id);
            $stmts->bindValue(':name',$name);
            $stmts->bindValue(':start_date',$start_date);
            $stmts->bindValue(':end_date',$end_date);
            $stmts->bindValue(':price',$price);
            $stmts->bindValue(':region_start',$region_start);
            $stmts->bindValue(':region_end',$region_end);
            $stmts->bindValue(':max_participant',$max_participant);
            $stmts->execute();
            $msg = 'Updated Successfully!';
            echo '<script>alert("'.$msg.'")</script>';
        }
        // Get the excursion from the excursiontable
        $stmt = $conn->prepare("SELECT * FROM excursion WHERE id_excursion = :id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (!$result) {
            exit('excursion doesn\'t exist with that ID!');
        }
    } else {
        exit('No ID specified!');
    }
    ?>

<section class="section">
<div class="container">
<h1 class="title">Edit Excursion <?= $_GET['id'] ?></h1>
    <form class="field" action="" method="post" name="edit-excursion">
    <input type="hidden" name="id_excursion" value="<?php echo $id; ?>" />
    <input type="hidden" name="redirect-url" value="dashboard.php">
        <label class="label">Name of the trip</label>
        <div class="control">
            <input class="input" type="text" name="name" value="<?php echo $result[0]['name']; ?>" placeholder="Name of the trip">
        </div>
        <label class="label">Start date</label>
        <div class="control">
            <input class="input" type="text" name="start_date" value="<?php echo $result[0]['start_date']; ?>" id="StartDate" placeholder="YYYY-MM-DD" >
        </div>
        <label class="label">End date</label>
        <div class="control">
            <input class="input" type="text" name="end_date" value="<?php echo $result[0]['end_date']; ?>"id="EndDate" placeholder="YYYY-MM-DD">
        </div>
        <label class="label">Price</label>
        <div class="control">
            <input class="input" type="text" value="<?php echo $result[0]['price']; ?>"name="price" placeholder="Price">
        </div>
        <label class="label">Starting Point</label>
        <div class="control">
            <input class="input" type="text" name="region_start" value="<?php echo $result[0]['region_start']; ?>" placeholder="Starting point">
        </div>
        <label class="label">End Point</label>
        <div class="control">
            <input class="input" type="text" name="region_end" value="<?php echo $result[0]['region_end']; ?>" placeholder="Ending point">
        </div>
        <label class="label">Group max Participants</label>
        <div class="control">
            <input class="input" type="text" name="max_participant" value="<?php echo $result[0]['max_participant']; ?>" placeholder="Max participants">
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type="submit" name="edit-excursion"value="Update"></input>
            <a class="button is-danger" href="excursion.php">Cancel</a>
        </div>
    </form>
    </div>
    <section> 

    <?php
    require 'footer.php';
    ?>