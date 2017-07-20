<?php
$front = require '../php/front.php';
//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$id = htmlentities(htmlspecialchars(mysql_real_escape_string($_GET['id'])));

$delstatut = $connect->prepare("DELETE FROM role WHERE id=:id");
$delstatut->bindParam(":id",$id,PDO::PARAM_INT);
$delstatut->execute();
header("Location: ../view/statut.php");
?>