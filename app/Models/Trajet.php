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
        $sql = "SELECT t.*, 
                   a1.nom_ville AS depart, 
                   a2.nom_ville AS arrivee,
                   u.nom,
                   u.prenom,
                   u.telephone,
                   u.email
            FROM trajets t
            JOIN agences a1 ON t.depart_agence_id = a1.id
            JOIN agences a2 ON t.arrivee_agence_id = a2.id
            JOIN users u ON t.conducteur_id = u.id
            WHERE t.places_libres > 0
            AND t.date_depart > NOW()
            ORDER BY t.date_depart ASC";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function createTrajet ($data) {
        $sql = "INSERT INTO trajets (depart_agence_id, arrivee_agence_id, date_depart, date_arrivee, places_totales, places_libres, conducteur_id)
        VALUES (:depart, :arrivee, :date_depart, :date_arrivee, :places, :places, :user_id)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'depart' => $data['depart'],
            'arrivee' => $data['arrivee'],
            'date_depart' => $data['date_depart'],
            'date_arrivee' => $data['date_arrivee'],
            'places' => $data['places'],
            'user_id' => $data['user_id']
        ]);
    }

    public function findById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM trajets WHERE id = :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM trajets WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    public function updateTrajet($data) {
        $sql = "UPDATE trajets SET
        depart_agence_id = :depart,
        arrivee_agence_id =:arrivee,
        date_depart = :date_depart,
        date_arrivee = :date_arrivee,
        places_totales = :places,
        places_libres = :places
        WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            'id' => $data['id'],
            'depart' => $data['depart'],
            'arrivee' => $data['arrivee'],
            'date_depart' => $data['date_depart'],
            'date_arrivee' => $data['date_arrivee'],
            'places' => $data['places'],
        ]);
    }

    public function getAll() {
        
        $sql = "SELECT t.*, a1.nom_ville AS depart, a2.nom_ville AS arrivee
            FROM trajets t
            JOIN agences a1 ON t.depart_agence_id = a1.id
            JOIN agences a2 ON t.arrivee_agence_id = a2.id
            ORDER BY t.date_depart ASC";
        
        return $this->pdo->query($sql)->fetchAll();
    }
}
?>