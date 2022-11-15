<?php
//Connexion à la base de donnée
$con = mysqli_connect("localhost", "root", "", "entreprise");
$con->set_charset("utf8");
if (!$con) {
    echo "Vous n'êtes pas connecté à la base de donnée";
}
