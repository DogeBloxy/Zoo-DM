<?php ob_start() ?>
<div class="container mt-5">
    <!-- En-tête -->
    <h2 class="text-center mb-4">Modification enclos</h2>

    <!-- Formulaire de modification d'enclos -->
    <form id="enclosureForm" class="shadow p-4 mb-4 bg-white rounded" action="" method="POST">
        <div class="form-group">
            <label for="enclosureName">Nom de l'enclos :</label>
            <input type="text" class="form-control" id="enclosureName" name="enclosureName" value="<?= $data['enclosure']['name'] ?>" placeholder="Entrez le nom de l'enclos">
        </div> <br>

        <div class="form-group">
            <label for="enclosureDescription">Description :</label>
            <textarea name="enclosureDescription" class="form-control" id="enclosureDescription" rows="3" placeholder="Entrez une description pour l'enclos"><?= $data['enclosure']['description'] ?></textarea>
        </div> <br>

        <button type="submit" class="btn btn-primary btn-block" name="update-enclosure">Modifier l'enclos</button>
    </form>
    <form class="delete-enclos" id="form-<?= $data['enclosure']['id'] ?>" action="/deleteEnclosure" method="post">
        <input type="hidden" name="id" value="<?= $data['enclosure']['id'] ?>">
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
    </form>

</div>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)
?>