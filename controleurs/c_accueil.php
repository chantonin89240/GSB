<?php
include("vues/v_sommaire.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch ($action) {
	case 'demandeConnexion': {
			include("vues/v_sommaire.php");
			break;
		}
	case 'accueil': {
			include("vues/v_accueil.php");
			break;
		}
}
