<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$id = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['id'])));
$nom = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['nom'])));
$prenom = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['prenom'])));
$start_contrat = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['start_contrat'])));
$end_contrat = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['end_contrat'])));
$heure_semaine = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['heure_semaine'])));
$salaire_brut = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['salaire_brut'])));
$salaire_net = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['salaire_net'])));
$societe = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['societe'])));
$role_id = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['role'])));

if (!empty($id) && !empty($nom) && !empty($prenom) && !empty($start_contrat) && !empty($end_contrat) && !empty($heure_semaine) && !empty($salaire_brut) && !empty($salaire_net) && !empty($societe) && !empty($role_id)) {
    $membre = $connect->prepare("UPDATE users SET nom = :nom, prenom = :prenom, start_contrat = :start_contrat, end_contrat = :end_contrat, heure_semaine = :heure_semaine, salaire_brut = :salaire_brut, salaire_net = :salaire_net, societe = :societe, role_id= :role_id WHERE id_users = :id");

    $membre->execute(array(
        ':id' => $id,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':start_contrat' => $start_contrat,
        ':end_contrat' => $end_contrat,
        ':heure_semaine' => $heure_semaine,
        ':salaire_brut' => $salaire_brut,
        ':salaire_net' => $salaire_net,
        ":societe" => $societe,
        ":role_id" => $role_id
            )
    );
}
header("Location: ../view/modifier.php?user=$id");
?>