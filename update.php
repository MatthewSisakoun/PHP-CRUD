<?php
// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=CRUD", "root", "");

// Vérification de la présence de l'identifiant de l'utilisateur à mettre à jour dans l'URL
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    // Vérification de la soumission du formulaire de mise à jour
    if (!empty($_POST)) {
        // Récupération des nouvelles valeurs du formulaire
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $ddn = $_POST['datenaissance'];
        $classe = $_POST['classe'];
        $groupe = $_POST['groupe'];
        $sexe = $_POST['sexe'];
        $telephone = $_POST['telephone'];
        $passwd = $_POST['passwd'];

        // Requête de mise à jour de l'utilisateur dans la base de données
        $requete = "UPDATE eleve SET 
            Prenom = :prenom,
            Nom = :nom,
            DateNaissance = :datenaissance,
            Classe = :classe,
            Groupe = :groupe,
            Sexe = :sexe,
            Email = :email,
            Telephone = :telephone,
            Passwd = :passwd
            WHERE id = :id";

        // Préparation de la requête
        $statement = $pdo->prepare($requete);

        // Liaison des paramètres avec les valeurs
        $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
        $statement->bindParam(':datenaissance', $ddn, PDO::PARAM_STR);
        $statement->bindParam(':classe', $classe, PDO::PARAM_STR);
        $statement->bindParam(':groupe', $groupe, PDO::PARAM_STR);
        $statement->bindParam(':sexe', $sexe, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':telephone', $telephone, PDO::PARAM_STR);
        $statement->bindParam(':passwd', $passwd, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        $statement->execute();

        // Redirection vers la page de display après la mise à jour
        header('Location: display.php');
        exit(); // Arrête l'exécution du script après la redirection
    } else {
        // Sélection des informations de l'utilisateur à mettre à jour
        $requete_info = "SELECT * FROM eleve WHERE id = :id";
        $statement_info = $pdo->prepare($requete_info);
        $statement_info->bindParam(':id', $id, PDO::PARAM_INT);
        $statement_info->execute();
        $userinfo = $statement_info->fetch(PDO::FETCH_ASSOC);
    }
} else {
    // Redirection si l'identifiant de l'utilisateur n'est pas présent dans l'URL
    header('Location: display.php');
    exit(); // Arrête l'exécution du script après la redirection
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateur</title>

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
</head>

<body>

    <h2>Modifier utilisateur</h2>

    <div>
        <form action="" method="POST">
            <label for="prenom">Votre prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="prenom" value="<?php echo $userinfo['Prenom']; ?>"
                required>

            <label for="nom">Votre nom :</label>
            <input type="text" id="nom" name="nom" placeholder="nom" value="<?php echo $userinfo['Nom']; ?>" required>

            <label for="datenaissance">Votre date de naissance :</label>
            <input type="date" id=datenaissance name="datenaissance" value="<?php echo $userinfo['DateNaissance']; ?>">

            <label for="classe">Votre classe :</label>
            <select type="text" id="classe" name="classe">
                <option value="BTSA" <?php if ($userinfo['Classe'] == 'BTSA')
                    echo 'selected'; ?>>BTS A</option>
                <option value="BTSB" <?php if ($userinfo['Classe'] == 'BTSB')
                    echo 'selected'; ?>>BTS B</option>
            </select>

            <label for="groupe">Votre groupe :</label>
            <select type="text" id="groupe" name="groupe">
                <option value="1" <?php if ($userinfo['Groupe'] == '1')
                    echo 'selected'; ?>>1</option>
                <option value="2" <?php if ($userinfo['Groupe'] == '2')
                    echo 'selected'; ?>>2</option>
            </select>

            <label for="sexe">Votre sexe :</label>
            <select type="text" id="sexe" name="sexe">
                <option value="1" <?php if ($userinfo['Sexe'] == '1')
                    echo 'selected'; ?>>Homme</option>
                <option value="2" <?php if ($userinfo['Sexe'] == '2')
                    echo 'selected'; ?>>Femme</option>
                <option value="3" <?php if ($userinfo['Sexe'] == '3')
                    echo 'selected'; ?>>Autre</option>
            </select>

            <label for="email">Votre email :</label>
            <input type="email" id="email" name="email" placeholder="email" value="<?php echo $userinfo['Email']; ?>"
                required>

            <label for="telephone">Votre numero de telephone :</label>
            <input type="tel" id="telephone" name="telephone" placeholder="n* de tel"
                value="<?php echo $userinfo['Telephone']; ?>">

            <label for="passwd">Votre mot de passe :</label>
            <input type="password" id="passwd" name="passwd" placeholder="password"
                value="<?php echo $userinfo['Passwd']; ?>" required>

            <button type="submit">ENREGISTRER LES MODIFICATIONS</button>
        </form>
    </div>

</body>

</html>