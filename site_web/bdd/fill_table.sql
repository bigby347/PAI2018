/* Ajout d'Adherents */

INSERT INTO Adherent (Mail, Nom, Prenom, MDP, Adresse, adhesion, cotisation)
VALUES ('test@domain.com', 'Name', 'Firstname', 'test123', '1 rue du test 00000 Testville',
        STR_TO_DATE('01-01-2018', '%d-%m-%Y'), STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherent (Mail, Nom, Prenom, MDP, Adresse, adhesion, cotisation)
VALUES ('putzu@gmail.com', 'Putzu', 'Alex', 'putzualex', '258 rue de luminy 13009 Marseille',
        STR_TO_DATE('01-01-2017', '%d-%m-%Y'), STR_TO_DATE('01-01-2018', '%d-%m-%Y'));
INSERT INTO Adherent (Mail, Nom, Prenom, MDP, Adresse, adhesion, cotisation)
VALUES ('falques@outlook.com', 'Falquès', 'Théo', 'falquèsthéo', '2 Avenue de la repasse 04001 Manosque',
        STR_TO_DATE('16-02-2016', '%d-%m-%Y'), STR_TO_DATE('01-03-2018', '%d-%m-%Y'));
INSERT INTO Adherent (Mail, Nom, Prenom, MDP, Adresse, adhesion, cotisation)
VALUES ('finch@machin.com', 'Finch', 'Harold', 'samaritan', 'East 30th St and Lexington Ave.',
        STR_TO_DATE('24-02-2005', '%d-%m-%Y'), STR_TO_DATE('17-11-2015', '%d-%m-%Y'));

/* Ajout d'Admin */


INSERT INTO Admin (Mail, Nom, Prenom, MDP, Adresse)
VALUES ('admin@master.com', 'Admin', 'god', 'azerty123', '1 rue du test 00000 Testville');

INSERT INTO Admin (Mail, Nom, Prenom, MDP, Adresse)
VALUES ('ad@min.bg', 'ad', 'bg', 'min', '46 rue de la boustifialle');

/*Ajout Ouevre */
INSERT INTO Oeuvre (Titre, Cote, Publication, Description)
VALUES ('Germinal', 'GEZ1885', '1885', 'Fils de Gervaise Macquart et de son amant Auguste Lantier,
                                    le jeune Étienne Lantier s''est fait renvoyer de son travail pour avoir donné une gifle à son employeur.
                                    Chômeur, il part dans le Nord de la France à la recherche d’un nouvel emploi.
                                    Il se fait embaucher aux mines de Montsou et connaît des conditions de travail effroyables
                                    (pour écrire ce roman, Émile Zola s''est beaucoup documenté sur le travail dans les mines).');
INSERT INTO Oeuvre (Titre, Cote, Publication, Description)
VALUES ('Le Dernier Vœu', 'LRS1993', '1993', 'Le Dernier Vœu ne raconte pas une unique histoire linéaire mais une suite de courtes aventures dont le point commun est de mettre en scène un même héros, Geralt de Riv, dit également le Boucher de Blaviken. Ce personnage haut en couleur, récurrent dans l''œuvre de Sapkowski, est un sorceleur,
un membre d\'une caste de mutants mercenaires dotés de capacités surhumaines grâce à la magie et des manipulations génétiques. Le monde dans lequel vit Geralt de Riv est en effet infesté de créatures maléfiques de toutes sortes : goules, vampires, loups-garous, etc.
Étant enfant,il a subi un rigoureux entraînement à base de potions et d''herbes magiques qui provoqua en lui une mutation développant ses aptitudes physiques ainsi que ses cinq sens.
Plus rapide, plus fort, Geralt peut utiliser ses potions pour augmenter ses capacités de combats. La mutation fit également perdre toute coloration à ses cheveux qui devinrent entièrement blancs. Depuis lors, se comportant souvent comme un véritable détective des affaires magiques, il se livre à une chasse impitoyable des monstres contre rétribution.
À cet effet, il est armé de deux épées, l''une de fer (pour les Hommes) et l''autre d''argent (pour les monstres).
Cynique et désabusé, Geralt applique une morale toute personnelle qui suit la ligne du « moindre mal ».

');


/*Ajout auteur */
INSERT INTO Auteur (Nom, Prenom)
VALUES ('Zola', 'Emile');
INSERT INTO Auteur (Nom, Prenom)
VALUES ('Andrzej' ,'Sapkowski');


INSERT INTO Exemplaire (FkLivre, Achat)
VALUES (1, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));
INSERT INTO Exemplaire (FkLivre, Achat)
VALUES (2, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

/*Ajout Ecrit*/
INSERT INTO Ecrit (FkAuteur, FkLivre)
VALUES (1, 1);
INSERT INTO Ecrit (FkAuteur, FkLivre)
VALUES (2, 2);

/*Ajout requete*/

INSERT INTO Requete (FkLivre, FkAdherent, Requete)
VALUES (1, 2, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

/*Ajout requete*/

INSERT INTO Reservation (FkAdherent, FkLivre, DateRequete, DateAcceptation)
VALUES (2, 5, STR_TO_DATE('24-02-2018', '%d-%m-%Y'), NULL);

INSERT INTO Reservation (FkAdherent, FkLivre, DateRequete, DateAcceptation)
VALUES (3, 5, STR_TO_DATE('24-02-2018', '%d-%m-%Y'), NULL);

INSERT INTO Reservation (FkAdherent, FkLivre, DateRequete, DateAcceptation)
VALUES (2, 5, STR_TO_DATE('24-02-2018', '%d-%m-%Y'), STR_TO_DATE('24-03-2018', '%d-%m-%Y'));


INSERT INTO Exemplaire (FkLivre, Achat)
VALUES (1, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO Emprun (FkAdherent, FkExemplaire, DatePret)
VALUES (2, 1, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO Emprun (FkAdherent, FkExemplaire, DatePret)
VALUES (2, 1, STR_TO_DATE('24-02-2018', '%d-%m-%Y'));

INSERT INTO TypeNotif (Nom)
VALUES ('Requete acceptée');

INSERT INTO TypeNotif (Nom)
VALUES ('Message Admin');

INSERT INTO Notif (FkAdherent, FkTypeNotif, Commentaire)
VALUES (2, 2, 'Salut mon ami')