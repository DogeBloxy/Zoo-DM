<?php 
use App\models\Enclosure;

// Création de l'instance de la classe Enclosure 
$enclosure = new Enclosure();

// Création d'un tableau regroupant les erreurs
$error = [];

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['add-enclosure'])) {
    // vérification du champ name
    if (!empty($_POST['enclosureName'])) {
        try {
            $enclosure->setName($_POST['enclosureName']);
        } catch (Exception $e) {
            $error['enclosureName'] = $e->getMessage();
        }
    } else {
        $error['enclosureName'] = 'Nom obligatoire';
    }

    // vérification du champ description
    if (!empty($_POST['enclosureDescription'])) {
        try {
            $enclosure->setDescription($_POST['enclosureDescription']);
        } catch (Exception $e) {
            $error['enclosureDescription'] = $e->getMessage();
        }
    } else {
        $error['enclosureDescription'] = 'Description obligatoire';
    }

    // vérification de l'absence d'erreur
    if (empty($error)) {
        // Création de la tâche
        if ($enclosure->addEnclosure()) {
            // Redirection vers la page index.php
            header('Location: /');
        } else {
            $error['global'] = 'Echec de la creation';
        }
    }
}

render('index', [
    'enclosure' => $enclosure->showEnclosure(),
    'errors' => $error
]);



?>