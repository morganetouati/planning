<?php
//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$libelle = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['libelle'])));
$selstatut = $connect->prepare('SELECT id,libelle FROM `role`');
$selstatut->execute(array(
	"id" => $id,
	"libelle"=>$libelle
	)
);
$sel = $selstatut->fetchAll();