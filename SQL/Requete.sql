-- Insertion de plusieurs lignes à la fois dans les tables

INSERT INTO Boulangerie (id, nom, rue, ville, code_postal, user , password, email)
VALUES
(1, 'Baguette bien chaude', '', 'La Rochelle', 17000, 'Armand', 'Armand1', 'baguette.chaude@gmail.com'),
(2, 'Martin pâtissier', '', 'La Rochelle', 17000, 'martinlp', 'LPMartin', 'martin.patissier@gmail.com'),
(3, 'La Boulangerie de Jonatan', '', 'La Rochelle', 17000, 'Jojo', 'jojo17', 'jonatan@gmail.com'),
(4, 'James la dégaine', '', 'La Rochelle', 17000, 'James007', 'degaine', 'james007@gmail.com');


INSERT INTO Distributeur (id, nom, f_boulangerie, max_stock, stock_live, prix, rue, ville, code_postal, etat, seuil_de_declenchement, siefox_id, hygrométrie, temperature, horodatage)
VALUES
(1, 'Distri Piscine', 1, 60, , 1.1, 'Rue Léonce Mailho', 'La Rochelle', 17000, 1, 0, 20,,,),
(2, 'Distri Mairie', 1, 65, , 1.1, "3 Pl. de l'Hôtel de ville", 'La Rochelle', 17000, 1, 0, 21,,,),
(3, 'Distri Casino', 3, 50, , 1.2, '15 All. du Mail', 'La Rochelle', 17000, 1, 0, 22,,,),
(4, 'Distri Verdun', 4, 70, , 1.15, 'Pl. de Verdun', 'La Rochelle', 17000, 1, 0, 23,,,),
(5, 'Distri Vieux-Port', 1, 60, , 1.1, 'Vieux-Port', 'La Rochelle', 17000, 1, 0, 24,,,);

INSERT INTO Vente(id, f_distributeur, nombre, horodatage)
VALUES
(1,1,,),
(2,3,,),
(3,4,,);