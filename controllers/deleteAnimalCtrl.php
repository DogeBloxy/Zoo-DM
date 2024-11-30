<?php 
use App\models\Animal;

$animal = new Animal;

// vérification de l'ID de l'animal'
try {
	$animal->setId($_POST['id']);
} catch (\Throwable $th) {
	redirectTo('/');
}

$animal->deleteAnimal();
redirectTo('/')

?>