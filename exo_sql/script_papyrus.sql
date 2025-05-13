SELECT numcom, numfou FROM entcom WHERE numfou = '09120'; #1. Quelles sont les commandes du fournisseur 09120 ?


SELECT DISTINCT numfou FROM entcom; #2. Afficher le code des fournisseurs pour lesquels des commandes ont été passées.


SELECT COUNT(*) AS nb_commandes, COUNT (DISTINCT numfou) AS nb_fournisseurs FROM entcom;#3. Afficher le nombre de commandes fournisseurs passées, et le nombre de fournisseur concernés.


SELECT codart AS num_produit, libart AS libelle_produit, stkphy AS stock_actuel, stkale AS stock_alerte, qteann AS quantité_annuelle FROM produit WHERE stkphy <= stkale AND qteann < 1000; #4. Editer les produits ayant un stock inférieur ou égal au stock d'alerte et dont la quantité annuelle est inférieure à 1000 (informations à fournir : n° produit, libellé produit, stock, stock actuel d'alerte, quantité annuelle)


SELECT LEFT (posfou, 2) AS departement, nomfou AS nom_fournisseur FROM fournis WHERE LEFT (posfou, 2) IN ('75', '78', '92', '77') ORDER BY departement DESC, nomfou ASC; #5. Quels sont les fournisseurs situés dans les départements 75 78 92 77 ? L'affichage (département, nom fournisseur) sera effectué par département décroissant, puis par ordre alphabétique.


SELECT numcom, datcom, numfou FROM entcom WHERE MONTH(datcom) IN (3,4); #6. Quelles sont les commandes passées au mois de mars et avril ?


SELECT numcom, datcom FROM entcom WHERE DATE(datcom) = CURDATE(); #7. Quelles sont les commandes du jour qui ont des observations particulières ? (Affichage numéro de commande, date de commande)


SELECT numcom, SUM(qtecde * priuni) AS total_commande FROM ligcom GROUP BY numcom ORDER BY total_commande DESC; #8. Lister le total de chaque commande par total décroissant (Affichage numéro de commande et total) 


SELECT numcom, SUM(qtecde * priuni) AS total_commande FROM ligcom WHERE qtecde < 1000 GROUP BY numcom HAVING total_commande > 10000; #9. Lister les commandes dont le total est supérieur à 10 000€ ; on exclura dans le calcul du total les articles commandés en quantité supérieure ou égale à 1000. (Affichage numéro de commande et total)


SELECT f.nomfou AS nom_fournisseur, e.numcom AS numero_commande, datcom AS date_commande FROM fournis f JOIN entcom e ON e.numfou = f.numfou; #10. Lister les commandes par nom fournisseur (Afficher le nom du fournisseur, le numéro de commande et la date)


SELECT e.numcom AS numero_commande, f.nomfou AS nom_fournisseur, p.libart AS libelle_produit, l.qtecde * l.priuni AS prix_total FROM entcom e JOIN ligcom l ON e.numcom = l.numcom JOIN produit p ON l.codart = p.codart JOIN fournis f ON e.numfou = f.numfou WHERE e.obscom LIKE '%urgent%';#11. Sortir les produits des commandes ayant le mot "urgent" en observation ?



SELECT DISTINCT f.nomfou FROM fournis f JOIN vente v ON f.numfou = v.numfou; #12. Coder de 2 manières différentes la requête suivante : Lister le nom des fournisseurs susceptibles de livrer au moins un article
SELECT nomfou FROM fournis WHERE numfou IN (SELECT DISTINCT numfou FROM vente);


SELECT numcom, datcom FROM entcom WHERE numfou = (SELECT numfou FROM entcom WHERE numcom = 70210);#13. Coder de 2 manières différentes la requête suivante : Lister les commandes (Numéro et date) dont le fournisseur est celui de la commande 70210 
SELECT e1.numcom, e1.datcom FROM entcom e1 JOIN entcom e2 ON e1.numfou = e2.numfou WHERE e2.numcom = 70210;


SELECT p.libart, v.prix1 FROM vente v JOIN produit p ON v.codart = p.codart WHERE v.prix1 < (SELECT MIN(prix1) FROM vente WHERE codart LIKE 'r%');#14. Dans les articles susceptibles d’être vendus, lister les articles moins chers (basés sur Prix1) que le moins cher des rubans (article dont le premier caractère commence par R). On affichera le libellé de l’article et prix1



#15. Editer la liste des fournisseurs susceptibles de livrer les produits dont le stock est inférieur ou égal à 150 % du stock d'alerte. La liste esttriée par produit puis fournisseur



#16. Éditer la liste des fournisseurs susceptibles de livrer les produit dont le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de livraison d'au plus 30 jours. La liste est triée par fournisseur puis produit



#17. Avec le même type de sélection que ci-dessus, sortir un total des stocks par fournisseur trié par total décroissant



SELECT p.codart, p.libart, SUM(l.qtecde) AS total_commande, p.qteann, ROUND(100 * SUM(l.qtecde) / p.qteann, 2) AS pourcentage FROM produit p JOIN ligcom l ON p.codart = l.codart GROUP BY p.codart, p.libart, p.qteann HAVING SUM(l.qtecde) > 0.9 * p.qteann; #18. En fin d'année, sortir la liste des produits dont la quantité réellement commandée dépasse 90% de la quantité annuelle prévue.



SELECT f.numfou, f.nomfou, ROUND(SUM(l.qtecde * l.priuni * 1.20), 2) AS chiffre_affaire_TTC FROM fournis f JOIN entcom e ON f.numfou = e.numfou JOIN ligcom l ON e.numcom = l.numcom WHERE YEAR (e.datcom) = 1993 GROUP BY f.numfou, f.nomfou ORDER BY chiffre_affaire_TTC DESC; #19. Calculer le chiffre d'affaire par fournisseur pour l'année 93 sachant que les prix indiqués sont hors taxes et que le taux de TVA est 20%.







UPDATE vente SET prix1 = prix1 * 1.04, prix2 = prix2 * 1.02 WHERE numfou = '9180'; #1. Application d'une augmentation de tarif de 4% pour le prix1 et de 2% pour le prix2 pour le fournisseur 9180.



UPDATE vente SET prix2 = prix1 WHERE prix2 IS NULL;#2. Dans la table vente, mettre à jour le prix2 des articles dont le prix2 est null, en affectant a prix2 la valeur de prix1.



#3. Mettre à jour le champ obscom en positionnant '*****' pour toutes les commandes dont le fournisseur a un indice de satisfaction <5.



DELETE FROM produit WHERE codart = 'l110';#4. Suppression du produit l110.



DELETE FROM entcom WHERE numcom NOT IN (SELECT DISTINCT numcom FROM ligcom); #5. Suppresion des entête de commande qui n'ont aucune ligne.




