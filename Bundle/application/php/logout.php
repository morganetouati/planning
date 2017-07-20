<?php
session_start ();
unset ($_SESSION['id_horaire']); //effacer explicitement la variable id_horaire
session_unset(); // effacer la session
session_destroy ();
header ('location: index.php');