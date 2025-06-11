DELIMITER //

CREATE PROCEDURE Lst_commandes_non_soldées ()
BEGIN
	SELECT c.id_commande, sc.libelle
	FROM COMMANDE c
	JOIN STATUT_COMMANDE sc ON c.id_statut = sc.id_statut
	WHERE sc.libelle = "Expédiée";
END;
//
DELIMITER ;


CALL Lst_commandes_non_soldées;



DELIMITER //
CREATE PROCEDURE delai_moyen_commande_facturation()
BEGIN
	SELECT AVG(DATEDIFF(f.date_facture, c.date_commande)) AS delai_moyen_jours
	FROM COMMANDE c
	JOIN FACTURE f ON c.id_commande = f.id_facture
	WHERE f.date_facture IS NOT NULL;
END //

DELIMITER ;


CALL delai_moyen_commande_facturation;
