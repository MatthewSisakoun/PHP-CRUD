<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Matthew Sisakoun</title>
</head>

<style>
    input[type=text],
    input[type=email],
    input[type=date],
    input[type=tel],
    input[type=password],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
</style>

<body>

    <h2>INSCRIPTION</h2>

    <div>
        <form action="" method="POST">
            <label for="prenom">Votre prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="prenom" required>

            <label for="nom">Votre nom :</label>
            <input type="text" id="nom" name="nom" placeholder="nom" required>

            <label for="datenaissance">Votre date de naissance :</label>
            <input type="date" id=datenaissance name="datenaissance">

            <label for="classe">Votre classe :</label>
            <select type="text" id="classe" name="classe">
                <option value="" disabled selected>Selectionner votre classe</option>
                <option value="BTSA">BTS A</option>
                <option value="BTSB">BTS B</option>
            </select>

            <label for="groupe">Votre groupe :</label>
            <select type="text" id="groupe" name="groupe">
                <option value="" disabled selected>Selectionner votre groupe</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>

            <label for="sexe">Votre sexe :</label>
            <select type="text" id="sexe" name="sexe">
                <option value="" disabled selected>Selectionner votre sexe</option>
                <option value="1">Homme</option>
                <option value="2">Femme</option>
                <option value="3">Autre</option>
            </select>

            <label for="email">Votre email :</label>
            <input type="email" id="email" name="email" placeholder="email" required>

            <label for="telephone">Votre numero de telephone :</label>
            <input type="tel" id="telephone" name="telephone" placeholder="n* de tel">

            <label for="passwd">Votre mot de passe :</label>
            <input type="password" id="passwd" name="passwd" placeholder="password" required>

            <button type="submit" href>INSCRIRE LES INFORMATIONS</button>

        </form>
    </div>

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
        $passwd = $_POST['passwd'];

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
        $statement->bindParam(':passwd', $passwd, PDO::PARAM_STR);
        $statement->execute();


        header('Location: display.php');
        exit();
    }

    ?>

</body>

</html>