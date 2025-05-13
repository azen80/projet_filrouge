
SELECT * FROM employe; #1. Afficher toutes les informations concernant les employés


SELECT * FROM dept; #2. Afficher toutes les informations concernant les départements. 


SELECT nom, dateemb, nosup, nodep, salaire FROM employe; #3. Afficher le nom, la date d'embauche, le numéro du supérieur, le numéro de département et le salaire de tous les employés.


SELECT titre FROM employe; #4. Afficher le titre de tous les employés.


SELECT DISTINCT titre FROM employe; #5. Afficher les différentes valeurs des titres des employés. 


SELECT nom, noemp, nodep FROM employe WHERE titre = 'secrétaire'; #6. Afficher le nom, le numéro d'employé et le numéro du département des employés dont le titre est « Secrétaire ».


SELECT nom, nodep FROM employe WHERE nodep > 40; #7. Afficher le nom et le numéro de département dont le numéro de département est supérieur à 40.


SELECT nom, prenom FROM employe WHERE nom < prenom; #8. Afficher le nom et le prénom des employés dont le nom est alphabétiquement antérieur au prénom.


SELECT nom, salaire, nodep FROM employe WHERE titre = 'représentant' AND nodep = 35 AND salaire > 20000; #9. Afficher le nom, le salaire et le numéro du département des employés dont le titre est "Représentant", le numéro de département est 35 et le salair est supérieur à 20000.


SELECT nom, titre, salaire FROM employe WHERE titre = 'représentant' OR titre = 'président'; #10. Afficher le nom, le titre et le salaire des employés dont le titre est "représentant" ou dont le titre est "président".


SELECT nom, titre, nodep, salaire FROM employe WHERE nodep = 34 AND (titre = 'représentant' OR titre = 'secrétaire'); #11. Aficher le nom, le titre, le numéro de département, le salaire des employés du département 34, dont le titre est "représentant" ou "secrétaire".


SELECT nom, titre, nodep, salaire FROM employe WHERE titre = 'représentant' OR (titre = 'secrétaire' AND nodep = 34); #12. Afficher le nom, le titre, le numéro de département, le salaire des employés dont le titre est représentant, ou dont le titre est secrétaire dans le département numéro 34.


SELECT nom, salaire FROM employe WHERE salaire BETWEEN 20000 AND 30000; #13. Afficher le nom, et le salaire des employés dont le salaire est compris entre 20000 et 30000.


SELECT nom FROM employe WHERE nom LIKE 'H%'; #15. Afficher le nom des employés commençant par la lettre "H".


SELECT nom FROM employe WHERE nom LIKE '%n'; #16. Afficher le nom des employés se terminant par la lettre "n".


SELECT nom FROM employe WHERE nom LIKE '__u%'; #17. Afficher le nom des employés contenant la lettre "u" en 3ème position.


SELECT salaire, nom FROM employe WHERE nodep = 41 ORDER BY salaire ASC; #18. Afficher le salaire et le nom des employés du service 41 classés par salaire croissant.


SELECT salaire, nom FROM employe WHERE nodep = 41 ORDER BY salaire DESC; #19. Afficher le salaire et le nom des employés du service 41 classés par salaire décroissant.


SELECT titre, salaire, nom FROM employe ORDER BY titre ASC, salaire DESC; #20. Afficher le titre, le salaire et le nom des employés classés par titre croissant et par salaire décroissant.


SELECT tauxcom, salaire, nom FROM employe WHERE tauxcom ORDER BY tauxcom ASC; #21. Afficher le taux de commision, le salaire et le nom des employés classés pr taux de commission croissante.


SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom IS NULL; #22. Afficher le nom, le salaie, le taux de commission et le titre des employés dont le taux de commission n'est pas renseigné.


SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom IS NOT NULL; #23. Afficher le nom, le salaire, le taux de commission et le tite des employés dont le taux de commission est renseigné.


SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom < 15; #24. Afficher le nom, le salaire, le taux de commission, le titre des employés dont le taux de commission est inférieur à 15.


SELECT nom, salaire, tauxcom, titre FROM employe WHERE tauxcom > 15; #25. Afficher le nom, le salaire, le taux de commision, le tire des employés dont le taux de commission est supérieur à 15.


SELECT nom, salaire, tauxcom, salaire * tauxcom AS commission FROM employe WHERE tauxcom IS NOT NULL; #26. Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission n'est pas nul. (la commission est calculée en multipliant le salaire par le taux de commission).


SELECT nom, salaire, tauxcom, salaire * tauxcom AS commission FROM employe WHERE tauxcom IS NOT NULL ORDER BY tauxcom ASC; #27. Afficher le nom, le salaire, le taux de commission et la commission des employés dont le taux de commission n'est pas nul, classé par taux de commission croissant.


SELECT CONCAT (nom, ' ', prenom) AS nom_et_prenom FROM employe; #28. Afficher le nom et le prénom (concaténés) des employés. Renommer les colonnes.


SELECT SUBSTRING (nom, 1, 5) FROM employe; #29. Afficher les 5 premières lettres du nom des employés.


SELECT nom, LOCATE ('r', nom) FROM employe; #30. Afficher le nom et le rang de la lettre "r" dans le nom des employés.


SELECT nom, UPPER(nom), LOWER(nom) FROM employe WHERE nom = 'Vrante'; #31. Afficher le nom, le nom en majuscule et le nom en minuscule de l'employé dont le nom est Vrante.


SELECT nom, LENGTH(nom) FROM employe; #32. Afficher le nom et le nombre de caractères du nom des employés.


SELECT e.prenom, d.noregion FROM employe e JOIN dept d ON e.nodep = d.nodept; #33. Rechercher le prénom des employés et le numéro de la réion de leur département.


SELECT d.nodept, d.nom AS nom_dep, e.nom AS nom_employe FROM dept d JOIN employe e ON d.nodept = e.nodep ORDER BY d.nodept; #34. Rechercher le numéro du département, le nom du départemet, le nom des employés classés par numéro de département (renommer les tables utilisées).


SELECT d.nom AS nom_dep, e.nom AS nom_employe FROM dept d JOIN employe e ON d.nodept = e.nodep WHERE d.nom = 'distribution'; #35 Rechercher le nom des employés du département Distribution.


SELECT e.nom AS nom_employe, e.salaire AS salaire_employe, p.nom AS nom_patron, p.salaire AS salaire_patron FROM employe e JOIN employe p ON e.nosup = p.noemp WHERE e.salaire > p.salaire; #36. Rechercher le nom et le salaire des employés qui gagnent plus que leur patron, et le nom et le salaire de leur patron.


SELECT nom, titre FROM employe WHERE titre = (SELECT titre FROM employe WHERE nom = 'amartakaldire'); #37. Rechercher le nom et le titre des employés qui ont le même titre que amartakaldire.


SELECT nom, salaire, nodep FROM employe WHERE salaire > ANY (SELECT salaire FROM employe WHERE nodep = 31) ORDER BY nodep, salaire; #38. Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus qu'un seul employé du département 31, classés par numéro de département et salaire.


SELECT nom, salaire, nodep FROM employe WHERE salaire > ALL (SELECT salaire FROM employe WHERE nodep = 31) ORDER BY nodep, salaire; #39. Rechercher le nom, le salaire et le numéro de département des employés qui gagnent plus que tous les employés du département 31, classés par numéro de département et salaire.


SELECT nom, titre FROM employe WHERE nodep = 31 AND titre IN (SELECT titre FROM employe WHERE nodep = 32); #40. Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on trouve dans le département 32.


SELECT nom, titre FROM employe WHERE nodep = 31 AND titre NOT IN (SELECT titre FROM employe WHERE nodep = 32); #41. Rechercher le nom et le titre des employés du service 31 qui ont un titre que l'on ne trouve pas dans le département 32.


SELECT nom, titre, salaire FROM employe WHERE (titre, salaire) = (SELECT titre, salaire FROM employe WHERE nom = 'fairent'); #42. Rechercher le nom, le titre et le salaire des employés qui ont le même titre et le même salaire que Fairent.


SELECT d.nodept, d.nom AS nom_dept, e.nom AS nom_employe FROM dept d LEFT JOIN employe e ON d.nodept = e.nodep ORDER BY d.nodept; #43. Rechercher le numéro de département, le nom du département, le nom des employés, en affichant assi les départements dans lesquels il n'y a personne, classés par numéro de département.


SELECT titre, COUNT(*) AS nb_employes FROM employe GROUP BY titre; #44. Calculer le nombre d'employés de chaque titre.


SELECT d.noregion, AVG(salaire), SUM(salaire) FROM employe e JOIN dept d ON e.nodep = d.nodept GROUP BY d.noregion; #45. Calculer la moyenne des salaires et leur somme, par région.


SELECT nodep FROM employe GROUP BY nodep HAVING COUNT (*) >= 3; #46. Afficher les numéros des départements ayant au moins 3 employés.


SELECT SUBSTRING(nom, 1, 1) AS initiale, COUNT(*) AS nb_employes FROM employe GROUP BY initiale HAVING COUNT (*) >= 3; #47. Afficher les lettres qui sont l'initiale d'au moins trois employés.


SELECT MAX(salaire) AS salaire_max, MIN(salaire) AS salaire_min, MAX(salaire) - MIN(salaire) AS ecart FROM employe; #48. Rechercher le salaire maximum et le salaire minimum parmi tous les salaréis et l'écart entre les deux.
 

SELECT COUNT(DISTINCT titre) AS nb_titres_differents FROM employe; #49. Rechercher le nombre de titres différents.


SELECT titre, COUNT(*) FROM employe GROUP BY titre; #50. Pour chaque titre, compter le nombre d'employés possédant ce titre.


SELECT d.nom AS nom_dept, COUNT(e.noemp) AS nb_employes FROM dept d LEFT JOIN employe e ON d.nodept = e.nodep GROUP BY d.nom; #51. Pour chaque nom de département, afficher le nom du département et le nombre d'employés.


SELECT titre, AVG(salaire) FROM employe GROUP BY titre HAVING AVG(salaire) > (SELECT AVG(salaire) FROM employe WHERE titre = 'représentant'); #52. Rechercher les titres et la moyenne des salaires par titre dont la moyenne est supérieur à la moyenne des salaires des représentants.


SELECT COUNT(salaire) AS nb_salaire, COUNT(tauxcom) AS nb_tauxcom FROM employe; #53. Rechercher le nombre de salaires renseignés et le nombre de taux de commission renseignés.








