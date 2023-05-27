-- Insertion de plusieurs lignes à la fois dans les tables

INSERT INTO Boulangerie (id, nom, rue, ville, code_postal, user , password, email)
VALUES
(1, 'Baguette bien chaude', '', 'La Rochelle', 17000, 'Armand', 'Armand1', 'baguette.chaude@gmail.com'),
(2, 'Martin pâtissier', '', 'La Rochelle', 17000, 'martinlp', 'LPMartin', 'martin.patissier@gmail.com'),
(3, 'La Boulangerie de Jonatan', '', 'La Rochelle', 17000, 'Jojo', 'jojo17', 'jonatan@gmail.com'),
(4, 'James la dégaine', '', 'La Rochelle', 17000, 'James007', 'degaine', 'james007@gmail.com');


INSERT INTO Distributeur (id, nom, f_boulangerie, max_stock, prix, longitude, latitude, seuil_de_declenchement, sigfox_id)
VALUES
(1, 'Distri Mairie', 1, 65, 1.1, '46.15994544190483', '-1.1518448288356529', 5, 21),
(2, 'Distri Léonce', 3, 50, 1.2, '46.1694559152395', '-1.1530337134930408', 7, 22),
(3, 'Distri Verdun', 4, 70, 1.15, '46.162171666763356', '-1.153929757671306', 8, 23),
(4, 'Distri Vieux-Port', 1, 60, 1.1, '46.15564648571099', '-1.1662641711643467', 5, 24);

INSERT INTO Mesure(id, f_distributeur, état, stock_live, hygrométrie, température, horodatage)
VALUES
(1, 1, 1, 20, 50, 15, '2023-04-2 10:10:05'),
(2, 3, 0, 25, 60, 16, '2023-02-4 15:55:08'),
(3, 4, 1, 15, 55, 13, '2023-01-20 23:40:35');