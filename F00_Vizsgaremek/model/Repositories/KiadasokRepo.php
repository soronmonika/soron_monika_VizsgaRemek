<?php
include_once(__DIR__ .  "/../kiadasok.php");

class KiadasokRepo
{
  public static function getKiadasok(): array
  {
    $con = new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    if ($con->connect_error) {
      throw new Exception("DB kaplcsolat hiba: " . $con->connect_error);
    }
    $con->set_charset("utf8mb4");

    $stmt = $con->prepare("SELECT * FROM Kiadasok;");
    if (!$stmt) throw new Exception("SQL prepare hiba: " . $con->error);
    if (!$stmt->execute()) throw new Exception("SQL execute hiba: " . $stmt->error);

    $stmt->bind_result($Kiadasok_Id, $Osszeg, $Datum, $Kategoria_Id,);

    $kiadasok = [];
    while ($stmt->fetch()) {
      $kiadasok[] = new Kiadasok($Kiadasok_Id, (float)$Osszeg, $Datum, $Kategoria_Id);
    }

    $stmt->close();
    $con->close();
    return $kiadasok;
  }

  public static function createKiadas(Kiadasok $kiadas): void
  {
    $con = new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    if ($con->connect_error) {
      throw new Exception("DB kaplcsolat hiba: " . $con->connect_error);
    }
    $con->set_charset("utf8mb4");

    $stmt = $con->prepare("INSERT INTO Kiadasok (Kiadasok_Id, Osszeg, Datum, Kategoria_Id) VALUES (?, ?, ?, ?)");
    if (!$stmt) throw new Exception("SQL prepare hiba: " . $con->error);

    $Kiadasok_Id  = $kiadas->getKiadasok_Id();
    $Osszeg = $kiadas->getOsszeg();
    $Datum = $kiadas->getDatum();
    $Kategoria_Id = $kiadas->getKategoria_Id();

    $stmt->bind_param("sdss", $Kiadasok_Id, $Osszeg, $Datum, $Kategoria_Id);
    if (!$stmt->execute()) throw new Exception("SQL execute hiba: " . $stmt->error);

    $stmt->close();
    $con->close();
  }
}
