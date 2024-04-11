<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Matthew Sisakoun</title>
</head>
<body>
    
<h1>formulaire</h1>

 <form action="" method="POST">
    <input type="text" name="prenom" autocomplete="off"  placeholder="prenom">
    <input type="text" name="nom" autocomplete="off" placeholder="nom">
    <input type="date" name="datenaissance">
    <input type="text" name="classe" placeholder="classe">
    <input type="text" name="groupe" placeholder="groupe">
    <input type="text" name="sexe" placeholder="sexe">
    <input type="text" name="email" autocomplete="off" placeholder="email">
    <input type="text" name="telephone" autocomplete="off"  placeholder="n* de tel">
    <input type="text" name="adresse" autocomplete="off" placeholder="adresse">
    <input type="int" name="codepostal" autocomplete="off" placeholder="code postal">
    <input type="text" name="ville" autocomplete="off" placeholder="ville">
    <input type="password" name="passwd" placeholder="password">
    <button type="submit" href>ENVOIE LE MOI</button>

</form>

<?php
if (!empty($_POST)) {
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $ddn = $_POST['datenaissance'];
    $classe = $_POST['classe'];
    $groupe = $_POST['groupe'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $codepostal = $_POST['codepostal'];
    $ville = $_POST['ville'];
    $passwd = $_POST['passwd'];

    $dbPassword="";
    $pdo = new PDO("mysql:host=localhost;dbname=CRUD", "root", "");

    $requetes = "INSERT INTO eleve (
        Prenom,
        Nom,
        DateNaissance,
        Classe,
        Groupe,
        Sexe,
        Email,
        Telephone,
        Adresse,
        CodePostal,
        Ville,
        Passwd
    ) VALUES (
        :prenom,
        :nom,
        :datenaissance,
        :classe,
        :groupe,
        :sexe,
        :email,
        :telephone,
        :adresse,
        :codepostal,
        :ville,
        :passwd
    )";

    $statement = $pdo->prepare("$requetes");
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':datenaissance', $ddn, PDO::PARAM_STR);
    $statement->bindParam(':classe', $classe, PDO::PARAM_STR);
    $statement->bindParam(':groupe', $groupe, PDO::PARAM_STR);
    $statement->bindParam(':sexe', $sexe, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $statement->bindParam(':codepostal', $codepostal, PDO::PARAM_STR);
    $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
    $statement->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    $statement->execute();


    header('Location: confirmation.php');
    exit();
}

?>

</body>
</html>