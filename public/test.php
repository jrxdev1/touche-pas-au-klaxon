<?php

require_once '../config/Database.php';

$pdo = getPDO();

echo "Connexion OK";

session_start();
$_SESSION['user'] = "Alex";
echo $_SESSION['user'];
?>