<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$id = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['id'])));
$membre = $connect->prepare("DELETE FROM users WHERE id_users = :id");
$membre->execute(array(':id' => $id));
header("Location: ../index.php");
?>