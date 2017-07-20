<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

$nom = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['nom'])));
$prenom = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['prenom'])));
$email = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['email'])));
$password = htmlentities(htmlspecialchars(mysql_real_escape_string(sha1($_POST['password']))));
$start_contrat = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['start_contrat'])));
$end_contrat = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['end_contrat'])));
$heure_semaine = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['heure_semaine'])));
$salaire_brut = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['salaire_brut'])));
$salaire_net = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['salaire_net'])));
$societe = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['societe'])));
$role_id = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['role'])));

if (isset($_POST['submit'])) {
    if (!empty($nom) && !empty($prenom) && $email && !empty($password) && !empty($start_contrat) && !empty($end_contrat) && !empty($heure_semaine) && !empty($salaire_brut) && !empty($salaire_net) && !empty($societe) && !empty($role_id) &&
            is_numeric($heure_semaine) && is_numeric($salaire_brut) && is_numeric($salaire_net)) {
        $req = $connect->prepare('INSERT INTO users(nom, prenom, email, password, start_contrat,
			end_contrat, heure_semaine, salaire_brut, salaire_net, societe, role_id)
		VALUES (:nom, :prenom, :email, :password, :start_contrat, :end_contrat, :heure_semaine,
			:salaire_brut, :salaire_net, :societe, :role_id)');
        $req->execute(array(
            "nom" => $nom,
            "prenom" => $prenom,
            "email" => $email,
            "password" => $password,
            "start_contrat" => $start_contrat,
            "end_contrat" => $end_contrat,
            "heure_semaine" => $heure_semaine,
            "salaire_brut" => $salaire_brut,
            "salaire_net" => $salaire_net,
            "societe" => $societe,
            "role_id" => $role_id
        ));
        echo "Votre inscription a bien été prise en compte";
        header("Location: ../index.php");
    } else {
        echo "Veuillez remplir tous les champs ou corriger vos erreurs";
    }
}