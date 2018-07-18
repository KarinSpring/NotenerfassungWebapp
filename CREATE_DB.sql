CREATE DATABASE notenverwaltungssystem;

CREATE TABLE adresse (
	adresseId int auto_increment PRIMARY KEY,
	strasse text,
	nummer text
);

CREATE TABLE ort (
	ortId int auto_increment PRIMARY KEY,
	plz int,
	ort text
);

CREATE TABLE klasse (
	klasseId int auto_increment PRIMARY KEY,
	name text
);

CREATE TABLE modul (
	modulId int auto_increment PRIMARY KEY,
	name text,
	beschreibung text,
	typ text
);

CREATE TABLE schueler (
	schuelerId int auto_increment PRIMARY KEY,
	vorname text,
	name text,
	fkAdresseId int,
	FOREIGN KEY (fkAdresseId) REFERENCES adresse(adresseId),
	fkOrtId int,
	FOREIGN KEY (fkOrtId) REFERENCES ort(ortId),
	fkKlasseId int,
	FOREIGN KEY (fkKlasseId) REFERENCES klasse(klasseId)
);

CREATE TABLE pruefung (
	pruefungId int auto_increment PRIMARY KEY,
	name text,
	fkModulId int,
	FOREIGN KEY(fkModulId) REFERENCES modul(modulId),
	fkSchuelerId int,
	FOREIGN KEY(fkSchuelerId) REFERENCES schueler(schuelerId),
	note DOUBLE,
	gewichtung int
);

CREATE TABLE rolle (
    rolleId int auto_increment PRIMARY KEY,
    rolle text
);

CREATE TABLE user (
    userId int auto_increment PRIMARY KEY,
    name text,
    passwort text,
    fkRolleId int,
    FOREIGN KEY(fkRolleId) REFERENCES rolle(rolleId)
 );