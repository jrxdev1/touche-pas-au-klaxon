<?php

require_once __DIR__ . '/../../config/Database.php';

class Trajet {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getTrajetsDisponibles()
    {
        $sql = "
            SELECT t.*, 
                   a1.nom_ville AS depart, 
                   a2.nom_ville AS arrivee
            FROM trajets t
            JOIN agences a1 ON t.depart_agence_id = a1.id
            JOIN agences a2 ON t.arrivee_agence_id = a2.id
            WHERE t.places_libres > 0
            AND t.date_depart > NOW()
            ORDER BY t.date_depart ASC
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }
}
?>