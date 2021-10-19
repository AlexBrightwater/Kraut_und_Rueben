USE
krautundrueben;

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2001, 'Wellensteyn', 'Kira', '1990-05-05', 'Eppendorfer Landstrasse', '104', '20249', 'Hamburg', '040/443322', 'k.wellensteyn@yahoo.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2002, 'Foede', 'Dorothea', '2000-03-24', 'Ohmstraße', '23', '22765', 'Hamburg', '040/543822', 'd.foede@web.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2003, 'Leberer', 'Sigrid', '1989-09-21', 'Bilser Berg', '6', '20459', 'Hamburg', '0175/1234588', 'sigrid@leberer.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2004, 'Soerensen', 'Hanna', '1974-04-03', 'Alter Teichweg', '95', '22049', 'Hamburg', '040/634578', 'h.soerensen@yahoo.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2005, 'Schnitter', 'Marten', '1964-04-17', 'Stübels', '10', '22835', 'Barsbüttel', '0176/447587', 'schni_mart@gmail.com');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2006, 'Maurer', 'Belinda', '1978-09-09', 'Grotelertwiete', '4a', '21075', 'Hamburg', '040/332189', 'belinda1978@yahoo.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2007, 'Gessert', 'Armin', '1978-01-29', 'Küstersweg', '3', '21079', 'Hamburg', '040/67890', 'armin@gessert.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2008, 'Haessig', 'Jean-Marc', '1982-08-30', 'Neugrabener Bahnhofstraße', '30', '21149', 'Hamburg', '0178-67013390', 'jm@haessig.de');

INSERT INTO kunde (kunde_id, nachname, vorname, geburtsdatum, strasse, haus_nr, plz, ort, telefon, email)
VALUES (2009, 'Urocki', 'Eric', '1999-12-04', 'Elbchaussee', '228', '22605', 'Hamburg', '0152-96701390', 'urocki@outlook.de');

INSERT INTO lieferant (lieferant_id, lieferant_name, strasse, haus_nr, plz, ort, telefon, email)
values (101, 'Bio-Hof Müller', 'Dorfstraße', '74', '24354', 'Weseby', '04354-9080', 'mueller@biohof.de');

INSERT INTO lieferant (lieferant_id, lieferant_name, strasse, haus_nr, plz, ort, telefon, email)
values (102, 'Obst-Hof Altes Land', 'Westerjork 74', '76', '21635', 'Jork', '04162-4523', 'info@biohof-altesland.de');

INSERT INTO lieferant (lieferant_id, lieferant_name, strasse, haus_nr, plz, ort, telefon, email)
values (103, 'Molkerei Henning', 'Molkereiwegkundekunde', '13', '19217', 'Dechow', '038873-8976', 'info@molkerei-henning.de');

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1001, 'Zucchini', 'Stück', 89, 100, 101, 19, 2, 1.6);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1002, 'Zwiebel', 'Stück', 15, 50, 101, 28, 4.9, 1.20);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1003, 'Tomate', 'Stück', 45, 50, 101, 18, 2.6, 1);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1004, 'Schalotte', 'Stück', 20, 500, 101, 25, 3.3, 1.5);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1005, 'Karotte', 'Stück', 30, 500, 101, 41, 10, 0.9);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1006, 'Kartoffel', 'Stück', 15, 1500, 101, 71, 14.6, 2);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1007, 'Rucola', 'Bund', 90, 10, 101, 27, 2.1, 2.6);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1008, 'Lauch', 'Stück', 120, 35, 101, 29, 3.3, 2.1);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1009, 'Knoblauch', 'Stück', 25, 250, 101, 141, 28.4, 6.1);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1010, 'Basilikum', 'Bund', 130, 10, 101, 41, 5.1, 3.1);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1011, 'Süßkartoffel', 'Stück', 200, 200, 101, 86, 20, 1.6);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (1012, 'Schnittlauch', 'Bund', 90, 10, 101, 28, 1, 3);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (2001, 'Apfel', 'Stück', 120, 750, 102, 54, 14.4, 0.3);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (3001, 'Vollmilch. 3.5%', 'Liter', 150, 50, 103, 65, 4.7, 3.4);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (3002, 'Mozzarella', 'Packung', 350, 20, 103, 241, 1, 18.1);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (3003, 'Butter', 'Stück', 300, 50, 103, 741, 0.6, 0.7);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (4001, 'Ei', 'Stück', 40, 300, 102, 137, 1.5, 11.9);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (5001, 'Wiener Würstchen', 'Paar', 180, 40, 101, 331, 1.2, 9.9);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (9001, 'Tofu-Würstchen', 'Stück', 180, 20, 103, 252, 7, 17);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (6408, 'Couscous', 'Packung', 190, 15, 102, 351, 67, 12);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (7043, 'Gemüsebrühe', 'Würfel', 20, 4000, 101, 1, 0.5, 0.5);

INSERT INTO zutat (zutat_id, zutat_name, mengeneinheit, nettopreis_ct, bestand, lieferant_id, kalorien, kohlenhydrate, protein)
VALUES (6300, 'Kichererbsen', 'Dose', 100, 400, 103, 150, 21.2, 9);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2001, '2020-07-01', 621);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2002, '2020-07-08', 3296);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2003, '2020-08-01', 2408);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2004, '2020-08-02', 1990);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2005, '2020-08-02', 647);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2006, '2020-08-10', 696);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2007, '2020-08-10', 241);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2008, '2020-08-10', 1380);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2009, '2020-08-10', 867);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2007, '2020-08-15', 1798);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2005, '2020-08-12', 867);

INSERT INTO bestellung (kunde_id, datum, gesamtpreis_ct)
VALUES (2003, '2020-08-13', 2087);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (1, 1001, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (1, 1002, 3);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (1, 1006, 2);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (1, 1004, 3);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (2, 9001, 10);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (2, 1005, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (2, 1003, 4);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (2, 6408, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (3, 6300, 15);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (3, 3001, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (4, 5001, 7);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (4, 3003, 2);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (5, 1002, 4);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (5, 1004, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (5, 1001, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (7, 1009, 9);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (6, 1010, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (8, 1012, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (8, 1008, 7);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (9, 1007, 4);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (9, 1012, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (10, 1011, 7);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (10, 4001, 7);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (11, 5001, 2);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (11, 1012, 5);

INSERT INTO bestellungzutat(bestellung_id, zutat_id, menge)
VALUES (12, 1010, 15);

INSERT INTO rezept(rezept_id, rezept_name)
VALUES (1, 'Caesersalat');

INSERT INTO rezept(rezept_id, rezept_name)
VALUES (2, 'Tomatensalat');

INSERT INTO rezept(rezept_id, rezept_name)
VALUES (3, 'Gemüseeintopf');

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1001, 1);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1002, 1);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1005, 1);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1007, 1);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1008, 1);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1001, 2);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1002, 2);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1003, 2);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1004, 2);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (4001, 2);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1001, 3);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1003, 3);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1005, 3);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1006, 3);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1008, 3);

INSERT INTO rezeptzutat(zutat_id, rezept_id)
VALUES (1010, 3);

INSERT INTO ernährungskategorie(kategorie_id, kategorie_name)
VALUES (1, 'Vegan');

INSERT INTO ernährungskategorie(kategorie_id, kategorie_name)
VALUES (2, 'Vegetarisch');

INSERT INTO ernährungskategorie(kategorie_id, kategorie_name)
VALUES (3, 'Frutarisch');

INSERT INTO rezepternährungskategorie(kategorie_id, rezept_id)
VALUES (1, 1);

INSERT INTO rezepternährungskategorie(kategorie_id, rezept_id)
VALUES (2, 1);

INSERT INTO rezepternährungskategorie(kategorie_id, rezept_id)
VALUES (2, 2);

INSERT INTO beschränkung(beschränkung_id, beschränkung_name)
VALUES (1, 'Laktose');

INSERT INTO beschränkung(beschränkung_id, beschränkung_name)
VALUES (2, 'Gluten');

INSERT INTO beschränkung(beschränkung_id, beschränkung_name)
VALUES (3, 'Erdnuss');

INSERT INTO rezeptbeschränkung(beschränkung_id, rezept_id)
VALUES (1, 1);

INSERT INTO rezeptbeschränkung(beschränkung_id, rezept_id)
VALUES (2, 1);

INSERT INTO rezeptbeschränkung(beschränkung_id, rezept_id)
VALUES (2, 2);
COMMIT WORK;
