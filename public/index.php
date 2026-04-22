<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$uri = $_SERVER['REQUEST_URI'];

require_once '../app/Controllers/HomeController.php';
require_once '../app/Controllers/AuthController.php';


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

?>