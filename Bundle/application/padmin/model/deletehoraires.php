<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$id_horaire = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['id_horaire'])));
$delhoraire = $connect->prepare("DELETE FROM horaires WHERE id_horaire = :id_horaire");
$delhoraire->execute(array(
	':id_horaire' => $id_horaire
	));
header("Location: ../index.php");
?>