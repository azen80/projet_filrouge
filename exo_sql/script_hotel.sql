SELECT * FROM reservation; #1. Afficher la liste des hôtels.


SELECT cli_nom, cli_prenom, cli_ville, cli_adresse FROM client WHERE cli_nom ='White'; #2. Afficher la ville de résidence de Mr White.


SELECT sta_nom, sta_altitude FROM station WHERE sta_altitude < 1000; #3. Afficher la liste des stations dont l'altitude < 1000.


SELECT cha_numero, cha_capacite FROM chambre WHERE cha_capacite > 1; #4. Afficher la liste des chambres ayant une capacité > 1.


SELECT cli_nom, cli_ville FROM client WHERE cli_ville != 'Londre'; #5. Afficher les cliens n'habitant pas à Londre.


SELECT hot_nom, hot_ville, hot_categorie FROM hotel WHERE hot_ville = 'Bretou' AND hot_categorie > 3; #6. Afficher la liste des hôtels situés sur la ville de Bretou et possédant une catégorie > 3.


SELECT s.sta_nom AS nom_station, h.hot_nom AS nom_hotel, hot_categorie, hot_ville FROM hotel h JOIN station s ON hot_sta_id = s.sta_id; #7. Afficher la liste des hôtels avec leur station.


SELECT h.hot_nom AS nom_hotel, hot_categorie, hot_ville, c.cha_numero AS num_chambre FROM hotel h JOIN chambre c ON cha_hot_id = hot_id; #8. Afficher la liste des chambres et leur hôtel.


SELECT h.hot_nom AS nom_hotel, hot_categorie, hot_ville, c.cha_numero AS num_chambre, cha_capacite FROM hotel h JOIN chambre c ON cha_hot_id = hot_id WHERE cha_capacite > 1 AND hot_ville = 'Bretou'; #9. Afficher la liste des chambres de plus d'une place dans des hôtels situés sur la ville de Bretou.


SELECT c.cli_nom AS nom_client, h.hot_nom AS nom_hotel, r.res_date AS date_reservation FROM reservation r JOIN client c ON res_cli_id = cli_id JOIN chambre ch ON res_cha_id = cha_id JOIN hotel h ON cha_hot_id = hot_id; #10. Afficher la liste des réservations avec le nom des clients.


SELECT s.sta_nom AS nom_station, h.hot_nom AS nom_hotel, c.cha_numero AS numero_chambre, cha_capacite AS capacite_chambre FROM chambre c JOIN hotel h ON cha_hot_id = hot_id JOIN station s ON hot_sta_id = sta_id; #11. Afficher la liste des chambres avec le nom de l'hôtel et le nom de la station.


SELECT c.cli_nom AS nom_client, h.hot_nom AS nom_hotel, r.res_date_debut AS date_debut, DATEDIFF(res_date_fin, res_date_debut) AS duree_sejour FROM reservation r JOIN client c ON res_cli_id = cli_id JOIN chambre ch ON res_cha_id = cha_id JOIN hotel h ON cha_hot_id = hot_id; #12. Afficher les réservations avec le nom du client et le nom de l'hôtel.


SELECT s.sta_nom AS nom_station, COUNT(h.hot_id) AS nombre_hotels FROM station s JOIN hotel h ON h.hot_sta_id = s.sta_id GROUP BY s.sta_nom; #13. Compter le nombre d'hôtel par station.


SELECT s.sta_nom AS nom_station, COUNT(ch.cha_id) AS nombre_chambres FROM station s JOIN hotel h ON h.hot_sta_id = s.sta_id JOIN chambre ch ON ch.cha_hot_id = h.hot_id GROUP BY s.sta_nom; #14. Compter le nombre de chambre par station.


SELECT s.sta_nom AS nom_station, COUNT(ch.cha_id) AS nombre_chambres FROM station s JOIN hotel h ON h.hot_sta_id = s.sta_id JOIN chambre ch ON ch.cha_hot_id = h.hot_id WHERE cha_capacite > 1 GROUP BY s.sta_nom ; #15. Compter le nombre de chambre par station ayant une capacité > 1.


SELECT c.cli_nom AS nom_client, h.hot_nom AS nom_hotels FROM client c JOIN reservation r ON cli_id = res_cli_id  JOIN chambre ch ON cha_id = res_cha_id JOIN hotel h ON hot_id = cha_hot_id WHERE c.cli_nom = 'Squire'; #16. Afficher la liste des hôtels pour lesquels Mr Squire a effectué une réservation.


SELECT s.sta_nom AS nom_station, AVG(DATEDIFF(res_date_fin, res_date_debut)) AS moyenne_duree_reservation FROM reservation r JOIN chambre ch ON r.res_cha_id = ch.cha_id JOIN hotel h ON ch.cha_hot_id = h.hot_id JOIN station s ON s.sta_id = h.hot_sta_id GROUP BY s.sta_nom; #17. Afficher la durée moyenne des réservations par station.












