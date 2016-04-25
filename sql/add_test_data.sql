-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, password) VALUES ('teppo', 'testaaja');

INSERT INTO Tehtava (kayttaja_id, nimi, tarkeys) VALUES (1, 'pyykit', 2);
INSERT INTO Tehtava (nimi, tarkeys) VALUES ('tiskit', 4);
INSERT INTO Kategoria (nimi) VALUES ('kotitalous');