<?php

require_once __DIR__ . '/../../config/Database.php';

class User {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);

        return $stmt->fetch();
    }
}

?>