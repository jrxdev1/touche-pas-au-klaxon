INSERT INTO agences (nom_ville) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');

INSERT INTO users (nom, prenom, telephone, email, password, role) VALUES

('Martin','Alexandre','0612345678','alexandre.martin@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','admin'),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Bernard','Julien','0622446688','julien.bernard@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Moreau','Camille','0611223344','camille.moreau@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Roux','Chloé','0633221199','chloe.roux@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Petit','Maxime','0766778899','maxime.petit@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Garnier','Laura','0688776655','laura.garnier@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Girard','Sarah','0688665544','sarah.girard@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Masson','Julie','0733445566','julie.masson@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user'),
('Henry','Arthur','0666554433','arthur.henry@email.fr','$2y$10$eWHn9la3ODmg38ERaWV2GuV3RkSVO6EzEZsaWjWbRTrouGbZzk8Ke','user');

INSERT INTO trajets (depart_agence_id, arrivee_agence_id, date_depart, date_arrivee, places_totales, places_libres, conducteur_id) VALUES
(1, 2, '2026-06-21 08:00:00', '2026-06-21 10:30:00', 4, 3, 1);