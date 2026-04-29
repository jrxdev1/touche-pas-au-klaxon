<?php

require_once __DIR__ . '/../Models/Agence.php';
require_once __DIR__ . '/../Models/Trajet.php';
require_once __DIR__ . '/../Models/User.php';

class AdminController {

public function dashboard() {

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }

    $userModel = new User();
    $agenceModel = new Agence();
    $trajetModel = new Trajet();
    
    $users = $userModel->getAll();
    $agences = $agenceModel->getAll();
    $trajets = $trajetModel->getAll();

    require __DIR__ . '/../Views/admin/dashboard.php';
}
//Créer
public function createAgenceForm(){

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }

    require __DIR__ . '/../Views/admin/create_agence.php';
}

public function storeAgence(){
    
    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }

    //$nom défini dans Agence.php dans la public function create.
    $nom = $_POST['nom'];
    
    $agenceModel = new Agence();
    $agenceModel->create($nom);

    header('Location: /touche_pas_au_klaxon/public/admin');
}

//Modifier
public function editAgenceForm(){

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }
    
    $id = $_GET['id'];

    $agenceModel = new Agence();
    $agence = $agenceModel->findById($id);

    require __DIR__ . '/../Views/admin/edit_agence.php';
}

public function updateAgence(){

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }

    $id = $_POST['id'];
    $nom = $_POST['nom'];

    $agenceModel = new Agence();
    $agenceModel->update($id, $nom);

    header('Location: /touche_pas_au_klaxon/public/admin');
}

//Effacer
public function deleteAgence(){

    session_start();

    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        die('Accès interdit');
    }

    $id = $_POST['id'];

    $agenceModel = new Agence();
    $agenceModel->delete($id);

    header('Location: /touche_pas_au_klaxon/public/admin');
}
}





?>