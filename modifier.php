<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Ajouter</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php

  //connexion à la base de donnée
  include_once "connexion.php";
  //on récupère l'id dans le lien
  $id = $_GET['id'];
  //requête pour afficher les infos d'un employé
  $req = mysqli_query($con, "SELECT * FROM Employe WHERE id = $id");
  $row = mysqli_fetch_assoc($req);


  if (isset($_POST['button'])) {
    //extraction des informations envoyées dans des variables par la methode POST
    extract($_POST);
    //verifier que tout les champs ont été remplis
    if (isset($nom) && isset($prenom) && $age) {
      //requête de modification
      $req = mysqli_query($con, "UPDATE employe SET nom = '$nom' , prenom = '$prenom' , age = '$age' WHERE id = $id");
      if ($req) { //si la requête a été effectuée avec succès , on fait une redirection
        header("location: index.php");
      } else {
        $message = "Employé non modifié";
      }
    } else {

      $message = "Veuillez remplir tout les champs !";
    }
  }

  ?>

  <div class="form">
    <a href="index.php" class="back_btn"><img src="images/back.png" />Retour</a>
    <h2>Modifier l'employé: <?= $row['nom'] ?> </h2>
    <p class="erreur_message">
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
    </p>
    <form action="" method="POST">
      <label>Nom</label>
      <input type="text" name="nom" value="<?= $row['nom'] ?>">
      <label>Prénom</label>
      <input type="text" name="prenom" value="<?= $row['prenom'] ?>">
      <label>Âge</label>
      <input type="number" name="age" value="<?= $row['age'] ?>">
      <input type="submit" value="Modifier" name="button">
    </form>
  </div>
  <script src="" async defer></script>
</body>

</html>