<?php
$front = require '../php/front.php';

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();


$mailco = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['email'])));
$newpassword = htmlentities(htmlspecialchars(mysql_real_escape_string(sha1($_POST['newpassword']))));
$confirmpass = htmlentities(htmlspecialchars(mysql_real_escape_string(sha1($_POST['confirmpass']))));

if(htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['submit']))))
{
	if ($newpassword == $confirmpass)
	{
		$req = $connect->prepare('UPDATE users SET password = :newpassword WHERE email = :mailco');
		$req->execute(array(':newpassword' => $newpassword, ':mailco' => $mailco));

	echo "Votre nouveau mot de passe a bien été enregistré, veuillez - vous connecter.<br>";
		echo"<a href='../html/index.php'>Connexion</a>";
	}
	if ($newpassword !== $confirmpass)
	{
		echo "Les deux mots de passe sont differents !";
		echo"<a href='../html/forgot_pass.php'>Retour au formulaire de mot de passe oublié</a>";
	}
}