<!-- Contenu d'une carte d'un enclos -->
<div class="shadow card mb-4">
    <h5 class="card-header"><?= $data['enclosure']['name'] ?>
    </h5>
    <div class="card-body">
        <p class="card-text">Crée le : <?= $data['enclosure']['created_at'] ?></p>
        <p class="card-text"><?= $data['enclosure']['description'] ?></p>
        <a href="/updateEnclosure?id=<?= $data['enclosure']['id'] ?>"><button type="button" class="btn btn-primary"><i class="fa-solid fa-pen"></i></button></a>
    </div>
</div>