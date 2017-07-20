<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$horaires = $connect->prepare("SELECT * FROM horaires WHERE id_users = :id");
$horaires->execute(array(
	':id' => $_GET['user']
	));
$horaire_array = $horaires->fetchAll();