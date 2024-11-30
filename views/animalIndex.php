<!-- Contenu de la page d'animaux par rapport l'enclos -->
<?php ob_start() ?>

<div class="container mt-5">
    <!-- En-tête -->
    <h2 class="text-center mb-4">Ajouter un animal à l'enclos</h2>

    <!-- Formulaire d'ajout d'animal' -->
    <form id="animalForm" class="shadow p-4 mb-4 bg-white rounded" action="" method="POST">
        <!-- Champ caché pour transmettre enclos_id --> <input type="hidden" name="enclos_id" value="<?php echo $enclos_id ?>">
            <div class="form-group">
        <label for="animalName">Nom de l'animal :</label>
        <input type="text" class="form-control" id="animalName" name="animalName" placeholder="Entrez le nom de l'animal">
        <?php if (!empty($data['errors']['animalName'])) { ?>
            <small><?= $data['errors']['animalName'] ?></small>
        <?php } ?>
</div> <br>

<div class="form-group">
    <label for="animalSpecies">L'espèce de l'animal :</label>
    <input type="text" class="form-control" id="animalSpecies" name="animalSpecies" placeholder="Précisez l'espèce de l'animal">
    <?php if (!empty($data['errors']['animalSpecies'])) { ?>
        <small><?= $data['errors']['animalSpecies'] ?></small>
    <?php } ?>
</div> <br>

<div class="form-group">
    <label for="animalDescription">Description :</label>
    <textarea name="animalDescription" class="form-control" id="animalDescription" rows="3" placeholder="Entrez une description pour l'animal"></textarea>
    <?php if (!empty($data['errors']['animalDescription'])) { ?>
        <small><?= $data['errors']['animalDescription'] ?></small>
    <?php } ?>
</div> <br>

<button type="submit" class="btn btn-primary btn-block" name="add-animal">Ajouter l'animal à l'enclos</button>
</form>

</div>

<div>
    <h2 class="text-center mb-4"> Mes animaux</h2>

     <!-- Contenu du fichier animal.php -->
     <?php foreach ($data['animal'] as $animal) {
        render('animals/animal', ['animal' => $animal], true);
    } ?>
</div>

<?php
$content = ob_get_clean();

render('default', [
    'content' => $content,
], true)


?>