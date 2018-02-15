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
Select IdNotif, TypeNotif.Nom , Notif.Commentaire
From Notif, TypeNotif , Adherant 
where IdAdherant = ???
AND IdAdherant = Notif.FkAdherant
AND IdTypeNotif = Notif.FkTypeNotif; 

/* Historique */ 
/* Pret en cour */
/* Contact */
 
