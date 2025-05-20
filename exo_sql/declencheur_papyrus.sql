# Créer une table ARTICLES_A_COMMANDER avec les colonnes :

# CODART : Code de l'article, voir la table produit
# DATE : date du jour (par défaut)
# QTE : à calculer

CREATE TABLE ARTICLES_A_COMMANDER (
	CODART VARCHAR(20),
	DATECOM DATE DEFAULT CURRENT_DATE,
	QTE INT
);



#Créer un déclencheur UPDATE sur la table produit : lorsque le stock physique devient inférieur ou égal au stock d'alerte, une nouvelle ligne est insérée dans la table ARTICLES_A_COMMANDER.
DELIMITER //
CREATE TRIGGER trigger_article_commande AFTER UPDATE ON produit
FOR EACH ROW 
BEGIN 
	DECLARE qte_a_commander INT;
	DECLARE total_commande INT DEFAULT 0;
	IF NEW.stkphy < NEW.stkale THEN
		SELECT IFNULL(SUM(QTE), 0)
		INTO total_commande
		FROM ARTICLES_A_COMMANDER
		WHERE CODART = NEW.codart;
		
		SET qte_a_commander = (NEW.stkale - NEW.stkphy) - total_commande;
	
		IF qte_a_commander > 0 THEN
			INSERT INTO ARTICLES_A_COMMANDER (CODART, DATECOM, QTE)
			VALUES (
			NEW.codart,
			CURRENT_DATE,
			qte_a_commander
			);
		END IF;
	END IF;
END
//

SELECT * FROM produit;


INSERT INTO produit (codart, libart, stkale, stkphy, qteann, unimes)
VALUES ('I120', 'test', 5, 20, '0', 'test');


SELECT * FROM produit;


UPDATE produit SET stkphy = 5 WHERE codart = 'I120';


UPDATE produit SET stkphy = 2 WHERE codart = 'I120';
UPDATE produit SET stkphy = 3 WHERE codart = 'B001';


SELECT * FROM ARTICLES_A_COMMANDER;


