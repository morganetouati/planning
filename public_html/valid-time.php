<?php
$front = require '../php/front.php';
//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$horaire = new Planning_Models_Horaire($connect);
$id_users = $_SESSION['id_users'];
$start_search = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['datedebut'])));
$fin_search = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['datefin'])));
$reqs = $horaire->select_horaire($id_users, $start_search, $fin_search);
header('Location: horaires.php');