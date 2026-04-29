<?php

require_once __DIR__ . '/../Models/Agence.php';
require_once __DIR__ . '/../Models/Trajet.php';

class TrajetController {

    public function createForm()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /touche_pas_au_klaxon/public/login');
            exit;
        }

        $agenceModel = new Agence();
        $agences = $agenceModel->getAll();

        require __DIR__ . '/../Views/create_trajet.php';
    }

    public function store () {

        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /touche_pas_au_klaxon/public/login');
            exit;
        }

        $user = $_SESSION['user'];

        $depart = $_POST['depart'] ?? null;
        $arrivee = $_POST['arrivee'] ?? null;
        $date_depart = $_POST['date_depart'] ?? null;
        $date_arrivee = $_POST['date_arrivee'] ?? null;
        $places = $_POST['places'] ?? null;

        $date_depart = str_replace('T', ' ', $date_depart) . ':00';
        $date_arrivee = str_replace('T', ' ', $date_arrivee) . ':00';
    
        if ($depart == $arrivee) {
            die("Départ et arrivée identiques interdits");
        }

        if ($date_arrivee <= $date_depart) {
            die("Dates incohérentes");
        }
    
        $trajetModel = new Trajet();

        $trajetModel->createTrajet([
            'depart' => $depart,
            'arrivee' => $arrivee,
            'date_arrivee' => $date_arrivee,
            'date_depart' => $date_depart,
            'places' => $places,
            'user_id' => $user['id']
        ]);
    
        $_SESSION['flash'] = "Trajet créé avec succès";
        header('Location: /touche_pas_au_klaxon/public/');
        exit;
    }

    //Supprimer
    public function delete() {

        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /touche_pas_au_klaxon/public/login');
            exit;
        }

        $user = $_SESSION['user'];
        $trajet_id = $_POST['id'] ?? null;

        if (!$trajet_id) {
            die("ID manquant");
        }

        $trajetModel = new Trajet();

        $trajet = $trajetModel->findById($trajet_id);
    
        if (!$trajet || $trajet['conducteur_id'] !=$user['id']){
            die("Suppression interdite");
        }
        $trajetModel->delete($trajet_id);

        $_SESSION['flash'] = "Trajet supprimé avec succès";
    
        header('Location: /touche_pas_au_klaxon/public/');
        exit;
    }

    //Modifier
    public function editForm() {

        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /touche_pas_au_klaxon/public/login');
            exit;
        }
        $user = $_SESSION['user'];
        $id = $_GET['id'] ?? null;

        $trajetModel = new Trajet();

        $trajet = $trajetModel->findById($id);

        if (!$trajet || $trajet['conducteur_id'] !=$user['id']){
            die("Modification interdite");
        }

        $agenceModel = new Agence();
        $agences = $agenceModel->getAll();

        require __DIR__ . '/../Views/edit_trajet.php';
    
    }

    public function update() {

        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /touche_pas_au_klaxon/public/login');
            exit;
        }
        $user = $_SESSION['user'];
        $id = $_POST['id'] ?? null;

        $trajetModel = new Trajet();

        $trajet = $trajetModel->findById($id);

        if (!$trajet || $trajet['conducteur_id'] !=$user['id']){
            die("Modification interdite");
        }

        $depart = $_POST['depart'];
        $arrivee = $_POST['arrivee'];
        $date_depart = $_POST['date_depart'];
        $date_arrivee = $_POST['date_arrivee'];
        $places = $_POST['places'];

        $date_depart = str_replace('T', ' ', $date_depart) . ':00';
        $date_arrivee = str_replace('T', ' ', $date_arrivee) . ':00';
    
        if ($depart == $arrivee) {
            die("Départ et arrivée identiques interdits");
        }

        if ($date_arrivee <= $date_depart) {
            die("Dates incohérentes");
        }
    
        $trajetModel = new Trajet();

        $trajetModel->updateTrajet([
            'id' => $id,
            'depart' => $depart,
            'arrivee' => $arrivee,
            'date_arrivee' => $date_arrivee,
            'date_depart' => $date_depart,
            'places' => $places
        ]);
    
        $_SESSION['flash'] = "Trajet modifié avec succès";
        header('Location: /touche_pas_au_klaxon/public/');
        exit;
    }
}

?>