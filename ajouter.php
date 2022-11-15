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
  //vérifier que le bouton Ajouter a bien été cliqué
  if (isset($_POST['button'])) {
    //extraction des informations envoyées dans des variables par la methode POST
    extract($_POST);
    //verifier que tout les champs ont été remplis
    if (isset($nom) && isset($prenom) && $age) {
      //connexion à la base de donnée
      include_once "connexion.php";
      //requête d'ajout
      $req = mysqli_query($con, "INSERT INTO Employe VALUES(NULL, '$nom', '$prenom','$age')");
      if ($req) { //si la requête a été effectuée avec succès , on fait une redirection
        header("location: index.php");
      } else {
        $message = "Employé non ajouté";
      }
    } else {

      $message = "Veuillez remplir tout les champs !";
    }
  }

  ?>
  <div class="form">
    <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
    <h2>Ajouter un employé</h2>
    <p class="erreur_message">
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>

    </p>
    <form action="" method="POST">
      <label>Nom</label>
      <input type="text" name="nom">
      <label>Prénom</label>
      <input type="text" name="prenom">
      <label>Âge</label>
      <input type="number" name="age">
      <input type="submit" value="Ajouter" name="button">
    </form>
  </div>
  <script src="" async defer></script>
</body>

</html>