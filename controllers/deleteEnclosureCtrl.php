<?php 
// route "/deleteEnclosure"

require 'models/Enclosure.php';

$enclosure = new Enclosure();

// vérification de l'ID de la tâche
try {
	$enclosure->setId($_POST['id']);
} catch (\Throwable $th) {
	redirectTo('/');
}


$enclosure->deleteEnclosure();
redirectTo('/')

?>