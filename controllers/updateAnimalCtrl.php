<?php 
use App\models\Animal;

$animal = new Animal();


// Création d'un tableau regroupant les erreurs
$error = [];

 // Si l'id dans l'adresse est vide on redirige vers la page d'acceuil sinon on récupère l'id de la tâche
 if (empty($_GET['id'])) redirectTo('/');
 try {
     $animal->setId($_GET['id']);
 } catch (\Throwable $th) {
     redirectTo('/');
 } 

 if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['update-animal'])) {
    // vérification du champ name
    if (!empty($_POST['animalName'])) {
        try {
            $animal->setName($_POST['animalName']);
        } catch (Exception $e) {
            $error['animalName'] = $e->getMessage();
        }
    } else {
        $error['animalName'] = 'Nom obligatoire';
    }

    // vérification du champ espèce
    if (!empty($_POST['animalSpecies'])) {
        try {
            $animal->setEspece($_POST['animalSpecies']);
        } catch (Exception $e) {
            $error['animalSpecies'] = $e->getMessage();
        }
    } else {
        $error['animalSpecies'] = 'Espèce obligatoire';
    }

    // vérification du champ description
    if (!empty($_POST['animalDescription'])) {
        try {
            $animal->setDescription($_POST['animalDescription']);
        } catch (Exception $e) {
            $error['animalDescription'] = $e->getMessage();
        }
    } else {
        $error['animalDescription'] = 'Description obligatoire';
    }

    // vérification de l'absence d'erreur
    if (empty($error)) {
        // Modifcation de l'animal
        if ($animal->updateAnimal()) {
            // Redirection vers la page animalIndex.php
            header('Location: /');
        } else {
            $error['global'] = 'Echec de la modification';
        }
    }
}

 render('updateAnimal', [
    'animal' => $animal->showAnimalID(),
    'errors' => $error,
]);

?>