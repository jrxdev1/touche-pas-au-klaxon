DROP DATABASE IF EXISTS touche_pas_au_klaxon;
CREATE DATABASE touche_pas_au_klaxon CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE touche_pas_au_klaxon;

CREATE TABLE agences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_ville VARCHAR(100) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user'
);

CREATE TABLE trajets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    depart_agence_id INT NOT NULL,
    arrivee_agence_id INT NOT NULL,
    date_depart DATETIME NOT NULL,
    date_arrivee DATETIME NOT NULL,
    places_totales INT NOT NULL,
    places_libres INT NOT NULL,
    conducteur_id INT NOT NULL,
    FOREIGN KEY (depart_agence_id) REFERENCES agences(id) ,
    FOREIGN KEY (arrivee_agence_id) REFERENCES agences(id),
    FOREIGN KEY (conducteur_id) REFERENCES users(id) ON DELETE CASCADE,

    CHECK (places_libres <= places_totales),
    CHECK (places_libres >= 0),
    CHECK (depart_agence_id != arrivee_agence_id),
    CHECK (date_arrivee > date_depart)
);

CREATE INDEX idx_trajets_date_depart ON trajets(date_depart);
CREATE INDEX idx_trajets_conducteur ON trajets(conducteur_id);