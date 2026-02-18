<?php

include_once("kategoriak.php");

class KategoriaRepo{
  public static function getKategoriak():array{
    $con= new mysqli("127.0.0.1", "root", "", "KoltsegNyilvantartoRendszer_SoronMonika");
    $stmt=$con->prepare("SELECT*FROM Kategoriak;");
    $stmt->execute();
    $stmt->bind_result($Kategoria_Id,$Nev, $Tipus, $Csoportositas);

    $kategoriak=[];

    while($stmt->fetch()){
      $kategoria=new Kategoriak(intval($Kategoria_Id), $Nev, $Tipus, $Csoportositas);
      $kategoriak[]=$kategoria;
    }

    $stmt->close();
    $con->close();

    return $kategoriak;
  }





}
