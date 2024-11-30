<!-- Contenu d'une carte d'un animal -->
<div class="shadow card mb-4">
    <h5 class="card-header"><?= $data['animal']['name'] ?><span class="badge text-bg-secondary"><?= $data['animal']['espece'] ?></span>
    </h5>
    <div class="card-body">
        <p class="card-text">Ajouté le : <?= $data['animal']['created_at'] ?></p>
        <p class="card-text"><?= $data['animal']['description'] ?></p>
        <a href="/updateAnimals?id=<?= $data['animal']['id'] ?>"><button type="button" class="btn btn-primary"><i class="fa-solid fa-pen"></i></button></a>
    </div>
</div>