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
    <h2>Créer un trajet</h2>

    <form method="POST" action="/touche_pas_au_klaxon/public/create-trajet-post">

        <!-- Départ -->
        <div class="mb-3">
            <label>Agence de départ</label>
            <select name="depart" class="form-control" required>
                <?php foreach ($agences as $agence): ?>
                    <option value="<?= $agence['id'] ?>">
                        <?= htmlspecialchars($agence['nom_ville']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Arrivée -->
        <div class="mb-3">
            <label>Agence d’arrivée</label>
            <select name="arrivee" class="form-control" required>
                <?php foreach ($agences as $agence): ?>
                    <option value="<?= $agence['id'] ?>">
                        <?= htmlspecialchars($agence['nom_ville']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Dates -->
        <div class="mb-3">
            <label>Date départ</label>
            <input type="datetime-local" name="date_depart" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date arrivée</label>
            <input type="datetime-local" name="date_arrivee" class="form-control" required>
        </div>

        <!-- Places -->
        <div class="mb-3">
            <label>Nombre de places disponibles</label>
            <input type="number" name="places" class="form-control" required>
        </div>

        <button class="btn btn-primary">Créer</button>
    </form>
</div>
    <?php require __DIR__ . '/partials/footer.php'; ?>
</body>
</html>



