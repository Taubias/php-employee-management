<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Gestion des Employés</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <a href="ajouter.php" class="Btn_add">
      <img src="images/plus.png" /> Ajouter</a>

    <table>
      <tr id="items">
        <th>Nom</th>
        <th>Prénom</th>
        <th>Âge</th>
        <th>Modifier</th>
        <th>Supprimer</th>

      </tr>
      <?php
      //Inclure page de connexion
      include_once "connexion.php";
      //requête pour afficher la table "employe"
      $req = mysqli_query($con, "SELECT * FROM Employe");
      if (mysqli_num_rows($req) == 0) {
        //On affiche ce message si la base de donnée est vide (pas d'employés)
        echo "Il n'y pas encore d'employé enregistré dans la base de donnée";
      } else {
        //Si non on affiche la liste des employés
        while ($row = mysqli_fetch_assoc($req)) {
      ?>
          <tr>
            <td><?= $row['nom'] ?></td>
            <td><?= $row['prenom'] ?></td>
            <td><?= $row['age'] ?></td>
            <td><a href="modifier.php?id=<?= $row['id'] ?>"><img src="images/pen.png"></a></td>
            <td><a href="supprimer.php?id=<?= $row['id'] ?>"><img src="images/trash.png"></a></td>
          </tr>
      <?php
        }
      }
      ?>


    </table>
  </div>
  <script src="" async defer></script>
</body>

</html>