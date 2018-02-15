/* Adherant */
/* Catalogue */ 

Select Oeuvre.IdLivre, Oeuvre.Nom, Oeuvre.Cote, Year(Oeuvre.Publication), group_concat(Auteur.Nom, Auteur.Prenom , ','),  group_concat(MotClef.Nom, ',')
From Oeuvre, Ecrit, Auteur , Definition, Motclef
Where Oeuvre.IdLivre = Ecrit.FkLivre
And Ecrit.FkAuteur = Auteur.IdAuteur 
And Definition.FkLivre = Oeuvre.IdLivre
And Definition.FkMotClef = MotClef.IdMotClef 
And Auteur.IdAuteur = ???
And MotClef.IdMotClef = ????
LIMIT 20 OFSET 0;



/* Notif */ 
Select IdNotif, TypeNotif.Nom as Type, Notif.Commentaire
From Notif, TypeNotif , Adherant 
where IdAdherant = ???
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; 

/* Historique */ 
Select * 
From Emprun, Exemplaire, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Exemplaire.FkLivre
And Livre.IdExemplaire = Emprun.FkExemplaire
And Emprun.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = ???
And Emprun.DateRetour IS NOT NULL;

/* Pret en cour */
Select * 
From Emprun, Exemplaire, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Exemplaire.FkLivre
And Livre.IdExemplaire = Emprun.FkExemplaire
And Emprun.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = ???
And Emprun.DateRetour IS NULL;

/* reservation */
Select * 
From Reservation, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Reservation.FkLivre
And Reservation.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = ???
And Reservation.DateAcceptation is null;

/* Requete/demande */
Select * 
From Requete, Oeuvre, Adherant 
Where Oeuvre.IdLivre = Requete.FkLivre
And Requete.FkAdherant = Adherant.IdAdherant
And Adherant.IdAdherant = ???;

/* Contact */
 
Select * from Admin; 
