<?php

include_once(__dir__ . "/../kategoriak.php");

class KategoriaRepo
{
  public static function getKategoriak(): array
  {
    $con = new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    if ($con->connect_error) {
      throw new Exception("DB kaplcsolat hiba: " . $con->connect_error);
    }
    $con->set_charset("utf8mb4");

    $stmt = $con->prepare("SELECT * FROM Kategoriak;");
    if (!$stmt) {
      throw new Exception("SQL prepare hiba: " . $con->error);
    }

    if (!$stmt->execute()) {
      throw new Exception("SQL execute hiba: " . $stmt->error);
    }

    $stmt->bind_result($Kategoria_Id, $Nev, $Tipus, $Csoportositas);

    $kategoriak = [];

    while ($stmt->fetch()) {
      $kategoriak[] = new Kategoriak($Kategoria_Id, $Nev, $Tipus, $Csoportositas);
    }

    $stmt->close();
    $con->close();

    return $kategoriak;
  }
}
