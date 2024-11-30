<?php

use App\models\Animal;

// Création de l'instance de la classe Animal 
$animal = new Animal();

// Création d'un tableau regroupant les erreurs
$error = [];

// Vérifier si enclosId est défini dans l'URL
if (isset($_GET['enclosId'])) {
    $enclos_id = $_GET['enclosId'];
    $animal->setEnclosId($enclos_id);
} else {
    $error['global'] = 'L\'identifiant de l\'enclos est manquant.';
}

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add-animal'])) {
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
        // Création de la tâche
        if ($animal->addAnimal()) {
            // Redirection vers la page animalIndex.php
            header('Location: /animals?enclosId='.$enclos_id);
        } else {
            $error['global'] = 'Echec de la creation';
        }
    }
}


render('animalIndex', [
    'animal' => $animal->showAnimalEnclosureID(),
    'errors' => $error,
    'enclos_id' => $enclos_id
]);

