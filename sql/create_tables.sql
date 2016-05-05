-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY,
    nimi varchar(120) NOT NULL,
    password varchar(50) NOT NULL
);

CREATE TABLE Kategoria(
    id SERIAL PRIMARY KEY,
    nimi varchar(120) NOT NULL
);

CREATE TABLE Tehtava(
    id SERIAL PRIMARY KEY,
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    kategoria_id INTEGER REFERENCES Kategoria(id),
    nimi varchar(120) NOT NULL,
    tarkeys int
);


    
    