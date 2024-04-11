<?php $pdo = new PDO("mysql:host=localhost;dbname=CRUD", "root", ""); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Display Matthew Sisakoun</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <button class="btn btn-primary my-5"><a href="inscription.php" class="text-light">Ajouter un
        utilisateur</a></button>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Prenom</th>
          <th scope="col">Nom</th>
          <th scope="col">DateNaissance</th>
          <th scope="col">Classe</th>
          <th scope="col">Groupe</th>
          <th scope="col">Sexe</th>
          <th scope="col">Email</th>
          <th scope="col">Telephone</th>
          <th scope="col">Passwd</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($pdo)) {
          $sql = "SELECT * FROM `eleve`";
          $statement = $pdo->query($sql);
          $count = 0;
          while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $count++;
            echo "<tr>";
            echo "<th scope='row'>" . $row['Id'] . "</th>";
            echo "<td>" . $row['Prenom'] . "</td>";
            echo "<td>" . $row['Nom'] . "</td>";
            echo "<td>" . $row['DateNaissance'] . "</td>";
            echo "<td>" . $row['Classe'] . "</td>";
            echo "<td>" . $row['Groupe'] . "</td>";
            echo "<td>" . $row['Sexe'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "<td>" . $row['Telephone'] . "</td>";
            echo "<td>" . $row['Passwd'] . "</td>";
            echo "<td><button class='btn btn-primary'><a href='update.php?updateid=" . $row['Id'] . "' class='text-light'>Modifier</a></button><button class='btn btn-danger'><a href='delete.php?deleteid=" . $row['Id'] . "' class='text-light'>Supprimer</a></button></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='11'>Erreur de connexion à la base de données.</td></tr>";
        }
        ?>

      </tbody>
    </table>
  </div>

</body>

</html>