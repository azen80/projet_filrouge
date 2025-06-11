CREATE VIEW view_produit_fournisseur AS 
SELECT p.libelle_court AS nom_produit, f.nom AS nom_fournisseur
FROM PRODUIT p 
JOIN FOURNISSEUR f ON p.id_fournisseur = f.id_fournisseur;

SELECT * FROM view_produit_fournisseur;


CREATE VIEW view_produit_rubriques AS
SELECT p.libelle_court AS nom_produit, sr.nom_sous_rubrique AS nom_sous_rubrique, r.nom_rubrique
FROM PRODUIT p 
JOIN SOUS_RUBRIQUE sr ON p.id_sous_rubrique = sr.id_sous_rubrique 
JOIN RUBRIQUE r ON sr.id_rubrique = r.id_rubrique;


SELECT * FROM view_produit_rubriques;