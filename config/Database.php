<?php

// Se connecter à la base de données


function getPDO() {
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=touche_pas_au_klaxon;charset=utf8mb4',
            'root',
            ''
        );

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;

    } catch (Exception $e) {
        die("Erreur connexion base de données");
    }
}

?>