CREATE DATABASE `KoltsegNyilvantartoRendszer_SoronMonika`
CHARACTER SET utf8mb4
COLLATE utf8mb4_hungarian_ci;

USE KoltsegNyilvantartoRendszer_SoronMonika;

CREATE TABLE Kategoriak(
Kategoria_Id VARCHAR(20) PRIMARY KEY,
Nev VARCHAR(100) NOT NULL,
Tipus ENUM('Bevetel', 'Kiadas') NOT NULL,
Csoportositas VARCHAR(100) NOT NULL
);

CREATE TABLE Kiadasok(
Kiadasok_Id VARCHAR(20) PRIMARY KEY,
Osszeg DECIMAL(10,2) NOT NULL,
Datum DATE NOT NULL,
Kategoria_Id VARCHAR(20) NOT NULL,


CONSTRAINT FK_KiadasokId_Kategoria_Id
FOREIGN KEY (Kategoria_Id) REFERENCES Kategoriak(Kategoria_Id)
);

CREATE TABLE Bevetelek(
Bevetelek_Id VARCHAR(20) PRIMARY KEY,
Osszeg DECIMAL(10,2) NOT NULL,
Datum DATE NOT NULL,
Kategoria_Id VARCHAR(20) NOT NULL,

CONSTRAINT FK_kategoriak
FOREIGN KEY (Kategoria_Id) REFERENCES Kategoriak(Kategoria_Id)
);


INSERT INTO Kategoriak (Kategoria_Id, Nev, Tipus, Csoportositas) VALUES
('K_REZSI_VIZ', 'VIZ', 'Kiadas', 'Rezsi'),
('K_REZSI_VILLANY', 'VILLANY', 'Kiadas', 'Rezsi'),
('K_REZSI_SZEMET', 'SZEMET', 'Kiadas', 'Rezsi'),
('K_REZSI_TV', 'TV', 'Kiadas', 'Rezsi'),
('K_REZSI_INTERNET', 'INTERNET', 'Kiadas', 'Rezsi'),
('K_REZSI_BIZTOSITAS', 'Biztosítások', 'Kiadas', 'Rezsi'),
('K_REZSI_JAVITAS', 'Javítások', 'Kiadas', 'Rezsi'),
('K_REZSI_EGYEB', 'Egyéb rezsi', 'Kiadas', 'Rezsi'),

('K_KOZL_JAVITAS', 'Javítás', 'Kiadas', 'Közlekedés'),
('K_KOZL_BIZTOSITAS', 'BIZTOSITAS', 'Kiadas', 'Közlekedés'),
('K_KOZL_ADO', 'Adók', 'Kiadas', 'Közlekedés'),
('K_KOZL_TANK', 'Tank', 'Kiadas', 'Közlekedés'),
('K_KOZL_BERL', 'Bérlet', 'Kiadas', 'Közlekedés'),
('K_KOZL_EGYEB', 'Egyéb', 'Kiadas', 'Közlekedés'),

('K_TORLESZTESEK', 'Törlesztések', 'Kiadas', 'Törlesztés'),

('K_ELOFIZ_STREAM', 'Streaming', 'Kiadas', 'Elofizetes'),
('K_ELOFIZ_TEL', 'telefon', 'Kiadas', 'Elofizetes'),

('K_OKTATAS', 'Oktatás', 'Kiadas', 'Oktatás'),

('K_VASAR_ELELM', 'Élelmiszer', 'Kiadas', 'Vásárlás'),
('K_VASAR_RUHA', 'ruha', 'Kiadas', 'Vásárlás'),
('K_VASAR_EGESZS', 'Egészség', 'Kiadas', 'Vásárlás'),
('K_VASAR_MENZA', 'Menza', 'Kiadas', 'Vásárlás'),
('K_VASAR_ETTEREM', 'Étterem', 'Kiadas', 'Vásárlás'),
('K_VASAR_EGYEB', 'Egyéb vásárlás', 'Kiadas', 'Vásárlás'),
('K_VASAR_ONLINE', 'Online vásárlás', 'Kiadas', 'Vásárlás'),

('K_SZABAD_SZOR', 'Szorakozas', 'Kiadas', 'Szabadidő'),
('K_SZABAD_UDULES', 'Üdülés', 'Kiadas', 'Szabadidő'),
('K_SZABAD_HOBBI', 'Hobbi', 'Kiadas', 'Szabadidő'),
('K_SZABAD_EGYEB', 'Egyéb szabadidő', 'Kiadas', 'Szabadidő'),

('K_AJAND', 'ajandek', 'Kiadas ', 'Ajándékozás'),

('K_REND_BUTOR', 'Bútor', 'Kiadas', 'Rendkívüli'),
('K_REND_GEPEK', 'Gépek', 'Kiadas', 'Rendkívüli'),
('K_REND_FELU', 'Felújítás', 'Kiadas', 'Rendkívüli');


INSERT INTO Kategoriak (Kategoria_Id, Nev, Tipus, Csoportositas) VALUES
('B_JOVEDELEM', 'Jövedelem', 'Bevetel', 'Bevétel'),
('B_CAF', 'Cafeteria', 'Bevetel', 'Bevétel'),
('B_CSPOT', 'Családi pótlék', 'Bevetel', 'Bevétel'),
('B_M_ALLAS', 'Mellékállás', 'Bevetel', 'Bevétel'),
('B_ANYASAGI', 'Anyasági támogatás', 'Bevetel', 'Bevétel'),
('B_CS_TAMO', 'Családtámogatás', 'Bevetel', 'Bevétel'),
('B_EGYEB', 'Egyéb bevétel', 'Bevetel', 'Bevétel');



SELECT * FROM Kiadasok;

SELECT * FROM Bevetelek;

SELECT * FROM Kategoriak;

SELECT * FROM Kategoriak Where Tipus = 'Bevetel';

SELECT COUNT(*) FROM Kategoriak;

SELECT * FROM Kategoriak;

SELECT * FROM Kiadasok 
WHERE Kategoria_Id 
IS NULL;

SELECT * FROM Kategoriak 
WHERE Kategoria_Id 
LIKE 'B_%';

SELECT * FROM Kiadasok
ORDER BY Datum 
DESC LIMIT 5;

SELECT * FROM Bevetelek
ORDER BY Datum 
DESC LIMIT 5;

SELECT Kategoria_Id FROM Kategoriak ORDER BY Kategoria_Id;