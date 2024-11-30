<!-- Structure HTML pour toutes les pages du site -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <script src="https://kit.fontawesome.com/e0b2a924d6.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script defer src="../assets/js/script.js"></script>
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-secondary">
            <div class="container-fluid">
                <a href="/" class="navbar-brand">Mon Zoo</i></a>

            </div>
        </nav>
    </header>

    <main>
        <?= $data['content'] ?>
    </main>
</body>

</html>