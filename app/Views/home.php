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
                Départ : <?= $trajet['date_depart'] ?><br>
                Places restantes : <?= $trajet['places_libres'] ?>
            </p>
            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?= $trajet['id'] ?>">
                Détails
            </button>
        
            <div class="modal fade" id="modal<?= $trajet['id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Détails du trajet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <p><strong>Conducteur :</strong> <?= htmlspecialchars($trajet['prenom']) ?> <?= htmlspecialchars($trajet['nom']) ?></p>

                        <p><strong>Téléphone :</strong> <?= htmlspecialchars($trajet['telephone']) ?></p>

                        <p><strong>Email :</strong> <?= htmlspecialchars($trajet['email']) ?></p>

                        <p><strong>Places totales :</strong> <?= $trajet['places_totales'] ?></p>
                    </div>

                    </div>
                </div>
            </div>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $trajet['conducteur_id']): ?>

                <form method="POST" action="/touche_pas_au_klaxon/public/delete-trajet" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $trajet['id'] ?>">
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                </form>
            <?php endif; ?>

            <?php if (isset($_SESSION['user']) && $_SESSION['user']['id'] == $trajet['conducteur_id']): ?>

                <a href="/touche_pas_au_klaxon/public/edit-trajet?id=<?= $trajet['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
            <?php endif; ?>

            

        </div>

    <?php endforeach; ?>

</div>
    <?php require __DIR__ . '/partials/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>