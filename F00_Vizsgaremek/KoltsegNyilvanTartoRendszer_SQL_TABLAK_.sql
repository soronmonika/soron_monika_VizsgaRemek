CREATE DATABASE `KoltsegNyilvantartoRendszer_SoronMonika`
CHARACTER SET utf8mb4
COLLATE utf8mb4_hungarian_ci;

USE KoltsegNyilvantartoRendszer_SoronMonika;

CREATE TABLE Kategoriak(
Kategoria_Id CHAR(10) PRIMARY KEY,
Nev VARCHAR(100) NOT NULL,
Tipus VARCHAR(100) NOT NULL,
Csoportositas VARCHAR(100) NOT NULL
);

CREATE TABLE Gyerek(
Gyerek_Id CHAR(10) PRIMARY KEY,
Nev VARCHAR(50) NOT NULL,
Szuletesnap DATE
);

CREATE TABLE Kiadasok(
Kiadasok_Id CHAR(10) PRIMARY KEY,
Osszeg DECIMAL(10,2) NOT NULL,
Datum DATE NOT NULL,
Kategoria_Id CHAR(10) NOT NULL,
Gyerek_Id CHAR(10),
Megjegyzes VARCHAR(100),


CONSTRAINT FK_KiadasokId_Kategoria_Id
FOREIGN KEY (Kategoria_Id) REFERENCES Kategoriak(Kategoria_Id),

CONSTRAINT FK_Kiadasok_Gyerek
FOREIGN KEY (Gyerek_Id) REFERENCES Gyerek(Gyerek_Id)
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


