<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$uri = $_SERVER['REQUEST_URI'];

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/AuthController.php';
require_once '../app/Controllers/TrajetController.php';
require_once '../app/Controllers/AdminController.php';

if ($uri === '/touche_pas_au_klaxon/public/' || $uri === '/touche_pas_au_klaxon/public') {
    $controller = new HomeController();
    $controller->index();
}

elseif ($uri === '/touche_pas_au_klaxon/public/login') {
    $controller = new AuthController();
    $controller->loginForm();
}

elseif ($uri === '/touche_pas_au_klaxon/public/login-post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new AuthController();
    $controller->login();
}

elseif ($uri === '/touche_pas_au_klaxon/public/logout') {
    $controller = new AuthController();
    $controller->logout();
}

elseif ($uri === '/touche_pas_au_klaxon/public/create-trajet') {
    (new TrajetController())->createForm();
}

elseif ($uri === '/touche_pas_au_klaxon/public/create-trajet-post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new TrajetController())->store();
}

elseif ($uri === '/touche_pas_au_klaxon/public/delete-trajet' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new TrajetController())->delete();
}

elseif (str_starts_with($uri,'/touche_pas_au_klaxon/public/edit-trajet')) {
    (new TrajetController())->editForm();
}

elseif ($uri === '/touche_pas_au_klaxon/public/update-trajet' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new TrajetController())->update();
}

elseif ($uri === '/touche_pas_au_klaxon/public/admin') {
    (new AdminController())->dashboard();
}

elseif ($uri === '/touche_pas_au_klaxon/public/admin/agence-create') {
    (new AdminController())->createAgenceForm();
}

elseif ($uri === '/touche_pas_au_klaxon/public/admin/agence-store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AdminController())->storeAgence();
}

elseif (str_starts_with($uri,'/touche_pas_au_klaxon/public/admin/agence-edit')) {
    (new AdminController())->editAgenceForm();
}

elseif ($uri === '/touche_pas_au_klaxon/public/admin/agence-update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AdminController())->updateAgence();
}

elseif ($uri === '/touche_pas_au_klaxon/public/admin/agence-delete' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    (new AdminController())->deleteAgence();
}

?>