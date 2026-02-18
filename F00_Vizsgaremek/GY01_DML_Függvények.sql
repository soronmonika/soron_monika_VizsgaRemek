USE koltsegnyilvantartorendszer_soronmonika;

/*1.1 Listázd ki az összes kiadást dátum szerint csökkenő sorrendben.*/
SELECT *
FROM kiadasok
ORDER BY Datum DESC;

/*1.2 Listázd ki azokat a kiadásokat, – ahol az összeg nagyobb mint 15 000 Ft.*/

SELECT *
FROM kiadasok
WHERE Osszeg>15000;

/*1.3 Listázd ki azokat a kiadásokat, – amelyek gyerekhez kapcsolódnak.*/

SELECT *
FROM kiadasok
WHERE Gyerek_Id IS NOT NULL; /*NULL ESETÉN: Ha null-al dolgozunk, akkor a WHERE-hez IS NULL(Inincs gyerek) / IT NOT NULL (Van gyerek)

/*JOIN= 

/*2.1 Listázd ki a kiadásokat úgy, hogy megjelenjen: kiadás dátuma, összeg, kategória neve*/

SELECT Datum, Osszeg, Kategoria_Id
FROM kiadasok;

/*2.2 Listázd ki a gyerekhez tartozó kiadásokat úgy, hogy megjelenjen: gyerek neve, kiadás összege, kategória neve*/

SELECT Nev, Osszeg, Kiadasok_Id
FROM kiadasok
JOIN gyerek ON kiadasok.Gyerek_Id=gyerek.Gyerek_Id;


/*FÜGGVÉNYEK*/

/*3.1 Számold ki: a teljes kiadás összegét*/
SELECT SUM(Osszeg) AS KiadasOsszes
FROM kiadasok;

/*3.2 Számold ki:a teljes bevétel összegét*/
SELECT SUM(Osszeg) AS BevetelkOsszes
FROM bevetelek;


/*Számold meg: hány kiadás van összesen*/

SELECT COUNT(*) AS Db 
FROM kiadasok;

/*4.1 Számold ki a 2025 januári kiadások összegét.*/

SELECT SUM(Osszeg) AS Januar2025
FROM kiadasok
WHERE YEAR(Datum)=2025
and MONTH(Datum)=1;

/*ELLENŐRZÉS*/
SELECT Datum, Osszeg
FROM kiadasok
ORDER BY Datum;

/*4.2 Listázd ki azokat a bevételeket, – amelyek 2025-ben keletkeztek.*/
SELECT*
FROM bevetelek
ORDER BY YEAR(Datum)=2025;

/*5.1
Csoportosítsd a kiadásokat kategóriánként, és add meg: kategória neve, összes kiadás összege*/

SELECT kategoriak.Nev, SUM(Kiadasok.Osszeg) AS OsszesKiadas
FROM kiadasok
JOIN kategoriak on Kiadasok.Kategoria_Id=Kategoriak.KategoriaId
GROUP BY kategoriak.Nev;

/*5.2
Csoportosítsd a kiadásokat gyerekenként, és add meg: gyerek neve, összes kiadás összege (csak azokat, akikhez van kiadás)*/

SELECT gyerek.Nev, SUM(Kiadasok.Osszeg) AS GyerekKiadas
FROM kiadasok
JOIN gyerek ON kiadasok.Gyerek_Id=gyerek.Gyerek_Id
GROUP BY gyerek.Nev;

/*6.1 Listázd azokat a kategóriákat,– ahol az összes kiadás meghaladja az 20 000 Ft-ot.*/
SELECT kategoriak.Nev, SUM(Kiadasok.Osszeg) AS huszezerfelett
FROM kiadasok
JOIN kategoriak ON Kiadasok.Kategoria_Id=Kategoriak.KategoriaId
GROUP BY Kategoriak.Nev
HAVING SUM(Kiadasok.Osszeg)>20000
ORDER BY Kategoriak.Nev;

/*7.1 Számold ki: teljes bevétel, teljes kiadás*/

SELECT SUM(Osszeg) AS TeljesBevetel
FROM bevetelek;

SELECT SUM(Osszeg) AS TeljesKiadas
FROM kiadasok;

/*egybe*/

/*7.2 Számold ki az egyenleget (bevétel – kiadás).*/

SELECT 
(SELECT SUM(Osszeg) from bevetelek) - (SELECT SUM(Osszeg) FROM Kiadasok) AS Egyenleg; 
/*Belső select1 : kiszámolja a teljes bevételt, Külső select 2: kiszámolja a teljes kiadást, és a külső select: kivonja őket.|| egy sor, egy oszlop, egyenleg*/

/*8.1Módosítsd az egyik kiadás megjegyzését(pl. egészítsd ki: „– módosítva”).*/
SELECT *
FROM kiadasok;

UPDATE kiadasok
SET Megjegyzes='nyári cipő-módosítva'
WHERE Kiadasok_Id='KIA02';

SELECT *
FROM kiadasok;

/*9.1 Írd le SQL-ben (nem kell futtatni): hogyan törölnél ki egy gyerekhez nem kötött kiadást.*/
DELETE 
FROM kiadasok
WHERE Gyerek_Id IS NULL;