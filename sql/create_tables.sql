-- Lisää CREATE TABLE lauseet tähän tiedostoon
CREATE TABLE Kayttaja(
    id SERIAL PRIMARY KEY,
    nimi varchar(120) NOT NULL,
    password varchar(50) NOT NULL
);

CREATE TABLE Tehtava(
    id SERIAL PRIMARY KEY,
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    nimi varchar(120) NOT NULL,
    tarkeys int
);

CREATE TABLE Luokka(
    id SERIAL PRIMARY KEY,
    kayttaja_id INTEGER REFERENCES Kayttaja(id),
    tehtava_id INTEGER REFERENCES Tehtava(id),
    nimi varchar(120) NOT NULL
);
    
    