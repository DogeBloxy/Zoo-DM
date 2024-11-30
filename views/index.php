<!-- Contenu de la page d'accueil -->
<?php ob_start() ?>
<div class="container mt-5">
    <!-- En-tête -->
    <h2 class="text-center mb-4">Ajouter un enclos</h2>

    <!-- Formulaire de modification d'enclos -->
    <form id="enclosureForm" class="shadow p-4 mb-4 bg-white rounded" action="" method="POST">
        <div class="form-group">
            <label for="enclosureName">Nom de l'enclos :</label>
            <input type="text" class="form-control" id="enclosureName" name="enclosureName" placeholder="Entrez le nom de l'enclos">
            <?php if (!empty($data['errors']['enclosureName'])) { ?>
                <small><?= $data['errors']['enclosureName'] ?></small>
            <?php } ?>
        </div> <br>

        <div class="form-group">
            <label for="enclosureDescription">Description :</label>
            <textarea name="enclosureDescription" class="form-control" id="enclosureDescription" rows="3" placeholder="Entrez une description pour l'enclos"></textarea>
            <?php if (!empty($data['errors']['enclosureDescription'])) { ?>
                <small><?= $data['errors']['enclosureDescription'] ?></small>
            <?php } ?>
        </div> <br>

        <button type="submit" class="btn btn-primary btn-block" name="add-enclosure">Ajouter un enclos</button>
    </form>

</div>

<div>
    <h2 class="text-center mb-4"> Mes enclos</h2>

     <!-- Contenu du fichier enclosure.php -->
     <?php foreach ($data['enclosure'] as $enclosure) {
        render('enclosures/enclosure', ['enclosure' => $enclosure], true);
    } ?>
</div>


<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)


?>