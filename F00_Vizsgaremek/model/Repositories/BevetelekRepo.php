<?php

include_once("bevetelek.php");

class BevetelekRepo{
    public static function getBevetelek():array{
      $con=new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
      $stmt=$con->prepare("SELECT*FROM Bevetelek;");
      $stmt->execute();
      $stmt->bind_result($Bevetelek_Id, $Osszeg, $Datum, $Kategoria_Id, $Megjegyzes);

      $bevetelek=[];

      while($stmt->fetch()){
        $bevetel=new Bevetelek(intval($Bevetelek_Id), intval($Osszeg), intval($Datum), intval($Kategoria_Id), $Megjegyzes);
        $bevetelek[]=$bevetel;
      }

      $stmt->close();
      $con->close();

      return $bevetelek;
    }
}
