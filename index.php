<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>formulaire</h1>

 <form action="" method="POST">
    <input type="text" name="prenom" placeholder="prenom">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="email" placeholder="email">
    <input type="date" name="ddn">
    <input type="password" name="passwd" placeholder="password">
    <button type="submit" href>ENVOIE LE MOI</button>

</form>

<?php
if(!empty($_POST)){
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $ddn = $_POST['ddn'];
    $passwd = $_POST['passwd'];

    $dbPassword="";
    $pdo = new PDO("mysql:host=localhost;dbname=formulaire" , "root" ,$dbPassword);

    $requetes = "INSERT INTO information (
        prenom,
        nom,
        email,
        ddn,
        passwd
    ) VALUES (
        :prenom,
        :nom,
        :email,
        :ddn,
        :passwd
    )";

    $statement = $pdo->prepare("$requetes");
    $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':ddn', $ddn, PDO::PARAM_STR);
    $statement->bindParam(':passwd', $passwd, PDO::PARAM_STR);
    $statement->execute();


    header('Location: confirmation.php');
}

?>

</body>
</html>