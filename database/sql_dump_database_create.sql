DROP
DATABASE IF EXISTS krautundrueben;
CREATE
DATABASE IF NOT EXISTS krautundrueben;
USE
krautundrueben;

CREATE TABLE kunde (
    kunde_id INTEGER NOT NULL,
    nachname VARCHAR(50),
    vorname VARCHAR(50),
    geburtsdatum DATE,
    strasse VARCHAR(50),
    haus_nr VARCHAR(6),
    plz VARCHAR(5),
    ort VARCHAR(50),
    telefon VARCHAR(25),
    email VARCHAR(50)
);

CREATE TABLE zutat (
    zutat_id INTEGER NOT NULL,
    zutat_name VARCHAR(50),
    mengeneinheit VARCHAR(25),
    nettopreis_ct DECIMAL(10, 2),
    bestand INTEGER,
    lieferant_id INTEGER,
    kalorien INTEGER,
    kohlenhydrate DECIMAL(10, 2),
    protein DECIMAL(10, 2)
);

CREATE TABLE bestellung (
    bestellung_id INTEGER AUTO_INCREMENT NOT NULL,
    kunde_id INTEGER,
    datum DATE,
    gesamtpreis_ct DECIMAL(10, 2),
    PRIMARY KEY (bestellung_id)
);

CREATE TABLE bestellungzutat (
    bestellung_id INTEGER NOT NULL,
    zutat_id INTEGER,
    menge INTEGER
);

CREATE TABLE lieferant (
    lieferant_id INTEGER NOT NULL,
    lieferant_name VARCHAR(50),
    strasse VARCHAR(50),
    haus_nr VARCHAR(6),
    plz VARCHAR(5),
    ort VARCHAR(50),
    telefon VARCHAR(25),
    email VARCHAR(50)
);

CREATE TABLE rezeptzutat (
    zutat_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

CREATE TABLE rezept (
    rezept_id INTEGER NOT NULL,
    rezept_name VARCHAR(50)
);

CREATE TABLE ernährungskategorie (
    kategorie_id INTEGER NOT NULL,
    kategorie_name VARCHAR(50)
);

CREATE TABLE rezepternährungskategorie (
    kategorie_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

CREATE TABLE beschränkung (
    beschränkung_id INTEGER NOT NULL,
    beschränkung_name VARCHAR(50)
);

CREATE TABLE rezeptbeschränkung (
    beschränkung_id INTEGER NOT NULL,
    rezept_id INTEGER NOT NULL
);

/******************************************************************************/
/***                              Primary Keys                              ***/
/******************************************************************************/

ALTER TABLE zutat
    ADD PRIMARY KEY (zutat_id);
ALTER TABLE kunde
    ADD PRIMARY KEY (kunde_id);
ALTER TABLE lieferant
    ADD PRIMARY KEY (lieferant_id);
ALTER TABLE bestellungzutat
    ADD PRIMARY KEY (bestellung_id, zutat_id);
ALTER TABLE rezept
    ADD PRIMARY KEY (rezept_id);
ALTER TABLE ernährungskategorie
    ADD PRIMARY KEY (kategorie_id);
ALTER TABLE beschränkung
    ADD PRIMARY KEY (beschränkung_id);

/******************************************************************************/
/***                              Foreign Keys                              ***/
/******************************************************************************/

ALTER TABLE zutat
    ADD FOREIGN KEY (lieferant_id) REFERENCES lieferant(lieferant_id);
ALTER TABLE bestellungzutat
    ADD FOREIGN KEY (bestellung_id) REFERENCES bestellung(bestellung_id);
ALTER TABLE bestellung
    ADD FOREIGN KEY (kunde_id) REFERENCES kunde(kunde_id);
ALTER TABLE bestellungzutat
    ADD FOREIGN KEY (zutat_id) REFERENCES zutat(zutat_id);
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
