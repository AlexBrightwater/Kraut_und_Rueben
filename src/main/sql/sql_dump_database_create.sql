DROP DATABASE IF EXISTS krautundrueben;
CREATE DATABASE IF NOT EXISTS krautundrueben;
USE krautundrueben;

CREATE TABLE kunde (
    kunde_id INTEGER NOT NULL AUTO_INCREMENT,
    nachname VARCHAR(50) NOT NULL,
    vorname VARCHAR(50) NOT NULL,
    geburtsdatum DATE,
    strasse VARCHAR(50) NOT NULL,
    haus_nr VARCHAR(6) NOT NULL,
    plz VARCHAR(5) NOT NULL,
    ort VARCHAR(50) NOT NULL,
    telefon VARCHAR(25),
    email VARCHAR(50) UNIQUE,
    passwort VARCHAR(256) NOT NULL,
    PRIMARY KEY(kunde_id)
);

CREATE TABLE zutat (
    zutat_id INTEGER NOT NULL AUTO_INCREMENT,
    zutat_name VARCHAR(50),
    mengeneinheit VARCHAR(25),
    nettopreis_ct INTEGER NOT NULL,
    bestand INTEGER,
    gewicht INTEGER,
    lieferant_id INTEGER NOT NULL,
    kalorien INTEGER,
    kohlenhydrate INTEGER,
    protein INTEGER,
    PRIMARY KEY(zutat_id)
);

CREATE TABLE bestellung (
    bestellung_id INTEGER AUTO_INCREMENT NOT NULL,
    kunde_id INTEGER NOT NULL ,
    datum DATE NOT NULL ,
    gesamtpreis_ct INTEGER NOT NULL ,
    PRIMARY KEY (bestellung_id)
);

CREATE TABLE rezept (
    rezept_id INTEGER NOT NULL AUTO_INCREMENT,
    rezept_name VARCHAR(50),
    PRIMARY KEY(rezept_id)
);

CREATE TABLE bestellungzutat (
    bestellung_id INTEGER NOT NULL,
    zutat_id INTEGER,
    menge INTEGER,
    PRIMARY KEY(bestellung_id, zutat_id)
);

CREATE TABLE bestellungrezept (
    bestellung_id INTEGER NOT NULL,
    rezept_id INTEGER,
    menge INTEGER,
    PRIMARY KEY(bestellung_id, rezept_id)
);

CREATE TABLE lieferant (
    lieferant_id INTEGER NOT NULL AUTO_INCREMENT,
    lieferant_name VARCHAR(50) NOT NULL,
    strasse VARCHAR(50) NOT NULL,
    haus_nr VARCHAR(6) NOT NULL,
    plz VARCHAR(5) NOT NULL,
    ort VARCHAR(50) NOT NULL,
    telefon VARCHAR(25),
    email VARCHAR(50),
    PRIMARY KEY(lieferant_id)
);

CREATE TABLE rezeptzutat (
    zutat_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

CREATE TABLE ernährungskategorie (
    kategorie_id INTEGER NOT NULL AUTO_INCREMENT,
    kategorie_name VARCHAR(50),
    PRIMARY KEY(kategorie_id)
);

CREATE TABLE rezepternährungskategorie (
    kategorie_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

CREATE TABLE beschränkung (
    beschränkung_id INTEGER NOT NULL AUTO_INCREMENT,
    beschränkung_name VARCHAR(50),
    PRIMARY KEY(beschränkung_id)
);

CREATE TABLE rezeptbeschränkung (
    beschränkung_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

/******************************************************************************/
/***                              Foreign Keys                              ***/
/******************************************************************************/

ALTER TABLE zutat
    ADD FOREIGN KEY (lieferant_id) REFERENCES lieferant(lieferant_id);
ALTER TABLE bestellungzutat
    ADD FOREIGN KEY (bestellung_id) REFERENCES bestellung(bestellung_id);
ALTER TABLE bestellungrezept
    ADD FOREIGN KEY (bestellung_id) REFERENCES bestellung(bestellung_id);
ALTER TABLE bestellung
    ADD FOREIGN KEY (kunde_id) REFERENCES kunde(kunde_id);
ALTER TABLE bestellungzutat
    ADD FOREIGN KEY (zutat_id) REFERENCES zutat(zutat_id);
ALTER TABLE bestellungrezept
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
ALTER TABLE rezeptzutat
    ADD FOREIGN KEY (zutat_id) REFERENCES zutat(zutat_id);
ALTER TABLE rezeptzutat
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
ALTER TABLE rezepternährungskategorie
    ADD FOREIGN KEY (kategorie_id) REFERENCES ernährungskategorie(kategorie_id);
ALTER TABLE rezepternährungskategorie
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
ALTER TABLE rezeptbeschränkung
    ADD FOREIGN KEY (beschränkung_id) REFERENCES beschränkung(beschränkung_id);
ALTER TABLE rezeptbeschränkung
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
ALTER TABLE rezepternährungskategorie
    ADD FOREIGN KEY (kategorie_id) REFERENCES ernährungskategorie(kategorie_id);
ALTER TABLE rezepternährungskategorie
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
ALTER TABLE rezeptbeschränkung
    ADD FOREIGN KEY (beschränkung_id) REFERENCES beschränkung(beschränkung_id);
ALTER TABLE rezeptbeschränkung
    ADD FOREIGN KEY (rezept_id) REFERENCES rezept(rezept_id);
