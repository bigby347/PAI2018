Create table Oeuvre (
	IdLivre integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Titre varchar(100)
	NOT NULL,
	Cote varchar(100),
	Publication integer,
	Description TEXT
); 

Create table Auteur (
	IdAuteur integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Nom varchar(100)
	NOT NULL,
	Prenom varchar(100)
);

Create table Ecrit (
	FkAuteur integer
	NOT NULL,
	FkLivre integer
	NOT NULL,
	PRIMARY KEY(FkAuteur, FkLivre),
	FOREIGN KEY (FkAuteur) REFERENCES Auteur(IdAuteur) ON UPDATE CASCADE,
	FOREIGN KEY (FkLivre) REFERENCES Oeuvre(IdLivre) ON UPDATE CASCADE
);

Create table MotClef (
	IdMotClef integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Nom varchar(100)
	NOT NULL
);

Create table Definition (
	FkMotClef integer
	NOT NULL,
	FkLivre integer
	NOT NULL,
	PRIMARY KEY(FkMotClef, FkLivre),
	FOREIGN KEY (FkMotClef) REFERENCES MotClef(IdMotClef) ON UPDATE CASCADE,
	FOREIGN KEY (FkLivre) REFERENCES Oeuvre(IdLivre) ON UPDATE CASCADE
);


Create table Exemplaire (
	IdExemplaire integer
	PRIMARY KEY
	AUTO_INCREMENT,
	FkLivre integer
	NOT NULL, 
	Achat date,
	FOREIGN KEY (FkLivre) REFERENCES Oeuvre(IdLivre) ON UPDATE CASCADE
);


Create table Adherant (
	IdAdherant integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Mail VARCHAR(320) Unique,
	MDP varchar(100)
	NOT NULL,
	Nom varchar(100)
	NOT NULL,
	Prenom varchar(100)
	NOT NULL,
	Adresse varchar(100)
	NOT NULL,
	adhesion date,
	cotisation date
);

Create table Admin (
	IdAdmin integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Mail VARCHAR(320) Unique,
	MDP varchar(100)
	NOT NULL,
	Nom varchar(100)
	NOT NULL,
	Prenom varchar(100)
	NOT NULL,
	Adresse varchar(100)
	NOT NULL
);


Create table TypeNotif (
	IdTypeNotif integer
	PRIMARY KEY
	AUTO_INCREMENT,
	Nom varchar(100)
	NOT NULL
);

Create table Notif (
	IdNotif integer
	PRIMARY KEY
	AUTO_INCREMENT,
	FkAdherant integer
	NOT NULL,
	FkTypeNotif integer
	NOT NULL,
	Commentaire TEXT,
	FOREIGN KEY (FkTypeNotif) REFERENCES TypeNotif(IdTypeNotif) ON UPDATE CASCADE,
	FOREIGN KEY (FkAdherant) REFERENCES Adherant(IdAdherant) ON UPDATE CASCADE
);

Create table Emprun (
	IdEmprun integer
	PRIMARY KEY
	AUTO_INCREMENT,
	FkAdherant integer
	NOT NULL,
	FkExemplaire integer
	NOT NULL,
	DatePret date NOT NULL,
	DateRetour date,
	Renouvelement integer,
	FOREIGN KEY (FkAdherant) REFERENCES Adherant(IdAdherant) ON UPDATE CASCADE,
	FOREIGN KEY (FkExemplaire) REFERENCES Exemplaire(IdExemplaire) ON UPDATE CASCADE
);


Create table Renouvelement(
	FkEmprun integer,
	DateDemande date,
	FOREIGN KEY (FkEmprun) REFERENCES Emprun(IdEmprun) ON UPDATE CASCADE
);




Create table Requete (
	IdRequete integer
	PRIMARY KEY
	AUTO_INCREMENT,
	FkAdherant integer
	NOT NULL,
	FkLivre integer
	NOT NULL,
	Requete date NOT NULL,
	FOREIGN KEY (FkAdherant) REFERENCES Adherant(IdAdherant) ON UPDATE CASCADE,
	FOREIGN KEY (FkLivre) REFERENCES Oeuvre(IdLivre) ON UPDATE CASCADE
);


Create table Reservation (
	IdReservation integer
	PRIMARY KEY
	AUTO_INCREMENT,
	FkAdherant integer
	NOT NULL,
	FkLivre integer
	NOT NULL,
	DateRequete date NOT NULL,
	DateAcceptation date,
	FOREIGN KEY (FkAdherant) REFERENCES Adherant(IdAdherant) ON UPDATE CASCADE,
	FOREIGN KEY (FkLivre) REFERENCES Oeuvre(IdLivre) ON UPDATE CASCADE
);



 

