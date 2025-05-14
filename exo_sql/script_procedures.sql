#Exercice 1

DELIMITER // #Créez la procédure stockée Lst_fournis correspondant à la requête n°2 afficher le code des fournisseurs pour lesquels une commande a été passée.

CREATE PROCEDURE Lst_fournis()
BEGIN
	SELECT DISTINCT numfou FROM entcom;
END; //

DELIMITER ;

CALL Lst_fournis; #Exécutez la pour vérifier qu’elle fonctionne conformément à votre attente.



SHOW CREATE PROCEDURE Lst_fournis; #Exécutez la commande SQL suivante pour obtenir des informations sur cette procédure stockée :




#Exercice 2

DELIMITER // #Créer la procédure stockée Lst_Commandes, qui liste les commandes ayant un libellé particulier dans le champ obscom (cette requête sera construite à partir de la requête n°11).

CREATE PROCEDURE Lst_Commandes(IN motcle VARCHAR(100))
BEGIN
	SELECT e.numcom AS numero_commande, f.nomfou AS nom_fournisseur, p.libart AS libelle_produit, l.qtecde * l.priuni AS prix_total FROM entcom e JOIN ligcom l ON e.numcom = l.numcom JOIN produit p ON l.codart = p.codart JOIN fournis f ON e.numfou = f.numfou WHERE e.obscom LIKE CONCAT ('%', motcle, '%');
END; //

DELIMITER ;

CALL Lst_Commandes('urgent');




#Exercice 3

DELIMITER // #Créer la procédure stockée CA_ Fournisseur, qui pour un code fournisseur et une année entrée en paramètre, calcule et restitue le CA potentiel de ce fournisseur pour l'année souhaitée (cette requête sera construite à partir de la requête n°19).


CREATE PROCEDURE CA_Fournisseur(IN code CHAR(5), IN annee INT)
BEGIN
	SELECT 
		f.numfou, 
		f.nomfou, 
		ROUND(SUM(l.qtecde * l.priuni * 1.20), 2) AS chiffre_affaire_TTC 
	FROM 
		fournis f 
		JOIN entcom e ON f.numfou = e.numfou 
		JOIN ligcom l ON e.numcom = l.numcom 
	WHERE 
		f.numfou = code AND YEAR (e.datcom) = annee 
	GROUP BY 
		f.numfou, 
		f.nomfou 
	ORDER BY chiffre_affaire_TTC DESC;
END //


DELIMITER ; 

CALL CA_Fournisseur(540, 2021); #Testez cette procédure avec différentes valeurs des paramètres.
CALL CA_Fournisseur(120, 2018);
CALL CA_Fournisseur(8700, 2021);





