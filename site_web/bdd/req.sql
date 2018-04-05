/* Adherant */

/* Catalogue */
SELECT Oeuvre.IdLivre,
    Oeuvre.Titre,
    Oeuvre.Cote,
    Oeuvre.Publication,
    group_concat(Auteur.Nom, ' ',Auteur.Prenom , ' ') AS Auteurs,
    group_concat(MotClef.Nom, ' ') AS MotClefs,
    Oeuvre.Description
FROM Oeuvre
    LEFT JOIN Ecrit ON Oeuvre.IdLivre = Ecrit.FkLivre
    LEFT JOIN Auteur ON Ecrit.FkAuteur = Auteur.IdAuteur
    LEFT JOIN Definition ON Oeuvre.IdLivre = Definition.FkLivre
    LEFT JOIN MotClef ON Definition.FkMotClef = MotClef.IdMotClef
GROUP BY Oeuvre.IdLivre
HAVING Auteurs LIKE '%teur%' ;
/*And Auteur.IdAuteur = '???'
And MotClef.IdMotClef = '???'
LIMIT 20 OFSET '???' ;*/
/*	*/


/* Notif */ 
Select IdNotif, TypeNotif.Nom as Type, Notif.Commentaire
From Notif, TypeNotif , Adherant 
where IdAdherant = 2
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; 
/*	*/


/* Historique */ 
Select * 
From Emprun, Exemplaire, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Exemplaire.FkLivre
And Livre.IdExemplaire = Emprun.FkExemplaire
And Emprun.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = '???'
And Emprun.DateRetour IS NOT NULL;
/*	*/


/* Pret en cour */
Select * 
From Emprun, Exemplaire, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Exemplaire.FkLivre
And Exemplaire.IdExemplaire = Emprun.FkExemplaire
And Emprun.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = 2
And Emprun.DateRetour IS NULL;
/*	*/

 
/* reservation */
Select Titre, DateAcceptation, IdExemplaire, IdReservation
From Reservation, Oeuvre, Adherant, Exemplaire
Where Oeuvre.IdLivre = Exemplaire.FkLivre
And Exemplaire.IdExemplaire = Reservation.FkExemplaire
And Reservation.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = 2;



SELECT IdLivre,Cote,Publication,Auteurs,group_concat(MotClef.Nom, ' ') AS MotClefs,Description
FROM (SELECT Oeuvre.IdLivre,
Oeuvre.Titre,
Oeuvre.Cote,
Oeuvre.Publication,
group_concat(Auteur.Nom, ' ' , Auteur.Prenom , ' ') AS Auteurs,
Oeuvre.Description
FROM Oeuvre
LEFT JOIN Ecrit ON Oeuvre.IdLivre = Ecrit.FkLivre
LEFT JOIN Auteur ON Ecrit.FkAuteur = Auteur.IdAuteur
GROUP BY Oeuvre.IdLivre) AS TMP
LEFT JOIN Definition ON TMP.IdLivre = Definition.FkLivre
LEFT JOIN MotClef ON Definition.FkMotClef = MotClef.IdMotClef
GROUP BY TMP.IdLivre
;



Select IdAuteur, Nom, Prenom, CONCAT(Nom,' ',Prenom) as R1, CONCAT(Prenom,' ',Nom) as R2
    From Auteur
    HAVING R1 Like '%pu%';
/* Requete/demande */
/* Visualisation */
Select Titre, Requete
From Requete, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Requete.FkLivre
And Requete.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = 2;
/* Demande */ 
INSERT INTO Renouvelement(FkAdherant, FkLivre, Requete)
VALUES ('???', '???', '???');
/*	*/

/* Renouvelement */ 
/* Demande */
INSERT INTO Renouvelement(FkEmprun, DateDemande)
VALUES ('???', '???');
/*	*/

/* Contact */
Select * from Admin; 
/*	*/
/*	*/


/******//******//******//******//******//******//******//******//******//******//******/
/******//******//******//******//******//******//******//******//******//******//******/
/******//******//******//******//******//******//******//******//******//******//******/
/* Admin */
/* Ajout de livre */
INSERT INTO '???'('???', '???', '???')
VALUES ('???', '???', '???');





/* Visualisé les tables  */
Select * from '???'; 
/*	*/

/* Ajoue valeur */
INSERT INTO Oeuvre(Titre, Cote, Publication, Description)
VALUES ('???', '???', '???', '???');
/* commande pour recuperer le dernier id créer : $db->lastInsertId(); */

INSERT INTO Ecrit(FkAuteur,FkLivre)
    Values (1,1);

/*	*/

SELECT Nom, Prenom, IdAdherant, FkEmprun, DateDemande, DatePret, IdExemplaire, IdLivre, Titre, Cote
from Renouvelement, Emprun, Exemplaire, Oeuvre, Adherant
where Renouvelement.FkEmprun = Emprun.IdEmprun
And Emprun.FkExemplaire = Exemplaire.IdExemplaire
And Exemplaire.FkLivre = Oeuvre.IdLivre
And Adherant.IdAdherant = Emprun.FkAdherant
And DateRetour IS NULL
And Renouvelement = 1;



/*	*/
SELECT *
from Renouvelement, Emprun, Exemplaire, Oeuvre, Adherant
where Renouvelement.FkEmprun = Emprun.IdEmprun
And Emprun.FkExemplaire = Exemplaire.IdExemplaire
And Exemplaire.FkLivre = Oeuvre.IdLivre
And Adherant.IdAdherant = Emprun.FkAdherant
And DateRetour IS NULL
And Renouvelement = 1
ORDER BY DateDemande;

SELECT * from Emprun;

UPDATE Emprun SET Renouvelement = 2 WHERE IdEmprun = ?;

DELETE FROM Renouvelement
WHERE FkEmprun = ?;


SELECT DISTINCT IdLivre,Titre,Cote,Publication,Auteurs, MotClefs, Description FROM(
SELECT IdLivre,Titre,Cote,Publication,Auteurs,group_concat(MotClef.Nom, ' ') AS MotClefs,Description
FROM (SELECT Oeuvre.IdLivre,
Oeuvre.Titre,
Oeuvre.Cote,
Oeuvre.Publication,
group_concat(Auteur.Nom, ' ' , Auteur.Prenom , ' ') AS Auteurs,
Oeuvre.Description
FROM Oeuvre
LEFT JOIN Ecrit ON Oeuvre.IdLivre = Ecrit.FkLivre
LEFT JOIN Auteur ON Ecrit.FkAuteur = Auteur.IdAuteur
GROUP BY Oeuvre.IdLivre) AS TMP
LEFT JOIN Definition ON TMP.IdLivre = Definition.FkLivre
LEFT JOIN MotClef ON Definition.FkMotClef = MotClef.IdMotClef
GROUP BY TMP.IdLivre) as T, Exemplaire
Where FkLivre=IdLivre
;



SELECT DISTINCT IdRequete,Titre,Cote,IdLivre,Nom,Prenom
from Requete
INNER JOIN Oeuvre ON Requete.FkLivre = Oeuvre.IdLivre
INNER JOIN Adherant ON Requete.FkAdherant = Adherant.IdAdherant
INNER JOIN Exemplaire oN Oeuvre.IdLivre = Exemplaire.FkLivre
LEFT JOIN Emprun ON Exemplaire.IdExemplaire = Emprun.FkExemplaire
LEFT JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
WHERE DateRetour IS NULL
AND IdEmprun IS NULL
AND IdReservation IS NULL;



    where FkLivre = 1
    And DateRetour IS NULL
    And IdEmprun IS NULL
    AND IdReservation IS NULL;

SELECT * FROM Exemplaire
where FkLivre = 1;


SELECT IdEmprun, IdExemplaire, Titre, DatePret,Renouvelement ,IF(Renouvelement=2,DATE_ADD(DatePret, INTERVAL (2) MONTH),DATE_ADD(DatePret, INTERVAL (1) MONTH))AS date_Retour
    FROM Emprun, Exemplaire, Oeuvre, Adherant
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Emprun.FkExemplaire
    AND Emprun.FkAdherant = Adherant.IdAdherant
    AND Emprun.DateRetour IS NULL;

Select *
    From Exemplaire
    LEFT JOIN Emprun On Exemplaire.IdExemplaire = Emprun.FkExemplaire
    Left JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    where FkLivre = 1
    And DateRetour IS NULL
    And IdEmprun IS NULL
    AND IdReservation IS NULL;

Select IdExemplaire,Achat
    From Exemplaire
    LEFT JOIN Emprun On Exemplaire.IdExemplaire = Emprun.FkExemplaire
    Left JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    where FkLivre = 3
    And DateRetour IS NULL
    And IdEmprun IS NULL
    AND IdReservation IS NULL;

SELECT DISTINCT IdRequete,Titre,Cote,IdLivre,Nom,Prenom
    from Requete
    INNER JOIN Oeuvre ON Requete.FkLivre = Oeuvre.IdLivre
    INNER JOIN Adherant ON Requete.FkAdherant = Adherant.IdAdherant
    INNER JOIN Exemplaire oN Oeuvre.IdLivre = Exemplaire.FkLivre
    LEFT JOIN Emprun ON Exemplaire.IdExemplaire = Emprun.FkExemplaire
    LEFT JOIN Reservation ON Exemplaire.IdExemplaire = Reservation.FkExemplaire
    WHERE DateRetour IS NULL
    AND IdEmprun IS NULL
    AND IdReservation IS NULL;

select * from Requete;
SELECT * from Reservation;

SELECT Titre, DateAcceptation, IdExemplaire, IdReservation, DATE_ADD(DateAcceptation, INTERVAL 7 DAY)as dateFin
    FROM Reservation, Oeuvre, Adherant, Exemplaire
    WHERE Oeuvre.IdLivre = Exemplaire.FkLivre
    AND Exemplaire.IdExemplaire = Reservation.FkExemplaire
    AND Reservation.FkAdherant = Adherant.IdAdherant;


SELECT Date_ADD(Maintenance, INTERVAL 7 DAY) as Maintenance From Maintenance;

SELECT * FROM Reservation
WHERE DATEADD(DateAcceptation, INTERVAL 7 DAY )< NOW();

SELECT NOW();