USE `Koltsegnyilvantartorendszer_soronmonika`;


INSERT INTO Kategoriak (KategoriaId, Nev, Tipus, Csoportositas) VALUES
('KATA01', 'Élelmiszer', 'Kiadás', 'Háztartás'),
('KATA02', 'Rezsi', 'Kiadás', 'Lakhatás'),
('KATA03', 'Ruházat', 'Kiadás', 'Gyerek'),
('KATA04', 'Fizetés', 'Bevétel', 'Havi bevétel'),
('KATA05', 'Családi pótlék', 'Bevétel', 'Támogatás');

INSERT INTO Gyerek (Gyerek_Id, Nev, Szuletesnap) VALUES
('GY01', 'Anna', '2019-05-12'),
('GY02', 'Bence', '2021-09-03');

INSERT INTO Kiadasok (Kiadasok_Id, Osszeg, Datum, Kategoria_Id, Gyerek_Id, Megjegyzes) VALUES
('KIA01', 24500, '2025-01-05', 'KATA01', NULL, 'Heti bevásárlás'),
('KIA02', 12000, '2025-01-10', 'KATA03', 'GY01', 'Téli cipő'),
('KIA03', 18000, '2025-01-15', 'KATA02', NULL, 'Villanyszámla'),
('KIA04', 9500, '2025-01-20', 'KATA03', 'GY02', 'Ovis felszerelés');

INSERT INTO Bevetelek (Bevetelek_Id, Osszeg, Datum, Kategoria_Id, Megjegyzes) VALUES
('BEV01', 420000, '2025-01-03', 'KATA04', 'Havi fizetés'),
('BEV02', 26000, '2025-01-08', 'KATA05', 'Családi pótlék');

SELECT *
FROM Kategoriak;

SELECT *
FROM Gyerek;

SELECT *
FROM Kiadasok;

SELECT *
FROM Bevetelek;

DROP DATABASE IF EXISTS `Koltsegnyilvantartorendszer_soronmonika`;