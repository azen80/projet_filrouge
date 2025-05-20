DELIMITER //
CREATE TRIGGER maj_total 
AFTER INSERT ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande;
    SET tot = (SELECT SUM(prix * quantite) FROM lignedecommande WHERE id_commande = id_c);
    UPDATE commande SET total = tot WHERE id = id_c;
END;
//
DELIMITER ;




select * from commande;
select * from produit;
select * from lignedecommande;


#1. Mettez en place ce trigger, puis ajoutez un produit dans une commande, vérifiez que le champ total est bien mis à jour.
insert into lignedecommande (id_commande, id_produit, quantite, prix) values (3, 3, 1, 10.00);



#2. Ce trigger ne fonctionne que lorsque l'on ajoute des produits dans la commande, les modifications ou suppressions ne permettent pas de recalculer le total. Modifiez le code ci-dessus pour faire en sorte que la modification ou la suppression de produit recalcule le total de la commande.
DELIMITER //

CREATE TRIGGER maj_total_update 
AFTER UPDATE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande;
    SET tot = (SELECT SUM(prix * quantite) FROM lignedecommande WHERE id_commande = id_c);
    UPDATE commande SET total = tot WHERE id = id_c;
END;
//

CREATE TRIGGER maj_total_delete 
AFTER DELETE ON lignedecommande
FOR EACH ROW
BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = OLD.id_commande;
    SET tot = (SELECT SUM(prix * quantite) FROM lignedecommande WHERE id_commande = id_c);
    UPDATE commande SET total = tot WHERE id = id_c;
END;
//

DELIMITER ;


#3. Un champ remise était prévu dans la table commande, il contient le coefficient de remise à appliquer à la commande. Prenez en compte ce champ dans le code de votre trigger.

