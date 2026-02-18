<?php

include_once("kiadasok.php");

class KiadasokRepo{
    public static function getKiadasok():array{
      $con =new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
      $stmt=$con->prepare("SELECT*FROM Kiadasok;");
      $stmt->execute();
      $stmt->bind_result($Kiadasok_Id, $Osszeg, $Datum, $Kategoria_Id, $Gyerek_Id, $Megjegyzes);

      $kiadasok=[];

      while($stmt->fetch()){
        $kiadasok=new Kiadasok(intval($Kiadasok), $Osszeg, $Datum, $Kategoria_Id, $Gyerek_Id, $Megjegyzes);
        $kiadasok[]=$kiadasok;
      }

      $stmt->close();
      $con->close();

      return $kiadasok;
    }
}
