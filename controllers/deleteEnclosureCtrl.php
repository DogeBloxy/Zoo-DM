<?php 
// route "/deleteEnclosure"

use App\models\Enclosure;

$enclosure = new Enclosure();

// vérification de l'ID de l'enclos
try {
	$enclosure->setId($_POST['id']);
} catch (\Throwable $th) {
	redirectTo('/');
}


$enclosure->deleteEnclosure();
redirectTo('/')

?>