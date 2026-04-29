<?php require __DIR__ . '/../partials/header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <h2>Modifier agence</h2>

    <form method="POST" action="/touche_pas_au_klaxon/public/admin/agence-update">
        <input type="hidden" name="id" value="<?= $agence['id'] ?>">
        <input type="text" name="nom" class="form-control mb-3" value="<?= htmlspecialchars($agence['nom_ville']) ?>">
        <button class="btn btn-primary">Modifier</button>
    </form>
</div>