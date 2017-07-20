<?php

//$connect = new Planning_Bdd_Connect();
//$bdd = $connect->getPdo();
$instance = Planning_Bdd_Connect::getInstance();
$connect = $instance->getPdo();
$membre = $connect->query("SELECT * FROM users");
?>

<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $urlresource; ?>css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo $urlresource; ?>css/style.css" type="text/css">
        <script src="<?php echo $urlresource; ?>js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo $urlresource; ?>js/bootstrap.min.js"></script>
        <title>Panel Admin</title>
    </head>
    <body>
        <header>
            <h1>Panel admin</h1>
            <nav>
                <ul>
                    <li><a href="admin_ajout_user.php">Ajouter un utilisateur</a></li>
                    <li><a href="admin_ajout_statut.php">Ajouter un statut</a></li>
                    <li><a href="deconnexion.php">Se déconnecter</a></li>
                </ul>
            </nav>
        </header>
        <div class="container" style="margin-top: 20px">
            <?php while ($m = $membre->fetch()) { ?>

                <div class="row">
                    <div class="col-xs-3"><?= $m['id_users'] ?> : <?= $m['prenom'] ?></div>
                    <a class="col-xs-1" href="admin_voir_user.php?user=<?= $m['id_users'] ?>" title="Voir le profil"><i class="glyphicon glyphicon-user fa-2x"></i></a>
                    <a class="col-xs-1" href="admin_modifier_user.php?user=<?= $m['id_users'] ?>" title="Modifier"><span class="glyphicon glyphicon-edit fa-2x"></span></a>
                    <a class="col-xs-1" href="admin_supprimer_user.php?user=<?= $m['id_users'] ?>" title="Supprimer"><span class="glyphicon glyphicon-trash fa-2x"></span></a>
                </div>
            <?php } ?>
        </div>
    </body>
</html>