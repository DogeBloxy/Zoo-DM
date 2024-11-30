<!-- Contenu de la page d'accueil -->
<?php ob_start() ?>
<div class="container mt-5">
    <!-- En-tête -->
    <h2 class="text-center mb-4">Ajouter un enclos</h2>

    <!-- Formulaire de modification d'enclos -->
    <form id="taskForm" class="shadow p-4 mb-4 bg-white rounded" action="" method="POST">
        <div class="form-group">
            <label for="taskName">Nom de l'enclos :</label>
            <input type="text" class="form-control" id="taskName" name="taskName" value="" placeholder="Entrez le nom de l'enclos">
        </div> <br>

        <div class="form-group">
            <label for="taskDescription">Description :</label>
            <textarea name="taskDescription" class="form-control" id="taskDescription" rows="3" placeholder="Entrez une description pour l'enclos"></textarea>
        </div> <br>

        <button type="submit" class="btn btn-primary btn-block" name="update-task">Ajouter un enclos</button>
    </form>

</div>


<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)


?>