<?php ob_start() ?>

<div class="container mt-5">
    <!-- En-tête -->
    <h2 class="text-center mb-4">Modification d'un animal à l'enclos</h2>

    <!-- Formulaire d'ajout d'animal' -->
    <form id="animalForm" class="shadow p-4 mb-4 bg-white rounded" action="" method="POST">
            <div class="form-group">
        <label for="animalName">Nom de l'animal :</label>
        <input type="text" class="form-control" id="animalName" value="<?= $data['animal']['name'] ?>" name="animalName" placeholder="Entrez le nom de l'animal">
        <?php if (!empty($data['errors']['animalName'])) { ?>
            <small><?= $data['errors']['animalName'] ?></small>
        <?php } ?>
</div> <br>

<div class="form-group">
    <label for="animalSpecies">L'espèce de l'animal :</label>
    <input type="text" class="form-control" id="animalSpecies" value="<?= $data['animal']['espece'] ?>" name="animalSpecies" placeholder="Précisez l'espèce de l'animal">
    <?php if (!empty($data['errors']['animalSpecies'])) { ?>
        <small><?= $data['errors']['animalSpecies'] ?></small>
    <?php } ?>
</div> <br>

<div class="form-group">
    <label for="animalDescription">Description :</label>
    <textarea name="animalDescription" class="form-control" id="animalDescription" rows="3" placeholder="Entrez une description pour l'animal"><?= $data['animal']['description'] ?></textarea>
    <?php if (!empty($data['errors']['animalDescription'])) { ?>
        <small><?= $data['errors']['animalDescription'] ?></small>
    <?php } ?>
</div> <br>

<button type="submit" class="btn btn-primary btn-block" name="update-animal">Modifier l'animal à l'enclos</button>
</form>

<form class="delete-animal" id="form-<?= $data['animal']['id'] ?>" action="/deleteAnimals" method="post">
        <input type="hidden" name="id" value="<?= $data['animal']['id'] ?>">
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
    </form>

</div>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)
?>