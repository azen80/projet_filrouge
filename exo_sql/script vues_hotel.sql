CREATE VIEW view_hotels_stations AS SELECT h.hot_nom AS nom_hotel, s.sta_nom AS nom_station FROM hotel h JOIN station s ON h.hot_sta_id = s.sta_id; #1. Afficher la liste des hôtels avec leur station.
SELECT * FROM view_hotels_stations;  



CREATE VIEW view_chambres_hotels AS SELECT c.cha_numero AS numero_chambre, h.hot_nom AS nom_hotel FROM chambre c JOIN hotel h ON c.cha_hot_id = h.hot_id; #2. Afficher la liste des chambres avec leur hotel.
SELECT * FROM view_chambres_hotels;



CREATE VIEW view_reservations_clients AS SELECT r.res_id AS id_reservation, c.cli_nom AS nom_client FROM reservation r JOIN client c ON r.res_cli_id = c.cli_id; #3. Afficher la liste des réservations avec le nom des clients.
SELECT * FROM view_reservations_clients;




CREATE VIEW view_chambres_hotels_stations AS SELECT c.cha_numero AS numero_chambre, h.hot_nom AS nom_hotel, s.sta_nom AS nom_station FROM chambre c JOIN hotel h ON c.cha_hot_id = h.hot_id JOIN station s ON h.hot_sta_id = s.sta_id; #4. Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station.
SELECT * FROM view_chambres_hotels_stations;




CREATE VIEW view_reservations_clients_hotels AS SELECT r.res_id AS id_reservation, c.cli_nom AS nom_client, h.hot_nom AS nom_hotel FROM client c JOIN reservation r ON c.cli_id = r.res_cli_id JOIN chambre ch ON r.res_cha_id = ch.cha_id JOIN hotel h ON ch.cha_hot_id = h.hot_id; #5. Afficher les réservations avec le nom du client et le nom de l'hôtel.
SELECT * FROM view_reservations_clients_hotels;


