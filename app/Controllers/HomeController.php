<?php

require_once __DIR__ . '/../../app/Models/Trajet.php';

class HomeController {

    public function index() {
        $trajetModel = new Trajet ();
        $trajets = $trajetModel->getTrajetsDisponibles();
    
        require __DIR__ . '/../Views/home.php';
    }
}
?>