<?php

require_once __DIR__ . '/../../config/Database.php';

class Agence {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM agences ORDER BY nom_ville");
        return $stmt->fetchAll();
    }

    public function create($nom)
    {
        $stmt = $this->pdo->prepare("INSERT INTO agences (nom_ville) VALUES (:nom)");
        return $stmt->execute(['nom' => $nom]);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM agences WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function update($id, $nom)
    {
        $stmt = $this->pdo->prepare("UPDATE agences SET nom_ville = :nom WHERE id = :id");
        return $stmt->execute(['id' => $id, 'nom' => $nom]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM agences WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}

?>