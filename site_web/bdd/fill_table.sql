/* Ajout d'adherants */

INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('test@domain.com', 'Name', 'Firstname','test123','1 rue du test 00000 Testville',STR_TO_DATE('01-01-2018', '%d-%m-%Y'),STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('putzu@gmail.com', 'Putzu', 'Alex','putzualex','258 rue de luminy 13009 Marseille',STR_TO_DATE('01-01-2017', '%d-%m-%Y'),STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('falques@outlook.com', 'Falquès', 'Théo','falquèsthéo','2 Avenue de la repasse 04001 Manosque',STR_TO_DATE('16-02-2016', '%d-%m-%Y'),STR_TO_DATE('01-03-2018', '%d-%m-%Y'));
INSERT INTO Adherant(Mail,Nom,Prenom,MDP,Adresse,adhesion,cotisation)
VALUES ('finch@machin.com', 'Finch', 'Harold','samaritan','East 30th St and Lexington Ave.',STR_TO_DATE('24-02-2005', '%d-%m-%Y'),STR_TO_DATE('17-11-2015', '%d-%m-%Y'));
/* Ajout d'Admin */
INSERT INTO Admin(Nom,Prenom,MDP,Adresse)
VALUES ('Admin', 'god','azerty123','1 rue du test 00000 Testville');
/*Ajout Ouevre */
INSERT INTO Oeuvre(Titre, Cote, Publication)
VALUES ('Le sorceleur','LAS1996','1996');
