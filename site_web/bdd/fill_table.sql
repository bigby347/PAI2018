/* Ajout d'Adherents */

INSERT INTO Adherent(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('test@domain.com', 'Name', 'Firstname','test123','1 rue du test 00000 Testville',STR_TO_DATE('01-01-2018', '%d-%m-%Y'),STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherent(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('putzu@gmail.com', 'Putzu', 'Alex','putzualex','258 rue de luminy 13009 Marseille',STR_TO_DATE('01-01-2017', '%d-%m-%Y'),STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherent(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('falques@outlook.com', 'Falquès', 'Théo','falquèsthéo','2 Avenue de la repasse 04001 Manosque',STR_TO_DATE('16-02-2016', '%d-%m-%Y'),STR_TO_DATE('01-03-2018', '%d-%m-%Y'));
INSERT INTO Adherent(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('finch@machin.com', 'Finch', 'Harold','samaritan','East 30th St and Lexington Ave.',STR_TO_DATE('24-02-2005', '%d-%m-%Y'),STR_TO_DATE('17-11-2015', '%d-%m-%Y'));

/* Ajout d'Admin */


INSERT INTO Admin(Mail,Nom,Prenom,MDP,Adresse)
VALUES ('admin@master.com','Admin', 'god','azerty123','1 rue du test 00000 Testville');

INSERT INTO Admin(Mail,Nom,Prenom,MDP,Adresse)
VALUES ('ad@min.bg','ad', 'bg','min','46 rue de la boustifialle');

/*Ajout Ouevre */
INSERT INTO Oeuvre(Titre, Cote, Publication,Description)
VALUES ('Germinal','GEZ1885','1885','Fils de Gervaise Macquart et de son amant Auguste Lantier,
                                    le jeune Étienne Lantier s''est fait renvoyer de son travail pour avoir donné une gifle à son employeur.
                                    Chômeur, il part dans le Nord de la France à la recherche d’un nouvel emploi.
                                    Il se fait embaucher aux mines de Montsou et connaît des conditions de travail effroyables
                                    (pour écrire ce roman, Émile Zola s''est beaucoup documenté sur le travail dans les mines).');
INSERT INTO Oeuvre(Titre, Cote, Publication,Description)
VALUES ('Germinal','GEZ1885','1885','Fils de Gervaise Macquart et de son amant Auguste Lantier,
                                    le jeune Étienne Lantier s''est fait renvoyer de son travail pour avoir donné une gifle à son employeur.
                                    Chômeur, il part dans le Nord de la France à la recherche d’un nouvel emploi.
                                    Il se fait embaucher aux mines de Montsou et connaît des conditions de travail effroyables
                                    (pour écrire ce roman, Émile Zola s''est beaucoup documenté sur le travail dans les mines).');
INSERT INTO Oeuvre(Titre, Cote, Publication,Description)
VALUES ('Germinal','GEZ1885','1885','Fils de Gervaise Macquart et de son amant Auguste Lantier,
                                    le jeune Étienne Lantier s''est fait renvoyer de son travail pour avoir donné une gifle à son employeur.
                                    Chômeur, il part dans le Nord de la France à la recherche d’un nouvel emploi.
                                    Il se fait embaucher aux mines de Montsou et connaît des conditions de travail effroyables
                                    (pour écrire ce roman, Émile Zola s''est beaucoup documenté sur le travail dans les mines).');
INSERT INTO Oeuvre(Titre, Cote, Publication,Description)
VALUES ('Germinal','GEZ1885','1885','Fils de Gervaise Macquart et de son amant Auguste Lantier,
                                    le jeune Étienne Lantier s''est fait renvoyer de son travail pour avoir donné une gifle à son employeur.
                                    Chômeur, il part dans le Nord de la France à la recherche d’un nouvel emploi.
                                    Il se fait embaucher aux mines de Montsou et connaît des conditions de travail effroyables
                                    (pour écrire ce roman, Émile Zola s''est beaucoup documenté sur le travail dans les mines).');


/*Ajout auteur */
INSERT INTO Auteur(Nom, Prenom)
    Values('Zola','Emile');
INSERT INTO Auteur(Nom,Prenom)
    VALUES('auteur1','test');

/*Ajout Ecrit*/
INSERT INTO Ecrit(FkAuteur, FkLivre)
Values(1,1);
INSERT INTO Ecrit(FkAuteur, FkLivre)
Values(2,1);

/*Ajout requete*/

INSERT INTO Requete(FkLivre,FkAdherent,Requete)
Values(1,2,STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

/*Ajout requete*/

INSERT INTO Reservation(FkAdherent,FkLivre,DateRequete,DateAcceptation)
Values(2,5,STR_TO_DATE('24-02-2018', '%d-%m-%Y'),NULL );

INSERT INTO Reservation(FkAdherent,FkLivre,DateRequete,DateAcceptation)
Values(3,5,STR_TO_DATE('24-02-2018', '%d-%m-%Y'),NULL );

INSERT INTO Reservation(FkAdherent,FkLivre,DateRequete,DateAcceptation)
Values(2,5,STR_TO_DATE('24-02-2018', '%d-%m-%Y'),STR_TO_DATE('24-03-2018', '%d-%m-%Y') );



INSERT INTO  Exemplaire(FkLivre,Achat)
Values(1,STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO  Emprun(FkAdherent,FkExemplaire,DatePret)
Values(2,1,STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO  Emprun(FkAdherent,FkExemplaire,DatePret)
Values(2,1,STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO TypeNotif(Nom)
VALUES ('Requete acceptée');

INSERT INTO TypeNotif(Nom)
VALUES ('Message Admin');

INSERT INTO Notif(FkAdherent,FkTypeNotif, Commentaire)
VALUES (2,2,'Salut mon ami')