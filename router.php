<?php
// FICHIER ROUTER
// Ce fichier permet de gérer les différentes routes de l'application.

// Il permet également d'importer des fichiers ou de faires des actions avant d'appeler la route approprié.

// Require utils.php permet que les fonctions présentes dans ce fichier soit accessible partout dans le projet, peut importe la route contacter

require 'utils/utils.php';


switch ($_SERVER['REDIRECT_URL']) {
	case '/':
		require 'controllers/indexCtrl.php';
		break;
	case '/deleteEnclosure':
		require 'controllers/deleteEnclosureCtrl.php';
		break;
	case '/updateEnclosure':
		require 'controllers/updateEnclosureCtrl.php';
		break;
	default:
		require 'views/404.php';
		break;
}