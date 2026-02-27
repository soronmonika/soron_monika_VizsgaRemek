<?php
include_once(__DIR__ . "/../bevetelek.php");

class BevetelekRepo
{
  public static function getBevetelek(): array
  {
    $con = new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    if ($con->connect_error) {
      throw new Exception("DB kaplcsolat hiba: " . $con->connect_error);
    }
    $con->set_charset("utf8mb4");

    $stmt = $con->prepare("SELECT Bevetelek_Id, Osszeg, Datum, Kategoria_Id FROM Bevetelek;");
    if (!$stmt) throw new Exception("SQL prepare hiba: " . $con->error);
    if (!$stmt->execute()) throw new Exception("SQL execute hiba: " . $stmt->error);

    $stmt->bind_result($Bevetelek_Id, $Osszeg, $Datum, $Kategoria_Id);

    $bevetelek = [];
    while ($stmt->fetch()) {
      $bevetelek[] = new Bevetelek($Bevetelek_Id, (float)$Osszeg, $Datum, $Kategoria_Id);
    }

    $stmt->close();
    $con->close();
    return $bevetelek;
  }

  public static function createBevetel(Bevetelek $bevetel): void
  {
    $con = new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    if ($con->connect_error) {
      throw new Exception("DB kaplcsolat hiba: " . $con->connect_error);
    }
    $con->set_charset("utf8mb4");

    $stmt = $con->prepare("INSERT INTO Bevetelek (Bevetelek_Id, Osszeg, Datum, Kategoria_Id) VALUES (?, ?, ?, ?)");
    if (!$stmt) throw new Exception("SQL prepare hiba: " . $con->error);

    $Bevetelek_Id  = $bevetel->getBevetelek_Id();
    $Osszeg = $bevetel->getOsszeg();
    $Datum = $bevetel->getDatum();
    $Kategoria_Id = $bevetel->getKategoria_Id();

    $stmt->bind_param("sdss", $Bevetelek_Id, $Osszeg, $Datum, $Kategoria_Id);
    if (!$stmt->execute()) throw new Exception("SQL execute hiba: " . $stmt->error);

    $stmt->close();
    $con->close();
  }
}
