<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Touche pas au klaxon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require __DIR__ . '/partials/header.php'; ?>

<div class="container mt-5">

    <h1 class="mb-4">Trajets disponibles</h1>

    <?php foreach ($trajets as $trajet): ?>

        <div class="card mb-3 p-3">

            <h5>
                <?= $trajet['depart'] ?> → <?= $trajet['arrivee'] ?>
            </h5>

            <p>
                📅 Départ : <?= $trajet['date_depart'] ?><br>
                🪑 Places restantes : <?= $trajet['places_libres'] ?>
            </p>

        </div>

    <?php endforeach; ?>

</div>

</body>
</html>