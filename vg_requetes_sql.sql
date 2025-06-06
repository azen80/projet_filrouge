#Chiffre d'affaires mois par mois pour une année sélectionnée
SELECT 
	EXTRACT(MONTH FROM f.date_facture) AS mois,
	SUM(f.total_HT) AS chiffre_affaires
	FROM FACTURE f
WHERE EXTRACT (YEAR FROM f.date_facture) = 2025
GROUP BY mois
ORDER BY mois;



#Chiffre d'affaires généré pour un fournisseur
SELECT 
	f.id_fournisseur,
	f.nom AS nom_fournisseur,
	SUM(l.quantite * p.prix_achat * cl.coefficient) AS chiffre_affaires
FROM FOURNISSEUR f
JOIN PRODUIT p ON p.id_fournisseur = f.id_fournisseur
JOIN LIGNE l ON l.id_produit = p.id_produit 
JOIN COMMANDE c ON l.id_commande = c.id_commande 
JOIN FACTURE fa ON c.id_facture = fa.id_facture 
JOIN CLIENT cl ON c.id_client = cl.id_client
GROUP BY f.id_fournisseur, f.nom;


#TOP 10 des produits les plus commandés pour une année sélectionnée (référence et nom du produit, quantité commandée, fournisseur)
SELECT  
	p.id_produit,
	p.libelle_court AS nom_produit,
	f.nom AS fournisseur,
	SUM(l.quantite) AS quantite_totale
FROM PRODUIT p 
JOIN FOURNISSEUR f ON p.id_fournisseur = f.id_fournisseur 
JOIN LIGNE l ON l.id_produit = p.id_produit 
JOIN COMMANDE c ON l.id_commande = c.id_commande
WHERE EXTRACT(YEAR FROM c.date_commande) = 2025
GROUP BY p.id_produit, p.libelle_court, f.nom 
ORDER BY quantite_totale DESC 
LIMIT 10;



#TOP 10 des produits les plus rémunérateurs pour une année sélectionnée (référence et nom du produit, marge, fournisseur)
SELECT  
	p.id_produit,
	p.libelle_court AS nom_produit,
	f.nom AS fournisseur,
	SUM((l.prix_unitaire - p.prix_achat) * l.quantite) AS marge_totale
FROM PRODUIT p 
JOIN FOURNISSEUR f ON p.id_fournisseur = f.id_fournisseur 
JOIN LIGNE l ON l.id_produit = p.id_produit 
JOIN COMMANDE c ON l.id_commande = c.id_commande
WHERE EXTRACT(YEAR FROM c.date_commande) = 2025
GROUP BY p.id_produit, p.libelle_court, f.nom 
ORDER BY marge_totale DESC 
LIMIT 10;




#Top 10 des clients en nombre de commandes ou chiffre d'affaires
SELECT 
	c.id_client,
	c.nom,
	COUNT(co.id_commande) AS nombre_commandes
FROM CLIENT c
JOIN COMMANDE co ON c.id_client = co.id_client
GROUP BY c.id_client, c.nom
ORDER BY nombre_commandes DESC 
LIMIT 10;



#Version chiffre affaire
SELECT 
  c.id_client,
  c.nom,
  SUM(f.total_HT) AS chiffre_affaires
FROM CLIENT c
JOIN COMMANDE co ON c.id_client = co.id_client
JOIN FACTURE f ON co.id_facture = f.id_facture
GROUP BY c.id_client, c.nom
ORDER BY chiffre_affaires DESC
LIMIT 10;



#Répartition du chiffre d'affaires par type de client
SELECT 
	c.type_client,
	SUM(f.total_HT) AS chiffre_affaires
FROM CLIENT c
JOIN COMMANDE co ON c.id_client = co.id_client
JOIN FACTURE f ON co.id_facture = f.id_facture
GROUP BY c.type_client;





#Nombre de commandes en cours de livraison.
SELECT COUNT(*) AS nombre_commandes_en_cours
FROM COMMANDE c
JOIN LIVRAISON l ON c.id_commande = l.id_commande
JOIN STATUT_LIVRAISON sl ON l.id_statut_livraison = sl.id_statut_livraison
WHERE libelle = 'Expédiée';



