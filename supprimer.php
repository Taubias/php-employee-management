<?php
include_once "connexion.php";
//On récupère l'id dans le lien
$id = $_GET['id'];
//Requête de suppression
$req = mysqli_query($con, "DELETE FROM employe WHERE id=$id");
//Redirection vers la page d'accueil
header("Location:index.php");
