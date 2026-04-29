<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = $_SESSION['user'] ?? null;


?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">

    <a class="navbar-brand" href="/touche_pas_au_klaxon/public/">
        Touche pas au klaxon
    </a>

    <div class="ms-auto d-flex align-items-center gap-3">

        <?php if (is_array($user)): ?>

            <a href="/touche_pas_au_klaxon/public/create-trajet" class="btn btn-light btn-sm">
                + Trajet
            </a>

            <span class="text-white">
                Bonjour <?= htmlspecialchars($user['prenom']) ?>
            </span>

            <a href="/touche_pas_au_klaxon/public/logout" class="btn btn-danger btn-sm">
                Déconnexion
            </a>

        <?php else: ?>

            <a href="/touche_pas_au_klaxon/public/login" class="btn btn-light btn-sm">
                Connexion
            </a>

        <?php endif; ?>

    </div>
</nav>

<?php if (isset($_SESSION['flash'])): ?>
    <div class="container mt-3">
        <div class="alert alert-success">
            <?= $_SESSION['flash'] ?>
        </div>
    </div>

    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<?php if ($user && $user['role'] === 'admin'): ?>
    <a href="/touche_pas_au_klaxon/public/admin" class="btn btn-warning btn-sm">
        Admin
    </a>
<?php endif; ?>