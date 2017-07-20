<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->render('login/index');
    }
}



//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();

/*use Models;
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();

if (isset($_POST['submitconnexion'])) {
    $mailco = htmlentities(htmlspecialchars(mysql_real_escape_string($_POST['email'])));
    $passco = htmlentities(htmlspecialchars(mysql_real_escape_string(sha1($_POST['password']))));
    if (!empty($mailco) && !empty($passco))
        $req = $connect->prepare("SELECT users.*, role.libelle as role FROM users INNER JOIN role ON role.id = users.role_id WHERE email = ? AND password = ?");
    $req->execute(array($mailco, $passco));
    $userexist = $req->rowCount();
    if ($userexist == 1) {
        $userinfo = $req->fetch();
        $_SESSION['id_users'] = $userinfo['id_users'];
        $_SESSION['role'] = $userinfo['role'];
        $_SESSION['email'] = $userinfo['email'];
        $_SESSION['password'] = $userinfo['password'];
        if ($userinfo['role'] != 'admin') {
            header("Location: profil.php");
        } elseif ($userinfo['role'] == 'admin') {
            header("Location: admin.php"); // @todo modifier redirection
        }
    } else {
        echo "Mauvais email ou mauvais mot de passe. Merci de recommencer !";
        echo "<a href='index.php'>Retour a la page de connexion.</a>";
    }
} else {
    echo "Remplissez tous les champs pour vous connectez !";
}
*/