CREATE VIEW v_GlobalCde AS SELECT codart AS code_produit, SUM(qtecde) AS QteTot, SUM(qtecde * priuni) AS PrixTot FROM ligcom GROUP BY codart; #1. v_GlobalCde correspondant à la requête : A partir de la table Ligcom, afficher par code produit, la somme des quantités commandées et le prix total correspondant : on nommera la colonne correspondant à la somme des quantités commandées, QteTot et le prix total, PrixTot.
SELECT * FROM v_GlobalCde;




CREATE VIEW v_VentesI100 AS SELECT * FROM vente WHERE codart = 'I100'; #2. v_VentesI100 correspondant à la requête : Afficher les ventes dont le code produit est le I100 (affichage de toutes les colonnes de la table Vente).
SELECT * FROM v_VentesI100;



CREATE VIEW v_VentesI100Grobrigan AS SELECT * FROM vente WHERE codart = 'I100' AND numfou = '120';
SELECT * FROM v_VentesI100Grobrigan;