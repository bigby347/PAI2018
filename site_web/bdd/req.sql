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
GROUP BY Oeuvre.IdLivre;
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
Select Titre,DateRequete
From Reservation, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Reservation.FkLivre
And Reservation.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = 2
And Reservation.DateAcceptation is null;
/*	*/


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





/*	*/
