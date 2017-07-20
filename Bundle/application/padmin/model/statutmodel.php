<?php

$front = require '../php/front.php';
//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$libelle = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['libelle'])));
if (isset(htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['submit']))))) {
    $req = $bdd->prepare('INSERT INTO role(libelle) VALUES (:libelle)');
    $req->execute(array(
        "libelle" => $libelle
            )
    );
}
header("Location: ../view/statut.php");
