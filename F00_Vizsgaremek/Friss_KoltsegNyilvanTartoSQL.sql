CREATE DATABASE `KoltsegNyilvantartoRendszer_SoronMonika`
CHARACTER SET utf8mb4
COLLATE utf8mb4_hungarian_ci;

USE KoltsegNyilvantartoRendszer_SoronMonika;

CREATE TABLE Kategoriak(
Kategoria_Id CHAR(10) PRIMARY KEY,
Nev VARCHAR(100) NOT NULL,
Tipus ENUM('Bevétel', 'Kiadás') NOT NULL,
Csoportositas VARCHAR(100) NOT NULL
);

CREATE TABLE Kiadasok(
Kiadasok_Id CHAR(10) PRIMARY KEY,
Osszeg DECIMAL(10,2) NOT NULL,
Datum DATE NOT NULL,
Kategoria_Id CHAR(10) NOT NULL,
Megjegyzes VARCHAR(100),


CONSTRAINT FK_KiadasokId_Kategoria_Id
FOREIGN KEY (Kategoria_Id) REFERENCES Kategoriak(Kategoria_Id)
);

CREATE TABLE Bevetelek(
Bevetelek_Id CHAR(10) PRIMARY KEY,
Osszeg DECIMAL(10,2) NOT NULL,
Datum DATE NOT NULL,
Kategoria_Id CHAR(10) NOT NULL,
Megjegyzes VARCHAR(100),

CONSTRAINT FK_Bevetelek_kategoriak
FOREIGN KEY (Bevetelek_Id) REFERENCES Kategoriak(Kategoria_Id)
);


