-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, password) VALUES ('teppo', 'testaaja');

INSERT INTO Kategoria (nimi) VALUES ('kotitalous');
INSERT INTO Tehtava (kategoria_id, nimi, tarkeys) VALUES (1, 'pyykit', 2);
INSERT INTO Tehtava (kategoria_id, nimi, tarkeys) VALUES (1, 'tiskit', 4);
