<?php

require_once 'header.php';

//On va vérifier si on reçoit le formulaire
$nom = '';
$prenom= '';
$adresse= '';
$complement= '';
$cp= '';
$ville='';
$dateEntry= '';
$id= '';
$error= false;

//Vérifier si on passe en mode edit et non en mode ajout
if (isset($_GET['id']) && isset($_GET['edit'])){
    $sql = 'select id, nom, prenom, adresse, complement_adresse, cp, ville, date_entree from stagiaire where id=:id';

    $sth= $dbh->prepare($sql);

    $sth->bindParam(':id', $_GET['id'], PDO::PARAM_INT);

    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

//Si pas de résultat de la requête, $result est booleen
    if( gettype($result)==="boolean"){
// On redirige la personne sur la page index.
        header('Location: index.php');
        exit;
    }

    $nom =$result['nom'];
    $prenom=$result['prenom'];
    $adresse= $result['adresse'];
    $complement= $result['complement_adresse'];
    $cp=$result['cp'];
    $ville=$result['ville'];
    $dateEntry=$result['date_entree'];
    $id=htmlentities($_GET['id']);
}

//Uniquement si on a soumis le formulaire
    if( count($_POST) > 0){


if(strlen(trim($_POST['nom']))!== 0){
    $nom = trim($_POST['nom']);
}else{
    $error = true;
}

if(strlen(trim($_POST['prenom']))!== 0){
    $prenom = trim($_POST['prenom']);
}else{
    $error = true;
}

if(strlen(trim($_POST['adresse']))!== 0){
    $adresse = trim($_POST['adresse']);
}else{
    $error = true;
}

if( strlen(trim($_POST['cp']))!== 0){
    $cp = trim($_POST['cp']);
}else{
    $error = true;
}

if( strlen(trim($_POST['ville']))!== 0){
    $ville = trim($_POST['ville']);
}else{
    $error = true;
}

if( strlen(trim($_POST['date']))!== 0){
    $dateEntry = trim($_POST['date']);
}else{
    $error = true;
}

$complement = trim($_POST['complement']);
if(isset($_POST['edit']) && isset($_POST['id'])){
$id = htmlentities($_POST['id']);
}

// Si pas d'erreurs on insère dans la base de données
if($error === false){

    if(isset($_POST['edit']) && isset($_POST['id'])){
        //On met à jour
        $sql = "UPDATE stagiaire set nom=:nom, prenom=:prenom, adresse=:adresse, complement_adresse=:complement, cp=:cp, ville=:ville, date_entree=:date_entree WHERE id=:id";

    }else{
        //On va insérer
        $sql = "INSERT INTO stagiaire(nom,prenom,adresse,complement_adresse,cp,ville,date_entree) VALUES(:nom,:prenom,:adresse,:complement,:cp,:ville,:date_entree)";
    }
    $sth= $dbh->prepare($sql);


    //bindParam : important de se protéger contre l'injection SQL & HTML
    $sth->bindParam(':nom', $nom, PDO::PARAM_STR);
    $sth->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $sth->bindParam(':complement', $complement, PDO::PARAM_STR);
    $sth->bindParam(':cp', $cp, PDO::PARAM_STR);
    $sth->bindParam(':ville', $ville, PDO::PARAM_STR);
    $sth->bindValue(':date_entree', strftime("%Y-%m-%d" ,strtotime($dateEntry)), PDO::PARAM_STR);
    if(isset($_POST['edit']) && isset($_POST['id'])){
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
    }
    $sth->execute();

    //Redirection après insertion
    header('Location: index.php');
}
}

?>
<section class="section">
<div class="container">
    <h1 class="title">Add a new hiker <?php echo $id ?></h1>
    <form class="field" action="edit-hiker.php?id=<?php echo $id?>" method="post" name="add-hiker">
        <label class="label">First name</label>
        <div class="control">
            <input class="input" type="text" name="first_name" id="firstname" value="<?=$first_name; ?>" placeholder="First name">
        </div>
        <label class="label">Last Name</label>
        <div class="control">
            <input class="input" type="text" name="last_name" id="lastname" value="<?=$last_name; ?>" placeholder="Last name">
        </div>
        <label class="label">Email</label>
        <div class="control">
            <input class="input" type="text" name="email" id="email" value="<?=$email; ?>" placeholder="Email">
        </div>
        <label class="label">Phone</label>
        <div class="control">
            <input class="input" type="text" name="phone" id="phone" value="<?=$phone; ?>" placeholder="Phone">
        </div>
        <br>
        <div class="control">
            <input class="button is-link" type ="submit" value="Update"></input>
            <a class="button is-danger" href="hikers.php">Back</a>
        </div>       
    </form>
</div>
</section>