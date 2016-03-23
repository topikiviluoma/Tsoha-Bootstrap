-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY,
    nimi varchar(120) NOT NULL,
    password varchar(50) NOT NULL
);