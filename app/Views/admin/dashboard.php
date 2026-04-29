<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <?php require __DIR__ . '/../partials/header.php'; ?>

<div class="container mt-5">

    <h2>Dashboard Admin</h2>

    <!-- USERS -->
    <h3>Utilisateurs</h3>
    <table class="table">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Rôle</th>
        </tr>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u['prenom'] ?> <?= $u['nom'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['role'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- AGENCES -->
    <h3>Agences</h3>
    <table class="table">
        <?php foreach ($agences as $a): ?>
            <tr>
                <td><?= $a['nom_ville'] ?></td>
                <td>
                    <a href="/touche_pas_au_klaxon/public/admin/agence-edit?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                    <form method="POST" action="/touche_pas_au_klaxon/public/admin/agence-delete" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $a['id'] ?>">
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/touche_pas_au_klaxon/public/admin/agence-create" class="btn btn-success mb-2">Ajouter une agence</a>
    

    <!-- TRAJETS -->
    <h3>Trajets</h3>
    <table class="table">
        <tr>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php foreach ($trajets as $t): ?>
            <tr>
                <td><?= $t['depart'] ?></td>
                <td><?= $t['arrivee'] ?></td>
                <td><?= $t['date_depart'] ?></td>

                <td>
                    <form method="POST" action="/touche_pas_au_klaxon/public/delete-trajet">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
    <?php require __DIR__ . '/../partials/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


