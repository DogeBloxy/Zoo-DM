<?php 
use App\models\Enclosure;

// Création de l'instance de la classe Enclosure
$enclosure = new Enclosure();


// Création d'un tableau regroupant les erreurs
$error = [];

 // Si l'id dans l'adresse est vide on redirige vers la page d'acceuil sinon on récupère l'id de la tâche
 if (empty($_GET['id'])) redirectTo('/');
 try {
     $enclosure->setId($_GET['id']);
 } catch (\Throwable $th) {
     redirectTo('/');
 } 

 if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['update-enclosure'])) {
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
        if ($enclosure->updateEnclosure()) {
            // Redirection vers la page index.php
            header('Location: /');
        } else {
            $error['global'] = 'Echec de la creation';
        }
    }
}

 render('updateEnclosure', [
    'enclosure' => $enclosure->showEnclosureID(),
    'errors' => $error
]);

?>